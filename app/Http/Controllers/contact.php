<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactMail;
use App\Models\footer;

use Illuminate\Support\Facades\Mail;



class contact extends Controller
{
    //
    public function index (Request $request){
        $footer=footer::where('id', '=', 1)->get();
        return view('pages/contact/contact',compact('footer'));
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
        $footer=footer::where('id', '=', 1)->get();
        Mail::to('td21brs14@hotmail.com')->send(new ContactMail($data));
        return view('pages/contact/contact',compact('footer'))->with('success','Mesajınız başarıyla iletildi');
    }

}
