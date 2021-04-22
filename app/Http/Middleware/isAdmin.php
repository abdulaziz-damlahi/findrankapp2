<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {    if ( Auth::user()->userType == 'admin' ) {
        if(Auth::check()){
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
        }
        return $next($request);
        return redirect()->route('dashboard');
    }else{
        return redirect()->route('home')->with('permissionsError', 'Giriş Hakkınız Bulunmamaktadır!');
    }
    }

}
