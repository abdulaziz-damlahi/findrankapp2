<?php

namespace App\parasut\Jobs;

use App\Models\InvoiceRecord;
use App\Models\Payment;
use App\Models\packets;
use App\Models\AllInvoiceRequest;
use App\Models\invoicerecords;

use App\Models\Request;
use App\Models\requests;
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

class createInvoice implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     *      * @param requests $request

     * @param invoicerecords $invoiceRecord
     * @param users $user
     */
    public function __construct(packets $packets,users $user)
    {
      $createinvoice = self::createInvoice($user,$packets);

      foreach($createinvoice as $invoice){
         /* foreach($sadq as $sadasdaq){
          echo $sadasdaq;
      }*/
          $all_invoice_request= new AllInvoiceRequest();
          $all_invoice_request->invoice_id=$invoice['id'];
          $all_invoice_request->invoice_price=$invoice['attributes']['net_total'];
          $all_invoice_request->description=$invoice['attributes']['description'];
          $all_invoice_request->phone=$invoice['attributes']['billing_phone'];
          $all_invoice_request->order_date=$invoice['attributes']['order_date'];
          $all_invoice_request->city=$invoice['attributes']['city'];
          $all_invoice_request->tax_number=$invoice['attributes']['tax_number'];
          $all_invoice_request->tax_office=$invoice['attributes']['tax_office'];
          $all_invoice_request->user_id=Auth::user()->id;
          $all_invoice_request->save();
          return $invoice;

      }

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
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

}
