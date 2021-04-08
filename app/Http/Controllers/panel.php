<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Event;
use App\Models\packets;
use App\Models\users;
use App\Models\websites;
use App\Models\keywords;
use App\Models\invoicerecords;
use App\Models\keywordRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Events\ActionEvent;
use Illuminate\Support\Facades\DB;

class panel extends Controller
{
    public static $data;
    public function index(packets $packets,users $user,invoicerecords $invoiceRecord)
    {

// Formulate the Difference between two dates
    /*    $diff = abs($date2 - $date1);
        echo $diff."<br>";
        $bolum = $diff/60;
        $minute = floor($bolum);
        echo(Carbon::now())."<br>";

        if($minute=2){
            echo "büyük";
        }
        else{
            echo "küçük";
        }*/
    /*    $emailJob = new updateUser($user,$invoiceRecord);
        $deneme = dispatch($emailJob);
        foreach($deneme as $dene){
            echo $dene."<br>" ;
        }
        $emailJob2 = new createInvoice($packets,$user);
        dispatch($emailJob2);
    */
        $user = auth()->user();
        $userId = $user->id;
        $userwebsites8 = websites::where('user_id','=',$userId)->orderByDesc('wordcount')->take(3)->get();
       $username = $user->first_name;
        $keywordrequest = keywordRequest::where('user_id', '=', $userId)->get();
        $userwebsites8 = websites::where('user_id', '=', $userId)->orderByDesc('wordcount')->take(3)->get();
        $userwebsites = websites::where('user_id', '=', $userId)->get();
        $userkeywordcount = keywords::where('user_id', '=', $userId)->count();
        $userwebsitecount = websites::where('user_id', '=', $userId)->count();

        $packetdata = packets::where('user_id','=',$userId)->get()->first();

        for ($x = 1; $x < $userkeywordcount; $x++) {
            $keywordcount = keywords::where('website_id', '=', $x)->get('website_id')->count();
            websites::where('user_id', '=', $userId)->update(['wordcount' => $keywordcount]);
        }
        return view('pages/panel/panel', compact('user', 'userwebsites8','packetdata'));
    }

    public function addwebsite(Request $request)
    {
        $request->validate([
            'website' => 'min:3|max:255',
        ]);
        $user = auth()->user();
        $userId = $user->id;
        $website = new websites;
        $website->website_name = $request->website;
        $website->user_id = $userId;
        $website->user_id = $userId;
        $website->wordcount = 0;
        $website->save();
        return redirect('user/panel');
    }

    public function addword(Request $request)
    {
        $request->validate([
            'website' => 'min:3|min:255',
        ]);
        $user = auth()->user();
        $userId = $user->id;
        $webid = $request->websiteid;

        $keyword = new keywords;
        $keyword->name = $request->keyword;
        $keyword->country = $request->country;
        $keyword->language = $request->language;
        $keyword->device = $request->device;
        $keyword->city = $request->city;
        $keyword->rank = 0;
        $keyword->website_id = $webid;
        $keyword->user_id = $userId;

        $keyword->save();
        return redirect()->back();
    }


    public function deletewebsite($id)
    {

        DB::delete('delete from websites where id = ?', [$id]);
        return redirect('user/panel');
    }

    public function editkeyword($id)
    {
        $currentKeyword = keywords::findOrFail($id);

        return view('pages/websitelist/editkeyword', compact('currentKeyword'));
    }

    public function updatekeyword(Request $request, $id)
    {
        keywords::where('id', '=', $id)->update([
            'name' => $request->keyword,
            'country' => $request->country,
            'language' => $request->language,
            'device' => $request->device,
            'city' => $request->city,
        ]);;
        return redirect()->back();
    }

    public function deletekeyword($id)
    {
        DB::delete('delete from keywords where id = ?', [$id]);
        return redirect()->back();
    }

    public function websitelist($websiteid)
    {
        return view('pages/websitelist/websitelist', compact('websiteid'));


    }

    public function grafik($id)
    {
         $keywordid= keywords::where('id','=',$id)->get('id');
        $keywordidnum = (int)filter_var($keywordid, FILTER_SANITIZE_NUMBER_INT);
        if ($id !=$keywordidnum ){return abort(404);}
//        $rank1 = keywordRequest::where('keyword_id', '=', $id)->orderBy('id', 'DESC')->get('rank')->skip(0)->first();
//        $rank1num = (int)filter_var($rank1, FILTER_SANITIZE_NUMBER_INT);
//        $rank2 = keywordRequest::where('keyword_id', '=', $id)->orderBy('id', 'DESC')->get('rank')->skip(1)->first();
//        $rank2num = (int)filter_var($rank2, FILTER_SANITIZE_NUMBER_INT);
//        $rank3 = keywordRequest::where('keyword_id', '=', $id)->orderBy('id', 'DESC')->get('rank')->skip(2)->first();
//        $rank3num = (int)filter_var($rank3, FILTER_SANITIZE_NUMBER_INT);
//        $rank4 = keywordRequest::where('keyword_id', '=', $id)->orderBy('id', 'DESC')->get('rank')->skip(3)->first();
//        $rank4num = (int)filter_var($rank4, FILTER_SANITIZE_NUMBER_INT);
//        $rank5 = keywordRequest::where('keyword_id', '=', $id)->orderBy('id', 'DESC')->get('rank')->skip(4)->first();
//        $rank5num = (int)filter_var($rank5, FILTER_SANITIZE_NUMBER_INT);
//        $rank6 = keywordRequest::where('keyword_id', '=', $id)->orderBy('id', 'DESC')->get('rank')->skip(5)->first();
//        $rank6num = (int)filter_var($rank6, FILTER_SANITIZE_NUMBER_INT);
//        $rank7 = keywordRequest::where('keyword_id', '=', $id)->orderBy('id', 'DESC')->get('rank')->skip(6)->first();
//        $rank7num = (int)filter_var($rank7, FILTER_SANITIZE_NUMBER_INT);
        return view('pages/websitelist/grafik', compact('id'));
    }
    public function profile()
    {

        return view(
            'pages/findorder');
        $user = auth()->user();
        $userId = $user->id;
          $packetdata = packets::where('user_id','=',$userId)->get()->first();
          echo $packetdata;
        return view('pages/panel/profile',compact('packetdata'));
    }

    public function FindOrder()
    {return view('pages/findorder');}

    public function findPost(Request $request)
    {
        event(new ActionEvent($request));
       $request->hidden_collonial_name;
        $colonial_name = $request->hidden_collonial_name;
        $device_information = $request->hidden_device_name;
        $website_request = $request->website;
        $keyword_request = $request->keyword;
        $language = $request->language_name;
        $array_all = [
            'colonial_name'=>$colonial_name,
            'device'=>$device_information,
            'website'=>$website_request,
            'keyword'=>$keyword_request,
            'language'=>$language
        ];
        $arraydeeneme=["colonial name"=>$colonial_name];
        $hidden_collonial_name = json_encode($arraydeeneme);
        $client = new Client([
            'headers' => [ 'Content-Type' => 'application/json' ]
        ]);
        $response = $client->post('http://localhost:3000/',
            ['body' => json_encode(
                [
                    'colonial_name2'=>$colonial_name,
                    'device'=>$device_information,
                    'website'=>$website_request,
                    'keyword'=>$keyword_request,
                    'language'=>$language
                ]
            )]
        );
        return $response;
            echo "girdi";


        /*
        $packets =  packets::all();
        if(count($packets)>0) {
            $id = $packets[0]->id;
            $countrank = $packets[0]->rank_follow;
            $new=$countrank+1;
            echo $new;
            $rank_follow_max = $packets[0]->rank_follow_max;
            if ($rank_follow_max == $countrank) {
                return redirect()->route('findorder')->withErrors('Paket hakkınız dolmuştur');
            } else {
                $colonial_name = $request->hidden_collonial_name;
                $device_information = $request->hidden_device_name;
                $website_request = $request->website;
                $keyword_request = $request->keyword;
                $language = $request->language_name;
                $ch = curl_init();

                $keywords = "hemengeliriz.com/";
                $aranansite = "https://www.hemengeliriz.com/";
                $aranan = urlencode($keyword_request);
                echo $aranan . "gelidi";
                $saayfa_basina_sonuc = 100;

                $sa = $colonial_name;
                $kelime = $aranan;
                $ne = base64_encode($sa);

                if ($language == 'english') {
                    $len = 'en';
                } elseif($language == 'arabic'){
                    $len = 'ar';
                }
                else {
                    $len = 'tr';
                }
                $yeni = 0;
                $saayi = strlen($sa);
                echo $saayi;
                $say = 5;
                echo gettype($saayi);

                if ($saayi == 4) {
                    $saaa = 'E';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 5) {
                    $saaa = 'F';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 6) {
                    $saaa = 'G';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 7) {
                    $saaa = 'H';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 8) {
                    $saaa = 'I';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 9) {
                    $saaa = 'J';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 10) {
                    $saaa = 'K';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 11) {
                    $saaa = 'L';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 12) {
                    $saaa = 'M';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 13) {
                    $saaa = 'N';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 14) {
                    $saaa = 'O';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 15) {
                    $saaa = 'P';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 16) {
                    $saaa = 'Q';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 17) {
                    $saaa = 'R';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 18) {
                    $saaa = 'S';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 19) {
                    $saaa = 'T';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 20) {
                    $saaa = 'U';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 21) {
                    $saaa = 'V';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 22) {
                    $saaa = 'W';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 23) {
                    $saaa = 'X';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 24) {
                    $saaa = 'Y';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 25) {
                    $saaa = 'Z';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 26) {
                    $saaa = 'a';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 27) {
                    $saaa = 'b';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 28) {
                    $saaa = 'c';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 29) {
                    $saaa = 'd';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 30) {
                    $saaa = 'e';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 31) {
                    $saaa = 'f';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 32) {
                    $saaa = 'g';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 33) {
                    $saaa = 'h';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 34) {
                    $saaa = 'i';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 35) {
                    $saaa = 'j';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 36) {
                    $saaa = 'k';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 37) {
                    $saaa = 'ı';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 38) {
                    $saaa = 'm';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 39) {
                    $saaa = 'n';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 40) {
                    $saaa = 'o';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 41) {
                    $saaa = 'p';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 42) {
                    $saaa = 'q';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 43) {
                    $saaa = 'r';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 44) {
                    $saaa = 's';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 45) {
                    $saaa = 't';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 46) {
                    $saaa = 'u';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 47) {
                    $saaa = 'v';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 48) {
                    $saaa = 'w';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 49) {
                    $saaa = 'x';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 50) {
                    $saaa = 'y';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 51) {
                    $saaa = 'z';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 52) {
                    $saaa = '0';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 53) {
                    $saaa = '1';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 54) {
                    $saaa = '2';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 55) {
                    $saaa = '3';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 56) {
                    $saaa = '4';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 57) {
                    $saaa = '5';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 58) {
                    $saaa = '6';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 59) {
                    $saaa = '7';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 60) {
                    $saaa = '8';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 61) {
                    $saaa = '9';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 64) {
                    $saaa = 'A';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 65) {
                    $saaa = 'B';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 66) {
                    $saaa = 'C';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 67) {
                    $saaa = 'D';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 68) {
                    $saaa = 'E';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 69) {
                    $saaa = 'F';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 70) {
                    $saaa = 'G';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 71) {
                    $saaa = 'H';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 72) {
                    $saaa = 'I';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 73) {
                    $saaa = 'J';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 76) {
                    $saaa = 'M';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 83) {
                    $saaa = 'T';
                    $yeni = $saaa . $ne;
                } else if ($saayi == 89) {
                    $saaa = 'L';
                    $yeni = $saaa . $ne;
                }
                echo "colonial name = " . $sa . "<br>";
                echo "colonial base64 = " . $ne . "<br>";
                echo "birleşmiş base64 = " . $yeni . "<br>";

                $degise = 'https://www.google.com/search?ie=UTF-8&oe=UTF-8&hl=' . $len . '&num=100&q=' . $kelime . '&uule=w+CAIQICI' . $yeni;

                echo "url : " . $degise;
                curl_setopt_array($ch, [
                    CURLOPT_URL => $degise,
                    CURLOPT_USERAGENT => $device_information,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_SSL_VERIFYHOST => false,
                    CURLOPT_SSL_VERIFYPEER => false,
                ]);
                $response = curl_exec($ch);
                if ($len == 'ar') {
                    echo "girdi";
                    if($device_information==='Mozilla/5.0 (iPhone; CPU iPhone OS 7_0_4 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) CriOS/45.0.2454.68 Mobile/11B554a Safari/9537.53'){
                        preg_match_all('@<span class="Zu0yb UGIkD qzEoUe">(.*?)<span dir="ltr">(.*?)<\/span><\/span>@', $response, $resultss, PREG_SET_ORDER, 0);
                    }
                    else{
                        echo 'buraya girer';
                        preg_match_all('@<div class="TbwUpd NJjxre"><cite class="iUh30 Zu0yb qLRx3b tjvcx"><span dir="ltr">(.*?)</span><span class="dyjrff qzEoUe">(.*?)<\/span><\/cite><\/div>@', $response, $resultss, PREG_SET_ORDER, 0);
                    }
                } else{
                    if($device_information==='Mozilla/5.0 (iPhone; CPU iPhone OS 7_0_4 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) CriOS/45.0.2454.68 Mobile/11B554a Safari/9537.53'){
                        preg_match_all('@<span class="Zu0yb UGIkD qzEoUe">(.*?)<span class="kbNtnf">(.*?)<\/span><\/span>@', $response, $resultss, PREG_SET_ORDER, 0);
                        echo 'buraya girer2';

                    }
                    else {
                        echo 'buraya girer2';

                        preg_match_all('@<div class="TbwUpd NJjxre"><cite class="iUh30 Zu0yb(.*?)">(.*?)<\/cite><\/div>@', $response, $resultss, PREG_SET_ORDER, 0);
                    }
                }
                $lastElement = last($resultss);
                if($resultss==[]){
                    echo "ip değiş";
                    $burasi=343143;
                    echo "dönmediasdsa";
                    $result=0;
                    echo "ip değiş";


                }
                else{
                    foreach ($resultss as $keyo=>$result){
                        if(strpos($result[0],$website_request) !== true){
                            $burasi =$keyo;
                        }
                        else{
                            $burasi=343143;
                        }
                    }
                }
                curl_close($ch);
                packets::where('id',$id)->update(['rank_follow'=>$new]);
        */
                return view(
                    'pages/findorder', compact( 'response','language', 'colonial_name', 'device_information', 'website_request', 'keyword_request'));
        }




    public function userspacket()
    {
        $user = users::find(2);
        $user->packets;
        return $user;
    }

    public
    function userswebsite()
    {
        $user = users::find(1);
        $user->websites;
        return $user;
    }

    public
    function packetwebsite()
    {
        $packet = packets::find(1);
        $packet->websites;
        return $packet;
    }

    public function websitekeyword()
    {
        $website = websites::find(1);
        $website->keywords;
        $website;
    }
}
