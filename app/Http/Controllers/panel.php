<?php

namespace App\Http\Controllers;

use App\Models\packets;
use App\Models\users;
use Illuminate\Support\Facades\Auth;
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
        $user = auth()->user();
        return view(
            'pages/panel/panel',compact('user'));
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
    } public function findPost(Request $request)
    {
      $colonial_name =  $request->hidden_collonial_name;
      $device_information =  $request->hidden_device_name;
      $website_request =  $request->website;
      $keyword_request =  $request->keyword;
      echo $colonial_name;
      echo $device_information;
      echo $website_request;
      echo $keyword_request;
        return view(
            'pages/findorder',compact('colonial_name','device_information','website_request','keyword_request'));
    }

    public function userspacket()
    {
        $user = users::find(2);
        $user = auth()->user();
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
