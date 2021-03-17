<?php

namespace App\Http\Controllers;

use App\Models\packets;
use App\Models\users;
use App\Models\websites;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class panel extends Controller
{
    public function index()
    {
        $user = auth()->user();
        return view(
            'pages/panel/panel', compact('user'));
    }

    public function profile()
    {
        return view(
            'pages/panel/profile');
    }

    public function FindOrder()
    {
        return view(
            'pages/findorder');
    }

    public function findPost(Request $request)
    {
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
        ]);
        $response = curl_exec($ch);
        preg_match_all('@<div class="TbwUpd NJjxre"><cite class="iUh30 Zu0yb qLRx3b tjvcx">(.*?)</div>@', $response, $resultss);

        foreach ($resultss as $result) {
    print_r($result);



        }
        curl_close($ch);


        return view(
            'pages/findorder', compact('result', 'degise', 'ch', 'resultss', 'sa', 'language', 'colonial_name', 'device_information', 'website_request', 'keyword_request'));
    }

    public function findPost_T(Request $request)
    {


        $colonial_name = $request['colonial_name'];
        return response()->json([
            'message' => 'veri geldi',
            "website" => $request['website'],
            "keyword" => $request['keyword'],
            "language" => $request['language'],
            "location name" => $colonial_name,
        ], 200);

    }

    public function userspacket()
    {
        $user = users::find(2);
        $user = auth()->user();
        $user->packets;
        return $user;
    }

    public function userswebsite()
    {
        $user = users::find(1);
        $user->websites;
        return $user;
    }

    public function packetwebsite()
    {
        $packet = packets::find(1);
        $packet->websites;
        return $packet;
    }

    public function websitekeyword()
    {
        $website = websites::find(1);
        $website->keywords;
        return $website;
    }
}
