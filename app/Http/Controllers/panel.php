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
        $user = auth()->user();
        $userId = $user->id;
        $userwebsites8 = websites::where('user_id', '=', $userId)->take(4)->get();
        $userwebsites = websites::where('user_id', '=', $userId)->get();
         $userkeywordcount = keywords::where('user_id', '=', $userId)->count();
         $userwebsitecount = websites::where('user_id', '=', $userId)->count();
        for ($x = 1; $x < $userkeywordcount; $x++) {
            $keywordcount = keywords::where('website_id', '=', $x)->get('website_id')->count();
            websites::where('id', '=', $x)->where('user_id', '=', $userId)->update(['wordcount' => $keywordcount]);
        }
        return view('pages/panel/panel', compact('user', 'userwebsites8', 'user', 'userwebsites',));
    }

    public function addwebsite(Request $request)
    {
        $request->validate([
            'website' => 'min:3|max:255',
        ]);
        $user = auth()->user();
        $userId = $user->id;
        $website = new websites;
        $website->website_name = $request->website;
        $website->user_id = $userId;
        $website->user_id = $userId;
        $website->wordcount = 0;
        $website->save();
        return redirect('user/panel');
    }

    public function addword(Request $request)
    {
        $request->validate([
            'website' => 'min:3|min:255',
        ]);
        $user = auth()->user();
        $userId = $user->id;
        $webid = $request->websiteid;

        $keyword = new keywords;
        $keyword->name = $request->keyword;
        $keyword->rank = 0;
        $keyword->website_id = $webid;
        $keyword->user_id = $userId;

        $keyword->save();
      return redirect()->back();
    }


    public function deletewebsite($id)
    {

        DB::delete('delete from websites where id = ?', [$id]);
        return redirect('user/panel');
    }

    public function deletekeyword($id)
    {
        DB::delete('delete from keywords where id = ?', [$id]);
        return redirect()->back();
    }

    public function websitelist($websiteid)
    {
        return view('pages/websitelist/websitelist', compact('websiteid'));
    }


    public function profile()
    {
        return view(
            'pages/panel/profile');
    }

    public
    function FindOrder()
    {
        return view(
            'pages/findorder');
    }

    public
    function findPost(Request $request)
    {
        $colonial_name = $request->hidden_collonial_name;
        $device_information = $request->hidden_device_name;
        $website_request = $request->website;
        $keyword_request = $request->keyword;
        echo $colonial_name;
        echo $device_information;
        echo $website_request;
        echo $keyword_request;
        return view(
            'pages/findorder', compact('colonial_name', 'device_information', 'website_request', 'keyword_request'));
    }

    public
    function userspacket()
    {
        $user = users::find(2);
        $user->packets;
        return $user;
    }

    public
    function userswebsite()
    {
        $user = users::find(1);
        $user->websites;
        return $user;
    }

    public
    function packetwebsite()
    {
        $packet = packets::find(1);
        $packet->websites;
        return $packet;
    }

    public
    function websitekeyword()
    {
        $website = websites::find(1);
        $website->keywords;
        return $website;
    }
}
