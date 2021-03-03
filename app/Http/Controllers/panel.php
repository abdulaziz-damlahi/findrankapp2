<?php

namespace App\Http\Controllers;

use App\Models\packets;
use App\Models\User;
use App\Models\websites;
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

    public function userspacket()
    {
        $user = User::find(1);
        return $user->packets;
    }

    public function userswebsite()
    {
        $user = User::find(1);
        return $user->websites;
    }

    public function packetwebsite()
    {
        $packet = packets::find(1);
        return $packet->websites;
    }

    public function websitekeyword()
    {
        $website = websites::find(1);
        return $website->keywords;
    }
}