<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginByPassPostRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\users;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Propaganistas\LaravelPhone\PhoneNumber;

class Login extends Controller
{
    //
    public function index (Request $request){
return view('pages/login/login');

}
    public function Loginpost (Request $request){
 if(Auth::attempt(['email'=>$request->email,
     'password'=>$request->password])){
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
        $user = users::get();
        dd($user);
            $user = $user->first();
            if (Hash::check($request['password'], $user['password'])) {
                Auth::login($user, true);
                $user = Auth::user();
                return response()->json([
                    'message' => 'Başarıyla giriş yapıldı',
                ], 200);
            }

    }

    public function registerPost (Request $request){
        users::create([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'phone' => $request->phone,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        ]);
        return redirect()->route('login')->with('success','success messages');

        }
public function logout(){
        Auth::logout();
        return redirect()->route('login');
}
}
