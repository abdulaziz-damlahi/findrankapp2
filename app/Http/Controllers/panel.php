<?php

namespace App\Http\Controllers;

use App\Models\packets;
use App\Models\users;
use App\Models\websites;
use App\Models\footer;
use App\Models\keywords;
use App\Models\keywordRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class panel extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $userId = $user->id;
        $userwebsites8 = websites::where('user_id', '=', $userId)->orderByDesc('wordcount')->take(3)->get();
        $username = $user->first_name;
        $keywordrequest = keywordRequest::where('user_id', '=', $userId)->get();
        $userwebsites8 = websites::where('user_id', '=', $userId)->orderByDesc('wordcount')->take(3)->get();
        $userwebsites = websites::where('user_id', '=', $userId)->get();
        $userkeywordcount = keywords::where('user_id', '=', $userId)->count();
        $userwebsitecount = websites::where('user_id', '=', $userId)->count();
        packets::where('user_id', '=', $userId)->update([
            'count_of_words' => $userkeywordcount,
            'count_of_websites' => $userwebsitecount,
        ]);
        $packetdata = packets::where('user_id', '=', $userId)->get()->first();
        for ($x = 1; $x < $userkeywordcount; $x++) {
            $keywordcount = keywords::where('website_id', '=', $x)->get('website_id')->count();
            websites::where('user_id', '=', $userId)->update(['wordcount' => $keywordcount]);
        }
         $footer=footer::where('id', '=', 1)->get();
        return view('pages/panel/panel', compact('user', 'userwebsites8', 'packetdata', 'footer'));
    }

    public function addwebsite(Request $request)
    {
        $user = auth()->user();
        $userId = $user->id;
        $maxwebsites = packets::where('user_id', '=', $userId)->get('max_count_of_websites');
        $website_count = packets::where('user_id', '=', $userId)->get('count_of_websites');
        $maxwebsitesfilterd = (int)filter_var($maxwebsites, FILTER_SANITIZE_NUMBER_INT);
        $filterwebsite_count = (int)filter_var($website_count, FILTER_SANITIZE_NUMBER_INT);

        if ($filterwebsite_count !== $maxwebsitesfilterd) {
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
            return redirect()->back()->with('success', 'Websiteniz Başarıyla Eklendi');
        } else {
            return redirect()->back()->with('notsuccess', 'Website Ekleme Hakkınız Bitmiştir');
        }
    }

    public function addword(Request $request)
    {
        $user = auth()->user();
        $userId = $user->id;
        $maxwkeywords = packets::where('user_id', '=', $userId)->get('max_count_of_words');
        $keword_count = packets::where('user_id', '=', $userId)->get('count_of_words');
        $maxkeywordfilterd = (int)filter_var($maxwkeywords, FILTER_SANITIZE_NUMBER_INT);
        $filterd_keyword_count = (int)filter_var($keword_count, FILTER_SANITIZE_NUMBER_INT);

        if ($filterd_keyword_count !== $maxkeywordfilterd) {
            $request->validate([
                'cantbeempty' => 'min:3|min:255',
            ]);

            $webid = $request->websiteid;
            $keyword = new keywords;
            if ($request->has('name')) {
                $keyword->name = $request->name;
            } else {
                return redirect()->back()->with('cantbeempty', 'keleme bos ekleden');
            }
            if ($request->has('country')) {
                $keyword->country = $request->country;
            } else {
                return redirect()->back()->with('cantbeempty', 'country bos ekleden');
            }
            if ($request->has('language')) {
                $keyword->language = $request->language;
            } else {
                return redirect()->back()->with('cantbeempty', 'language bos ekleden');
            }
            if ($request->has('device')) {
                $keyword->device = $request->device;
            } else {
                return redirect()->back()->with('cantbeempty', 'device bos ekleden');
            }
            if ($request->has('city')) {
                $keyword->city = $request->city;
            } else {
                return redirect()->back()->with('cantbeempty', 'city bos ekleden');
            }
            $keyword->rank = 0;
            $keyword->website_id = $webid;
            $keyword->user_id = $userId;
            $keyword->save();

            return redirect()->back()->with('success', 'keleme Başarıyla Eklendi');
        } else {
            return redirect()->back()->with('notsuccess', 'keleme Ekleme Hakkınız Bitmiştir');
        }
    }

    public function deletewebsite($id)
    {

        DB::delete('delete from websites where id = ?', [$id]);
        return redirect('user/panel');
    }

    public function editkeyword($id)
    {
        $currentKeyword = keywords::findOrFail($id);
        $footer=footer::where('id', '=', 1)->get();
        return view('pages/websitelist/editkeyword', compact('currentKeyword', 'footer'));
    }

    public function updatekeyword(Request $request, $id)
    {
             $name=$request->name;
        if ($name=== NULL){
            return redirect()->back()->with('notsuccess', 'please enter a word');
        }
            keywords::where('id', '=', $id)->update([
                'name' => $request->name,
            'country' => $request->country,
            'language' => $request->language,
            'device' => $request->device,
            'city' => $request->city,
        ]);

        return redirect()->back()->with('successupdated', 'successfully updated');
    }

    public function deletekeyword($id)
    {
        DB::delete('delete from keywords where id = ?', [$id]);
        return redirect()->back();
    }

    public function websitelist($websiteid)
    {
        $user = auth()->user();
        $userId = $user->id;
        $userkeywordcount = keywords::where('user_id', '=', $userId)->count();
        $userwebsitecount = websites::where('user_id', '=', $userId)->count();
        packets::where('user_id', '=', $userId)->update([
            'count_of_words' => $userkeywordcount,
            'count_of_websites' => $userwebsitecount,
        ]);
        $footer=footer::where('id', '=', 1)->get();
        return view('pages/websitelist/websitelist', compact('websiteid', 'footer'));
    }

    public function grafik($id)
    {
        $keywordid = keywords::where('id', '=', $id)->get('id');
        $keywordidnum = (int)filter_var($keywordid, FILTER_SANITIZE_NUMBER_INT);
        if ($id != $keywordidnum) {
            return abort(404);
        }
        $footer=footer::where('id', '=', 1)->get();
        return view('pages/websitelist/grafik', compact('id', 'footer'));
    }

    public function profile()
    {

        $user = auth()->user();
        $userId = $user->id;

        $packetdata = packets::where('user_id', '=', $userId)->get()->first();
        if ($packetdata == NULL) {
            return redirect()->back()->with('packetempty', 'buy packet from home page to view profile');
        }
        $footer=footer::where('id', '=', 1)->get();
        return view('pages/panel/profile', compact('packetdata', 'footer'));
    }

    public function FindOrder()
    {
        return view('pages/findorder');
    }

    public function findPost(Request $request)
    {
        $packets = packets::all();
        if (count($packets) > 0) {
            $id = $packets[0]->id;
            $countrank = $packets[0]->rank_follow;
            $new = $countrank + 1;
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
                } else {
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
                if ($len === 'ar') {

                    echo "girdi";
                    if ($device_information === 'Mozilla/5.0 (iPhone; CPU iPhone OS 7_0_4 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) CriOS/45.0.2454.68 Mobile/11B554a Safari/9537.53') {
                        preg_match_all('@<span class="Zu0yb UGIkD qzEoUe">(.*?)<span class="kbNtnf">(.*?)<\/span><\/span>@', $response, $resultss, PREG_SET_ORDER, 0);
                    } else {
                        echo 'buraya girer';
                        preg_match_all('@<div class="TbwUpd NJjxre"><cite class="iUh30 Zu0yb qLRx3b tjvcx"><span dir="ltr">(.*?)</span><span class="dyjrff qzEoUe">(.*?)<\/span><\/cite><\/div>@', $response, $resultss, PREG_SET_ORDER, 0);
                    }
                } else {
                    if ($device_information === 'Mozilla/5.0 (iPhone; CPU iPhone OS 7_0_4 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) CriOS/45.0.2454.68 Mobile/11B554a Safari/9537.53') {
                        preg_match_all('@<span class="Zu0yb UGIkD qzEoUe">(.*?)<span class="kbNtnf">(.*?)<\/span><\/span>@', $response, $resultss, PREG_SET_ORDER, 0);
                        echo 'buraya girer2';

                    } else {
                        echo 'buraya girer2';

                        preg_match_all('@<div class="TbwUpd NJjxre"><cite class="iUh30 Zu0yb qLRx3b tjvcx">(.*?)<span class="dyjrff qzEoUe">(.*?)<\/span><\/cite><\/div>@', $response, $resultss, PREG_SET_ORDER, 0);
                    }
                }

                foreach ($resultss as $key => $result) {

                }
                curl_close($ch);
                packets::where('id', $id)->update(['rank_follow' => $new]);
                $footer=footer::where('id', '=', 1)->get();
                return view(
                    'pages/findorder', compact('resultss', 'result', 'rank_follow_max', 'countrank', 'packets', 'degise', 'ch', 'resultss', 'sa', 'language', 'colonial_name', 'device_information', 'website_request', 'keyword_request', 'footer'));
            }
        }
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
