<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;


class contact extends Controller
{
    //
    public function index (Request $request){
        return view('pages/contact/contact');
}
    public function post (Request $request){
        dd($request);
        $details=[
          'title'=>'başarılı',
          'body'=>'this is ',
        ];
        \Mail::to('bariss.be@gmail.com')->send(new \App\Mail\SendEmails($details));
        echo 'Email';
        return view('pages/contact/contact');
    }

}