<?php

namespace App\parasut\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\InvoiceRecord;
use App\Models\Payment;
use App\Models\packets;
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
use Illuminate\Support\Facades\Auth;

class updateUser implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @param invoicerecords $invoiceRecord
     * @param users $user
     */
    public function __construct(users $user, invoicerecords $invoiceRecord)
    {
        $this->request = $invoiceRecord;
        echo self::updateUser($user, $invoiceRecord);

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
}
