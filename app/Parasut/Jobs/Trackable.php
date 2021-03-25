<?php

namespace App\Parasut\Jobs;

use App\Models\ParasutInvoice;
use App\Parasut\Enums\ParasutEndPoint;
use App\Parasut\Enums\ParasutInvoiceStatus;
use App\Parasut\Models\TrackableModel;
use App\Parasut\Parasut;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Bus\PendingDispatch;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class Trackable implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected TrackableModel $model;

    /**
     * Create a new job instance.
     * @param TrackableModel $model
     */
    public function __construct(TrackableModel $model)
    {
        $this->model = $model;
    }

    /**
     * Execute the job.
     *
     * @return PendingDispatch
     * @throws GuzzleException
     */
    public function handle()
    {
        $parasut = new Parasut();
        $model = $this->model;
        $response = $parasut->request(
            'GET',
            $parasut::BASE_URL . ParasutEndPoint::TrackableJobs() . '/' . $model->getId()
        );
        $response = $parasut->toArray($response->getBody())['data']['attributes'];
        $status = $response['status'];
        switch ($status) {
            case "running":
                return Trackable::dispatch($model)
                    ->delay(5)
                    ->onQueue('parasut');
            case "done":
                $model->getRequest()->payment()->update([
                    "billed_status" => "formalized",
                    "invoice_id" => $model->getInvoiceId()
                ]);
                ParasutInvoice::create([
                    "invoice_id" => $model->getInvoiceId(),
                    "status" => ParasutInvoiceStatus::Formalized(),
                    "messages" => null,
                    "invoice_type" => $model->getInvoiceType()
                ]);
                return InvoicePdf::dispatch($model)->onQueue('parasut');
            default: // Is Error
                $model->getRequest()->payment()->update([
                    "billed_status" => "not_formalized",
                    "invoice_id" => $model->getInvoiceId()
                ]);
                return ParasutInvoice::create([
                    "invoice_id" => $model->getInvoiceId(),
                    "status" => ParasutInvoiceStatus::Formalized(),
                    "messages" => json_encode($response['errors']),
                    "invoice_type" => $model->getInvoiceType()
                ]);
        }
    }
}
