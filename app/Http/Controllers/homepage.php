<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\keywords;
use App\Models\websites;
use App\Models\packets;


class homepage extends Controller
{
    public function index (){
        $data['keywords']=keywords::orderBy('created_at','DESC')->get();
        $doctor = packets::with('websites')->find(1);

        return view('pages/home/home',compact(array($doctor, $data)));

    }

}
