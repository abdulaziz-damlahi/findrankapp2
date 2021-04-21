<?php

namespace App\Console\Commands;

use GuzzleHttp\Client;
use Illuminate\Console\Command;
use App\Models\websites;
use App\Models\keywords;
use App\Models\users;
use App\Models\KeywordRequest;
use App\Models\packets;
use App\Models\AllGoogleSearchDatas;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class rank_follow extends Command
{
    /**
     * The name and signature of the console command.
     * @var string
     */
    protected $signature = 'rank_follow:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //  $keywords = keywords::get()->id;
        $keywords = keywords::all();
        $websites = websites::get();
        $keyword_id = keywords::all();
        $AllGoogleSearchDatas = AllGoogleSearchDatas::all();
        $KeywordRequest = KeywordRequest::all();
        $keyword_id2 = keywords::get('website_id');
        $packets = packets::all();
        //   $websie=  DB::table('websites')->find();
    /*    foreach ($websites as $website_id) {
            $result = keywords::with('website')->where('website_id', $website_id->id)->get();
            foreach ($result as $anahtar => $resultsasa) {
                $sonucc = KeywordRequest::where('keyword_id', $resultsasa->id)->get();

                // it will INSERT a new record

                $keyword = $resultsasa->name;
                $website_name = $resultsasa->website[0]->website_name;

                if ($resultsasa->device == 'Mobil') {
                    $device_name = "Mozilla/5.0 (iPhone; CPU iPhone OS 7_0_4 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) CriOS/45.0.2454.68 Mobile/11B554a Safari/9537.53";
                } else {
                    $device_name = "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.90 Safari/537.36s";
                }
                $packets = packets::all();
    */
                if (count($packets) > 0) {
                    foreach ($AllGoogleSearchDatas as $allgoogle){
                    if($allgoogle->processtime=='Night'){
                        $device_name=    $allgoogle->device;
                        $website_name=    $allgoogle->website;
                        $keyword=    $allgoogle->keyword;
                    $ch = curl_init();
                    $colonial_name = $allgoogle->colonial_name;
                    $aranan = urlencode($allgoogle->keyword);
                    $language = $allgoogle->language;
                    $sa = $colonial_name;
                    $kelime = $aranan;
                    $ne = base64_encode($sa);
                    $client = new Client([
                        'headers' => [ 'Content-Type' => 'application/json' ]
                    ]);
                    $response = $client->post('http://localhost:3000/panel',
                        ['body' => json_encode(
                            [
                                'colonial_name' => $colonial_name,
                                'device' => $device_name,
                                'website' => $website_name,
                                'keyword' => $keyword,
                                'language' => $language,
                            ]
                        )]
                    );
                }
                }

                    /*
                                                        if ($language == 'english') {
                                                            $len = 'en';
                                                            echo "1 buraasqdwq ";
                                                        } elseif($language =='turkish') {
                                                            $len = 'tr';
                                                            echo "3 buraasqdwq";
                                                        }
                                                        elseif($language =='arabic'){
                                                            $len = 'ar';
                                                            echo "2 buraasqdwq";

                                                        }
                                                        $saayi = strlen($sa);
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
                                                        $degise = +'https://www.google.com/search?ie=UTF-8&oe=UTF-8&hl=' . $len . '&num=100&q=' . $kelime . '&uule=w+CAIQICI' . $yeni;
                                                        echo $degise;
                                                        curl_setopt_array($ch, [
                                                            CURLOPT_URL => $degise,
                                                            CURLOPT_USERAGENT => $device_name,
                                                            CURLOPT_RETURNTRANSFER => true,
                                                            CURLOPT_FOLLOWLOCATION => true,
                                                            CURLOPT_SSL_VERIFYHOST => false,
                                                            CURLOPT_SSL_VERIFYPEER => false,
                                                        ]);
                                                        $response = curl_exec($ch);
                                                        if($resultsasa->device=='Mobil') {
                                                            if ($len === 'ar') {
                                                                echo 'girdi';
                                                                preg_match_all('@<span class="Zu0yb UGIkD qzEoUe"><span dir="ltr">(.*?)</span><span class="kbNtnf">(.*?)<\/span><\/span>@', $response, $resultss, PREG_SET_ORDER, 0);


                                                            }
                                                            else{
                                                                echo 'burasu len ar olmayan';
                                                                preg_match_all('@<span class="Zu0yb UGIkD qzEoUe">(.*?)<span class="kbNtnf">(.*?)<\/span><\/span>@', $response, $resultss, PREG_SET_ORDER, 0);


                                                            }


                                                        }elseif($resultsasa->device=='Masaüstü')
                                                        {      if ($len === 'ar') {
                                                            echo 'nereye2';

                                                            preg_match_all('@<div class="TbwUpd NJjxre"><cite class="iUh30 Zu0yb qLRx3b tjvcx"><span dir="ltr">(.*?)</span><span class="dyjrff qzEoUe">(.*?)<\/span><\/cite><\/div>@', $response, $resultss, PREG_SET_ORDER, 0);

                                                        }
                                                        else{
                                                            echo 'nereye';

                                                            preg_match_all('@<div class="TbwUpd NJjxre"><cite class="iUh30 Zu0yb qLRx3b tjvcx">(.*?)<span class="dyjrff qzEoUe">(.*?)<\/span><\/cite><\/div>@', $response, $resultss, PREG_SET_ORDER, 0);

                                                        }


                                                        }
                                                        if(!empty($resultss)){

                                                        foreach ($resultss as $keyyy=>$resultsaasda){
                                                            if(strpos($resultsaasda[1],$website_name) !== false){
                                                                echo $resultsaasda[1];
                                                                $resultsasa->rank=$keyyy;
                                                                $keywordRequest2 = new KeywordRequest;
                                                                $keywordRequest2->rank=$keyyy;
                                                                $keywordRequest2->keyword_id=$resultsasa->id;
                                                                $keywordRequest2->user_id=$resultsasa->user_id;
                                                                $resultsasa->save();
                                                                $keywordRequest2->save();
                                                            }
                                                            else{
                                                            }
                                                        }
                                                       }else{
                                                           echo "ip değiş";
                                                       }

                                                        curl_close($ch);
                                                    }


                                            }sleep(2);}

                                    //   $websites2 = keywords::find($websites->id);

                                    //   $userkeywordcount = keywords::where('website_id', '=', $websites)->get('name');

                                    //   $this->info($userkeywordcount);

                    */

                }

    }
}