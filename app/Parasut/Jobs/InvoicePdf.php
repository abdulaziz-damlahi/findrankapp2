<?php

namespace App\Parasut\Jobs;

use App\Parasut\Enums\ParasutEndPoint;
use App\Parasut\Models\TrackableModel;
use App\Parasut\Parasut;
use Exception;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class InvoicePdf implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected TrackableModel $trackableModel;

    /**
     * Create a new job instance.
     *
     * @
     * @param TrackableModel $trackableModel
     */
    public function __construct(TrackableModel $trackableModel)
    {
        $this->trackableModel = $trackableModel;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $model = $this->trackableModel;
        $request = $model->getRequest();
        $payment = $request->payment;

        if ($payment['billed_status'] === "formalized") {
            $parasut = new Parasut();

            $eDocument = self::getEDocument($parasut);

            $endpoint = $model->getInvoiceType() === "e_archive" ? ParasutEndPoint::EArchives : ParasutEndPoint::EInvoices;
            $response = $parasut->request('GET', Parasut::BASE_URL . $endpoint . '/' . $eDocument . '/pdf');
            $response = json_decode($response->getBody(), true)['data']['attributes']['url'];

            $fileName = Str::random(8) . '-' . $eDocument . '.pdf';
            $put = Storage::put("/invoices/" . $fileName, file_get_contents($response));
            if ($put) {
                $model->getRequest()
                    ->payment()
                    ->update([
                        "invoice_pdf" => $fileName
                    ]);
            } else {
                $this->fail(new Exception("PDF Kaydedilirken bir sorun oluştu!"));
            }
        } else {
            $this->fail(new Exception("Fatura kesilmediği için pdf getirme işlemi iptal edildi!"));
        }
    }

    private function getEDocument(Parasut $parasut)
    {
        $model = $this->trackableModel;
        $response = $parasut->request(
            "GET",
            Parasut::BASE_URL . ParasutEndPoint::SalesInvoices . '/' . $model->getInvoiceId(),
            ["include" => "active_e_document"]
        );
        $response = json_decode($response->getBody(), true);
        return $response['data']['relationships']['active_e_document']['data']['id'];
    }

}
