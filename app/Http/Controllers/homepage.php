<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class homepage extends Controller
{
    public function index()
    {
        return view(
            'pages/home/home');
    }

    public function contact()
    {
        return view(
            'pages/contact');
    }
}
