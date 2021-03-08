<?php

namespace App\Http\Controllers;

use App\Models\packets;
<<<<<<< HEAD
use App\Models\User;
=======
use App\Models\users;
>>>>>>> 603618635d6b3a4848206f548c6caa16db6f6ba2
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
        $user = User::find(2);
=======
        $user = users::find(2);
>>>>>>> 603618635d6b3a4848206f548c6caa16db6f6ba2
        $user->packets;
        return $user;
    }

    public function userswebsite()
    {
<<<<<<< HEAD
        $user = User::find(1);
=======
        $user = users::find(1);
>>>>>>> 603618635d6b3a4848206f548c6caa16db6f6ba2
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
