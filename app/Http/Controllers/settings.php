<?php

namespace App\Http\Controllers;


use App\Models\cards;
use App\Models\packets;
use App\Models\packets_reels;
use App\Models\users;
use App\Parasut\Utils;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class settings extends Controller
{
    //

//    public const BASE_URL = "https://api.parasut.com/v4/422430/"; // TODO Change Required
//    protected const TOKEN_BASE_URL = "https://api.parasut.com/oauth/token";
//    static string $accessToken = '';
//    static string $refreshToken = '';
//    static $tokenExpiredAt = null;
//
//    static $clientId = null;
//    static $clientSecret = null;
//    static $username = null;
//    static $password = null;

    public function index(Request $request)
    {
        $parasut = (new \App\Parasut\Parasut());

//        $user = Auth::user();
//       $user_first_name = $user->first_name;
//       $user_last_name = $user->last_name;
//       $phone = $user->phone;
//       $mail = $user->email;
//        if (!empty(self::$refreshToken)) {
//            $params = [
//                'grant_type' => 'refresh_token',
//                'client_id' => dzFACO06aYS9hZjajasvbta6zTXCk34SdBhY0sG_UA,
//                'client_secret' => "nbIAXHyXLKBfsPh0gN3qfcjIfzUHVDSeFyIa2ijFDY",
//                'refresh_token' => self::$refreshToken
//            ];
//        } else {
//            $params = [
//                'grant_type' => "password",
//                'client_id' => "-dzFACO06aYS9hZjajasvbta6zTXCk34SdBhY0sG_UA",
//                'client_secret' => "-nbIAXHyXLKBfsPh0gN3qfcjIfzUHVDSeFyIa2ijFDY",
//                'username' => 'td21brs14@hotmail.com',
//                'password' => '199714brs',
//                'redirect_url' => 'urn:ietf:wg:oauth:2.0:oob',
//            ];
//        }
//        $Client = new Client();
//        $response = $Client->post("https://api.parasut.com/oauth/token", ['form_params' => $params]);
//        $response;
//        return view('pages/foruser/settings/settings', compact('user_first_name', 'user_last_name', 'phone', 'mail'));
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
}
