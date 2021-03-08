<?php

namespace App\Http\Controllers;

use App\Models\packets;
use App\Models\users;
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
    public function FindOrder()
    {
        return view(
            'pages/findorder');
    }

    public function userspacket()
    {
<<<<<<< HEAD
        $user = users::find(2);
=======
        $user = users::find(1);
>>>>>>> 7a2e82b9d360ff2c9e0d6a02ffc09ad6d5e1ec74
        $user->packets;
        return $user;
    }

    public function userswebsite()
    {
        $user = users::find(1);
         $user->websites;
        return $user;
    }

    public function packetwebsite()
    {
        $packet = packets::find(1);
         $packet->websites;
        return $packet;
    }

    public function websitekeyword()
    {
        $website = websites::find(1);
         $website->keywords;
        return $website;
    }
}
