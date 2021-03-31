<?php

namespace App\Parasut\Jobs;

use App\Models\InvoiceRecord;
use App\Models\Payment;
use App\Models\packets;
use App\Models\invoicerecords;

use App\Models\Request;
use App\Models\users;
use App\Parasut\Enums\ParasutEndPoint;
use App\Parasut\Models\ParasutRequestModel;
use App\Parasut\Models\TrackableModel;
use App\Parasut\Parasut;
use App\Parasut\Jobs\Trackable;
use Carbon\Carbon;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class Invoicing implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected invoicerecords $invoiceRecord;
    static $taxNumber;

    /**
     * Create a new job instance.
     *
     * @param invoicerecords $invoiceRecord
     * @param users $user
     */
    public function __construct(users $user,invoicerecords $invoiceRecord,packets $packets)
    {
        $this->request = $invoiceRecord;
        dd(self::createInvoice($user,$packets));

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
        $invoiceRecord = $this->invoicerecords;
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
     * @param users $user
     * @param invoicerecords $invoicerecords
     * @return mixed
     * @throws GuzzleException
     */
    private function updateUser(users $user, invoicerecords $invoiceRecord)
    {
       $user = Auth::user();
        $invoiceRecord=$invoiceRecord->all()->last();
        $isIndividual = $invoiceRecord->invoice_type === 'individual';
        $fullName = $isIndividual ? ($invoiceRecord->first_name . ' ' . $invoiceRecord->last_name) : $invoiceRecord->company_name;
        $taxNumber = (($isIndividual) ? $invoiceRecord->id : $invoiceRecord->tax_number) ?? "asdasd";
        $requestModel = new ParasutRequestModel($user->parasut_customer_id, 'contacts', [
            "email" => $invoiceRecord['email'],
            "name" => $fullName,
            "short_name" => $fullName,
            "contact_type" => ($isIndividual ? "person" : "company"),
            "tax_office" => $invoiceRecord['tax_office'] ?? $invoiceRecord['city'],
            "tax_number" => $taxNumber,
            "city" => $invoiceRecord->city,
            "district" => $invoiceRecord->district,
            "address" => $invoiceRecord->address,
            "phone" => $invoiceRecord->phone,
            "is_abroad" => false,
            "archived" => false,
            "account_type" => "customer",
            "untrackable" => false
        ]);
        (new Parasut())->update(ParasutEndPoint::Contacts(),$user->parasut_customer_id, $requestModel);
        return $taxNumber;
    }

    private function createInvoice(users $user, packets $packets)
    {
        $user = Auth::user();
        $packets=$packets->all()->last();
        $requestModel = new ParasutRequestModel(null, "sales_invoices", [
            "item_type" => "invoice",
            "description" => $user['first_name'] . ' ' . $user['last_name'] . ' Hemen Geliriz Yazılım Kullanım Lisans Bedeli Faturası',
            "issue_date" => Carbon::today()->format("Y-m-d"),
            "currency" => "TRL",
            "withholding_rate" => 0,
            "vat_withholding_rate" => 0,
            "is_abroad" => false,
            "order_no" => $packets['paymentId'],
            "order_date" => Carbon::parse($packets['updated_at'])->format("Y-m-d"),
            "shipment_included" => false
        ], [
            "details" => [
                "data" => [
                    [
                        "id" => null,
                        "type" => "sales_invoice_details",
                        "attributes" => [
                            "quantity" => 1,
                            "unit_price" => $packets['price'],
                            "vat_rate" => 0
                        ],
                        "relationships" => [
                            "product" => [
                                "data" => [
                                    "id" => 44674414,
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

    private function createEInvoice($invoiceId, $taxNumber)
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
        $trackableModel = new TrackableModel($response['data']['id'], "e_invoice", $invoiceId);
        Trackable::dispatch($trackableModel)->delay(5)->onQueue('parasut');
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
                    "id" => 44674414,
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
