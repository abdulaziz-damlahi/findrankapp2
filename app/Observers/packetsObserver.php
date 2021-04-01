<?php

namespace App\Observers;

use App\Models\packets;
use App\Parasut\Models\TrackableModel;
use App\Models\cards;
use App\Models\packets_reels;
use App\Models\users;
use App\Models\requests;
use App\Parasut\Jobs\Invoicing;
use App\Parasut\Jobs\updateUser;
use App\Parasut\Jobs\createInvoice;
use App\Parasut\Parasut;
use App\Models\invoicerecords;
use App\Parasut\Utils;
use App\Parasut\Enums\ParasutEndPoint;
use App\Parasut\Models\ParasutRequestModel;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class packetsObserver
{
    /**
     * Handle the packets "created" event.
     *
     * @param  \App\Models\packets  $packets
     * @return void
     */
    public function created(users $user)
    {
        //
    }

    /**
     * Handle the packets "updated" event.
     *
     * @param  \App\Models\packets  $packets
     * @return void
     */
    public function updated(packets $packets)
    {
        //
        $packets->count_of_words=50;
        $packets->save();
    }

    /**
     * Handle the packets "deleted" event.
     *
     * @param  \App\Models\packets  $packets
     * @return void
     */
    public function deleted(packets $packets)
    {
        //
    }

    /**
     * Handle the packets "restored" event.
     *
     * @param  \App\Models\packets  $packets
     * @return void
     */
    public function restored(packets $packets)
    {
        //
    }

    /**
     * Handle the packets "force deleted" event.
     *
     * @param  \App\Models\packets  $packets
     * @return void
     */
    public function forceDeleted(packets $packets)
    {
        //
    }
}
