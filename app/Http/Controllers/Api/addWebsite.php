<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\packets;
use App\Models\websites;
use Illuminate\Http\Request;

class addWebsite extends Controller
{
    public function viewwebsite()
    {
        return websites::all();
    }

    public function storewebsite(Request $request)
    {
        websites::create([
            'website_name' => $request->website_name,
            'rank' => $request->rank,
        ]);

    }

    public function deletewebsite($id)
    {
        $data = websites::find($id);
        if ($data->delete()) {
            return new websites($data);
        }
    }




    public function viewpacket()
    {
        return packets::all();
    }

    public function storepacket(Request $request)
    {
        packets::create([
            'packet_id' => $request->packet_id,
            'count_of_words' => $request->count_of_word,
            'descriptions' => $request->description,
            'end_of_pocket' => $request->end_of_pocket,
            'started_of_pockets' => $request->started_of_pockets,
            'count_of_websites' => $request->count_of_websites,
        ]);
    }

    public function deletepacket($id)
    {
        $data = packets::find($id);
        if ($data->delete()) {
            return new packets($data);
        }
    }
}
