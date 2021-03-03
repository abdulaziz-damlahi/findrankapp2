<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserControler extends Controller
{
    public function ip_details()
    {
        $ip = request()->ip(); //Dynamic IP address get
        $data = \Location::get($ip);
        return view('details',compact('data'));
    }
}
