<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class settings extends Controller
{
    //
    public function index (Request $request){
        return view('pages/foruser/settings/settings');
}}
