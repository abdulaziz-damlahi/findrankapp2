<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;



class contact extends Controller
{
    //
    public function index (Request $request){
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
        Mail::to('bariss.be@gmail.com')->send(new ContactMail($data));
        return view('pages/contact/contact')->with('success','Mesajınız başarıyla iletildi');
    }

}
