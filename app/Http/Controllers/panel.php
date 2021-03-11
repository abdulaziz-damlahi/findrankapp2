<?php

namespace App\Http\Controllers;

use App\Models\packets;

use App\Models\users;
use Illuminate\Support\Facades\Auth;
use App\Models\websites;
use App\Models\keywords;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class panel extends Controller
{
    public function index()
    {
        //        $username = auth()->user()->first_name;
        $user = auth()->user();
        $userId = $user->id;
        $userwebsites = websites::where('id_website', '=', $userId)->get();
//              $firstwebsiteid = $userwebsites->skip(0)->first()->id;
//              $secondwebsiteid = $userwebsites->skip(1)->first()->id;
//
//          $keywordequalwebsite = keywords::where('website_id', '=', $firstwebsiteid)->get();
//         $keywordequalwebsite = keywords::where('website_id', '=', $secondwebsiteid)->get();
        return  view('pages/panel/panel', compact('user', 'userwebsites', 'user'));
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
        $user = users::find(2);
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
