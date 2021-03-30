<?php

namespace App\Observers;

use App\Models\users;
use App\Models\invoicerecords;
use App\Parasut\Jobs\InsertUserToParasut;
use Illuminate\Support\Facades\App;
use App\Parasut\Parasut;
use App\Parasut\Enums\ParasutEndPoint;
use App\Parasut\Models\ParasutRequestModel;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;


class UserObserver
{
    /**
     * Handle the users "created" event.
     *
     * @param  \App\Models\users  $users
     * @return void
     */
        //
        public function created(users $user)
    {
        $user->company_name="company_name";
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

    /**
     * Handle the users "updated" event.
     *
     * @param  \App\Models\users  $users
     * @return void
     */
    public function updated(users $users)
    {
        //
    }

    /**
     * Handle the users "deleted" event.
     *
     * @param  \App\Models\users  $users
     * @return void
     */
    public function deleted(users $users)
    {
        //
    }

    /**
     * Handle the users "restored" event.
     *
     * @param  \App\Models\users  $users
     * @return void
     */
    public function restored(users $users)
    {
        //
    }

    /**
     * Handle the users "force deleted" event.
     *
     * @param  \App\Models\users  $users
     * @return void
     */
    public function forceDeleted(users $users)
    {
        //
    }
}
