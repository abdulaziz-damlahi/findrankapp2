<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\users;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use App\Models\keywords;
use App\Models\websites;
use App\Models\packets;
use Illuminate\Support\Facades\App;


class homepage extends Controller
{
    public function index(Request $request)
    {
        $clientIP = \Request::ip();
        $clientIP = \Request::getClientIp(true);
        $clientIP = Request()->ip();
        $externalContent = file_get_contents('http://checkip.dyndns.com/');
        preg_match('/Current IP Address: \[?([:.0-9a-fA-F]+)\]?/', $externalContent, $m);
        $externalIp = $m[1];
        $externalIp;
        $ippp = '2.16.7.255';
        $geo = geoip()->getLocation('88.21.130.14');
        $localiton = $geo->iso_code;
        if ($localiton === 'TR') {
            $lang = 'tr';

            App::setlocale($lang);
            $locale = App::getLocale();
        } else if ($localiton === 'US') {
            $lang = 'en';
            App::setlocale($lang);
            $locale = App::getLocale();
        } else if ($localiton === 'ES') {
            $lang = 'es';
            App::setlocale($lang);
            $locale = App::getLocale();
        } else if ($localiton === 'DE') {
            $lang = 'de';
            App::setlocale($lang);
            $locale = App::getLocale();
        }

        return view('pages/home/home', compact('locale', 'localiton', 'lang'));

    }


    public function store(Request $request)
    {


dd($request);
        $data = users::create([  // <= the error is Here!!!
            'name' => $request->name,
            'email' => $request->email,
        ]);
        $data->save();
        if ($data)
            return response()->json([
                'status' => true,
                'msg' => 'saved successfully',
            ]);
        else
            return response()->$request->json([
                'status' => false,
                'msg' => 'not saved',
            ]);

    }

}
