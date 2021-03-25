<?php

namespace App\Parasut\Jobs;

use App\Models\InvoiceRecord;
use App\Models\Payment;
use App\Models\Request;
use App\Models\User;
use App\Parasut\Enums\ParasutEndPoint;
use App\Parasut\Models\ParasutRequestModel;
use App\Parasut\Models\TrackableModel;
use App\Parasut\Parasut;
use Carbon\Carbon;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Invoicing implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected Request $request;

    /**
     * Create a new job instance.
     *
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws GuzzleException
     */
    public function handle()
    {

        $request = $this->request;
        $invoiceRecord = $request->invoiceRecord;
        $user = $request->customer;
        $payment = $request->payment;


        $taxNumber = self::updateUser($user, $invoiceRecord);
        $invoice = self::createInvoice($user, $payment);

        $parasut = new Parasut();
        if ($eInvoice = $parasut->isEInvoice($taxNumber)) {
            self::createEInvoice($request, $invoice['data']['id'], $eInvoice[0]['attributes']['e_invoice_address']);
        } else {
            self::createEArchive($request, $payment, $invoice['data']['id']);
        }
    }

    /**
     * @param User $user
     * @param InvoiceRecord $invoiceRecord
     * @return mixed
     * @throws GuzzleException
     */
    private function updateUser(User $user, InvoiceRecord $invoiceRecord)
    {
        $isIndividual = $invoiceRecord['invoice_type'] === 'individual';
        $fullName = $isIndividual ? ($invoiceRecord['first_name'] . ' ' . $invoiceRecord['last_name']) : $invoiceRecord['company_name'];
        $taxNumber = (($isIndividual) ? $invoiceRecord['id_no'] : $invoiceRecord['tax_number']) ?? "asdasd";
        $requestModel = new ParasutRequestModel($user['parasut_customer_id'], 'contacts', [
            "email" => $invoiceRecord['email'],
            "name" => $fullName,
            "short_name" => $fullName,
            "contact_type" => ($isIndividual ? "person" : "company"),
            "tax_office" => $invoiceRecord['tax_office'] ?? $invoiceRecord['city'],
            "tax_number" => $taxNumber,
            "city" => $invoiceRecord->city['name'],
            "district" => $invoiceRecord->district['name'],
            "address" => $invoiceRecord['address'],
            "phone" => $invoiceRecord['phone'],
            "is_abroad" => false,
            "archived" => false,
            "account_type" => "customer",
            "untrackable" => false
        ]);
        (new Parasut())->update(ParasutEndPoint::Contacts(), $user['parasut_customer_id'], $requestModel);
        return $taxNumber;
    }

    private function createInvoice(User $user, Payment $payment)
    {
        $requestModel = new ParasutRequestModel(null, "sales_invoices", [
            "item_type" => "invoice",
            "description" => $user['first_name'] . ' ' . $user['last_name'] . ' Hemen Geliriz Yazılım Kullanım Lisans Bedeli Faturası',
            "issue_date" => Carbon::today()->format("Y-m-d"),
            "currency" => "TRL",
            "withholding_rate" => 0,
            "vat_withholding_rate" => 0,
            "is_abroad" => false,
            "order_no" => $payment['iyzico_payment_id'],
            "order_date" => Carbon::parse($payment['updated_at'])->format("Y-m-d"),
            "shipment_included" => false
        ], [
            "details" => [
                "data" => [
                    [
                        "id" => null,
                        "type" => "sales_invoice_details",
                        "attributes" => [
                            "quantity" => 1,
                            "unit_price" => $payment['price'],
                            "vat_rate" => 0
                        ],
                        "relationships" => [
                            "product" => [
                                "data" => [
                                    "id" => config('hemengeliriz.parasut.product_id'),
                                    "type" => "products"
                                ]
                            ]
                        ]
                    ]
                ]
            ],
            "contact" => [
                "data" => [
                    "id" => $user['parasut_customer_id'],
                    "type" => "contacts"
                ]
            ]
        ]);
        return (new Parasut())->create(ParasutEndPoint::SalesInvoices(), $requestModel);
    }

    private function createEInvoice(Request $request, $invoiceId, $taxNumber)
    {
        $requestModel = new ParasutRequestModel(null, "e_invoices", [
            "vat_exemption_reason_code" => "223",
            "vat_exemption_reason" => "Geçici 20/1 Teknoloji Geliştirme Bölgelerinde Yapılan İşlemler",
            "scenario" => "basic",
            "to" => $taxNumber
        ], [
            "invoice" => [
                "data" => [
                    "id" => $invoiceId,
                    "type" => "sales_invoices"
                ]
            ]
        ]);
        $response = (new Parasut())->create(ParasutEndPoint::EInvoices(), $requestModel);
        $trackableModel = new TrackableModel($response['data']['id'], "e_invoice", $invoiceId, $request);
        Trackable::dispatch($trackableModel)
            ->delay(5)
            ->onQueue('parasut');;
    }

    public function createEArchive(Request $request, Payment $payment, $invoiceId) // Make private
    {
        $requestModel = new ParasutRequestModel(null, "e_archives", [
            "vat_exemption_reason_code" => "223",
            "vat_exemption_reason" => "Geçici 20/1 Teknoloji Geliştirme Bölgelerinde Yapılan İşlemler",
            "internet_sale" => [
                "url" => "https://www.hemengeliriz.com",
                "payment_type" => "KREDIKARTI/BANKAKARTI",
                "payment_platform" => "iyzico",
                "payment_date" => Carbon::parse($payment['updated_at'])->format('Y-m-d')
            ]
        ], [
            "sales_invoice" => [
                "data" => [
                    "id" => $invoiceId,
                    "type" => "sales_invoices"
                ]
            ]
        ]);
        $response = (new Parasut())->create(ParasutEndPoint::EArchives(), $requestModel);
        $trackableModel = new TrackableModel($response['data']['id'], "e_archive", $invoiceId, $request);
        Trackable::dispatch($trackableModel)
            ->delay(5)
            ->onQueue('parasut');
    }
}
