<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginByPassPostRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\users;
use App\Parasut\Parasut;
use App\Models\packets;
use App\Parasut\Jobs\InsertUserToParasut;
use Illuminate\Support\Facades\App;
use App\Parasut\Enums\ParasutEndPoint;
use App\Parasut\Models\ParasutRequestModel;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
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
        $this->location();
        $user = auth()->user();
        return view('pages/login/login');
    }

    public function Loginpost(Request $request,users $userss)
    {
        if (Auth::attempt(['email' => $request->email,
            'password' => $request->password])) {
            $user=Auth::user();
            echo Auth::id();
            echo $user['first_name'];
            echo "gelmediisadsa";
            $parasut = new Parasut();
            $response = $parasut->create(
                ParasutEndPoint::Contacts(),
                new ParasutRequestModel(null, 'contacts', [
                    "email" => $user['email'],
                    "name" => $user['first_name'] . ' ' . $user['last_name'],
                    "contact_type" => "person",
                    "phone" => $user['phone'],
                    "is_abroad" => false,
                    "archived" => false,
                    "account_type" => "customer"
                ])
            );
            users::where('id',Auth::id())->update(['parasut_customer_id' => $response['data']['id']]);
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
        $this->location();
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
        $this->location();
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
