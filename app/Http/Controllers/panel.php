<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class panel extends Controller
{
    public function index()
    {
        return view(
            'pages/panel/panel');
    }

    public function profile()
    {
        return view(
            'pages/panel/profile');
    }
}
