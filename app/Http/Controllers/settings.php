<?php

namespace App\Http\Controllers;


use App\Models\cards;
use App\Models\packets;
use App\Models\packets_reels;
use App\Models\users;
use App\Models\invoicerecords;
use App\Parasut\Utils;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
class settings extends Controller
{
    //


    public function index(Request $request)
    {
       // $parasut = (new \App\Parasut\jobs\Invoicing(request()));
        $this->location();
        $user = Auth::user();
        $user_first_name = $user->first_name;
        $user_last_name = $user->last_name;
        $phone = $user->phone;
        $mail = $user->email;

        return view('pages/foruser/settings/settings', compact('user_first_name', 'user_last_name', 'phone', 'mail'));
    }

    public function parase(invoicerecords $invoicerecords)
    {
     //   $parasut = (new \App\Parasut\Parasut());
        $parasut2 = (new \App\Parasut\jobs\Invoicing($invoicerecords));
    }

    public function getClient()
    {
        if (isset($this->client)) {
            return $this->client;
        }
        $client = new Client();
        $this->client = $client;
        return $client;
    }

    public function store_personal_settings(Request $request)
    {
        $request->validate([
            'first_name' => 'min:3|string',
            'last_name' => 'min:3|string',
            'phone' => 'min:10|numeric',
            'email' => 'min:5|string|email ',
        ]);
        $user = Auth::user();
        $bune = users::find(Auth::id());

        $user_first_name = $bune->first_name;
        $user_last_name = $bune->last_name;
        $phone = $bune->phone;
        $mail = $bune->email;
        $bune->first_name = $request->first_name;
        $bune->last_name = $request->last_name;
        $bune->phone = $request->phone;
        $bune->email = $request->email;
        $bune->save();
        return redirect()->back()->with('success', 'Kullanıcı bilgileriniz başarıyla güncellendi');

    }

    public function store_password(Request $request)
    {
        $request->validate([
            'password_now' => 'min:3|max:200',
            'new_password' => 'min:3|max:200',
            'new_password_confirmation' => 'min:3|max:200|same:new_password',
        ]);
        $bune = users::find(Auth::id());

        $user_first_name = $bune->first_name;
        $user_last_name = $bune->last_name;
        $phone = $bune->phone;
        $mail = $bune->email;
        if ($bune->password = $request->password_now) {
            $bune->password = bcrypt($request->new_password);
            $bune->save();
        } else {
            return redirect()->back()->with('error_password', 'Yanlış şifre girdiniz');
        }

        return redirect()->back()->with('success', 'Kullanıcı bilgileriniz başarıyla güncellendi');

    }

    public function store_custumize(Request $request)
    {
        $request->validate([
            'company_name' => 'min:3|max:200',
            'company_email' => 'min:3|max:200',
        ]);
        $bune = users::find(Auth::id());

        $user_first_name = $bune->first_name;
        $user_last_name = $bune->last_name;
        $phone = $bune->phone;
        $mail = $bune->email;
        $bune->company_name = $request->company_name;
        $bune->company_email = $request->company_email;
        $bune->save();
        return redirect()->back()->with('success', 'Firma bilgileriniz başarıyla güncellendi');

    }
    public function location()
    {
        $externalContent = file_get_contents('http://checkip.dyndns.com/');
        preg_match('/Current IP Address: \[?([:.0-9a-fA-F]+)\]?/', $externalContent, $m);
        $externalIp = $m[1];
//        $americaIp = '78.180.10.189';
        $geo = geoip()->getLocation($externalIp);
        $localiton = $geo->iso_code;
        if ($localiton === 'TR') {
            $lang = 'tr';
            App::setlocale($lang);
        } else if ($localiton === 'US') {
            $lang = 'en';
            App::setlocale($lang);
        } else if ($localiton === 'ES') {
            $lang = 'es';
            App::setlocale($lang);
        } else if ($localiton === 'DE') {
            $lang = 'de';
            App::setlocale($lang);
        }
    }
}
