<?php

namespace App\Parasut\Jobs;

use App\Models\users;
use App\Parasut\Enums\ParasutEndPoint;
use App\Parasut\Models\ParasutRequestModel;
use App\Models\invoicerecords;
use App\Parasut\Parasut;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class InsertUserToParasut implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected users $user;

    /**
     * Create a new job instance.
     *
     * @param users $user
     */
    public function __construct(users $user)
    {
        $this->user = $user;
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws GuzzleException
     */
    public function handle()
    {
        $user = $this->user;
        if (!isset($user->parasut_customer_id)) {
            $parasut = new Parasut();
            $response = $parasut->create(
                ParasutEndPoint::Contacts(),
                new ParasutRequestModel(null, 'contacts', [
                    "email" => $user['email'],
                    "name" => $user['first_name'] . ' ' . $user['last_name'],
                    "short_name" => $user['first_name'] . ' ' . $user['last_name'],
                    "contact_type" => "person",
                    "phone" => $user['phone'],
                    "is_abroad" => false,
                    "archived" => false,
                    "account_type" => "customer"
                ])
            );
            $user->parasut_customer_id = $response['data']['id'];
            $user->save();
        }
    }
}
