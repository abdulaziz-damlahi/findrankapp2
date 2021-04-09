<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\App;

class contact extends Controller
{
    //
    public function index (Request $request){
        $this->location();
        return view('pages/contact/contact');
}
    public function post (Request $request){
        $request->validate([
            'firstname' => 'required|max:255|min:5',
            'lastname' => 'required',
            'mail' => 'nullable',
            'phone' => 'nullable',
        ]);
       $firstname= $request->firstname;
       $lastname = $request->lastname;
       $mail= $request->mail;
       $phone= $request->phone;
        $data=[
          'title'=>$firstname,
          'body'=>$lastname,
          'mail'=>$mail,
          'phone'=>$phone,
        ];

        Mail::to('td21brs14@hotmail.com')->send(new ContactMail($data));
        return view('pages/contact/contact')->with('success','Mesajınız başarıyla iletildi');
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
