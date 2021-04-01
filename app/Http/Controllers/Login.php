<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginByPassPostRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\users;
use App\Models\packets;
use App\Models\footer;
use App\Models\packets_reels;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Propaganistas\LaravelPhone\PhoneNumber;

class Login extends Controller
{
    //
    public function index(Request $request)
    {
        $user = auth()->user();
        $footer=footer::where('id', '=', 1)->get();
        return view('pages/login/login',compact('footer'));

    }

    public function Loginpost(Request $request)
    {
        if (Auth::attempt(['email' => $request->email,
            'password' => $request->password])) {
            return redirect()->route('panel');

        }


        return redirect()->route('login')->withErrors('Email adresi yada şifre hatalı');


    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function loginByPass(Request $request)
    {

        if (Auth::attempt(['email' => $request->email,
            'password' => $request->password])) {

            Auth::login(Auth::user(), true);
            $user = Auth::user();
            $request->session()->regenerate();
            return response()->json([
                $user,
                'message' => 'Başarıyla giriş yapıldı',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Başarıyla giriş yapamadı',
                $request['password'],
            ], 200);
        }
    }
    public function registerPost(Request $request)
    {
        $requstemail = $request->email;
        $groupName = users::where('email', $request->email)->value('email');
       if(isset($groupName)){
           return redirect()->route('login')->withErrors('Bu email hesabı bulunmaktadır.');


       }
       else{
           users::create([
               'first_name' => $request->first_name,
               'last_name' => $request->last_name,
               'phone' => $request->phone,
               'email' => $request->email,
               'password' => bcrypt($request->password),



           ]);
           return redirect()->route('login')->withSuccess('Üyelik Başarılı');
       }


    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
