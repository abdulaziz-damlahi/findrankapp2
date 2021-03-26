<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Iyzipay\Model\BasketItem;
use Iyzipay\Model\BasketItemType;
use Iyzipay\Options;
use App\Models\packets_reels;
use App\Models\packets;
use App\Models\requests;


use Illuminate\Routing\Controller;

class payment extends Controller
{
    //
    public static  function pay_post(requests $request){
        $paymentrequest = new \Iyzipay\Request\CreatePaymentRequest();
      /*  $packets_reel = packets_reels::all();
        $packets = packets::all()->first();
        foreach($packets_reel as $sad ){
            $keywordcount = packets_reels::where('names_packets', '=', $packets->packet_names)->first();
        }
        echo $keywordcount->price;
      */
            $clientIP = \Request::ip();
            $clientIP = \Request::getClientIp(true);
            $clientIP = Request()->ip();
            $externalContent = file_get_contents('http://checkip.dyndns.com/');
            preg_match('/Current IP Address: \[?([:.0-9a-fA-F]+)\]?/', $externalContent, $m);
            $externalIp = $m[1];
            $externalIp;
            $base_moeny='₺';
            $ippp = '2.16.7.255';
            $ippamerica= '1.32.232.0';
            $tr='78.180.10.189';
            $geo = geoip()->getLocation('78.180.10.189');
            $localiton=  $geo->iso_code;
            $packets_reel = packets_reels::all();
            $pack = $packets_reel->take(1)->first();
            $middle = $packets_reel->take(2)->last();
            $last = $packets_reel->take(3)->last();
            $money=  $pack->price;
            $money1=  $middle->price;
            $money2=  $last->price;
            $url = "https://api.exchangeratesapi.io/latest?base=TRY";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_URL, $url);
            $response = curl_exec($ch);
            $arr_result = json_decode($response);
            if($localiton==='TR'){
                $lang = 'tr';
                App::setlocale($lang);
                $locale = App::getLocale();
                $money_value=$money;
                $money_value1=$money1;
                $money_value2=$money2;
                $money_new_value=$pack->price;
                $money_new_value1=$middle->price;
                $money_new_value2=$last->price;
                $round_new  = round($money_new_value);
                $round_new1  = round($money_new_value1);
                $round_new2  = round($money_new_value2);

                $base_moeny='₺';
                echo "buraya girer";
            }
            else if($localiton==='US'){
                $lang = 'en';
                App::setlocale($lang);
                $locale = App::getLocale();
                $money_value=$arr_result->rates->USD;
                $money_new_value = $money1*$money_value;
                $money_new_value1 = $money*$money_value;
                $money_new_value2 = $money2*$money_value;
                $round_new  = round($money_new_value);
                $round_new1  = round($money_new_value1);
                $round_new2  = round($money_new_value2);
                echo "buraya girer2";

                $base_moeny='$';
            } else if($localiton==='ES'){
                $lang = 'es';
                App::setlocale($lang);
                $money_value=$arr_result->rates->EUR;
                $money_new_value = $money1*$money_value;
                $money_new_value1 = $money*$money_value;
                $money_new_value2 = $money2*$money_value;
                $round_new  = round($money_new_value);
                $round_new1  = round($money_new_value1);
                $round_new2  = round($money_new_value2);
                $base_moeny='€';
                echo "buraya girer3";

                $locale = App::getLocale();
            }else if($localiton==='DE') {
                $lang = 'de';
                App::setlocale($lang);
                $base_moeny = '€';
                $money_value = $arr_result->rates->EUR;
                $money_new_value = $money1 * $money_value;
                $money_new_value1 = $money * $money_value;
                $money_new_value2 = $money2 * $money_value;
                $round_new = round($money_new_value);
                $round_new1 = round($money_new_value1);
                $round_new2 = round($money_new_value2);
                echo "buraya girer4";

                $locale = App::getLocale();
            }else {
                $lang = 'de';
                App::setlocale($lang);
                $base_moeny = '€';
                $money_value = $arr_result->rates->EUR;
                $money_new_value = $money1 * $money_value;
                $money_new_value1 = $money * $money_value;
                $money_new_value2 = $money2 * $money_value;
                $round_new = round($money_new_value);
                $round_new1 = round($money_new_value1);
                $round_new2 = round($money_new_value2);
                echo "buraya girer5";

                $locale = App::getLocale();
            }
if($request->First_name_institutional!==""){
    $price = $request->input_price;
    $card_first_last_name= $request->card_first_last;
    $card_number= $request->card_number;
    $card_ay= $request->Ay;
    $card_yil= $request->Yil;
    $card_cvc= $request->CVC;
    dd($request);

    $paymentrequest->setConversationId("123456789");
    if(App::getLocale()=='de'){
        $paymentrequest->setCurrency(\Iyzipay\Model\Currency::EUR);
        $money_value=$arr_result->rates->EUR;
        $money_new_value = $price*$money_value;
        $paymentrequest->setPrice($money_new_value);
        $paymentrequest->setPaidPrice($money_new_value);
    }
    elseif(App::getLocale()=='tr'){
        $paymentrequest->setLocale(\Iyzipay\Model\Locale::TR);
        $paymentrequest->setPrice($price);
        $paymentrequest->setPaidPrice($price);
    }
    else{
        $paymentrequest->setCurrency(\Iyzipay\Model\Currency::USD);
        $money_value=$arr_result->rates->USD;
        $money_new_value = $price*$money_value;
        $paymentrequest->setPrice($money_new_value);
        $paymentrequest->setPaidPrice($money_new_value);
    }

    $paymentrequest->setInstallment(1);
    $paymentrequest->setBasketId("B67832");
    $paymentrequest->setPaymentChannel(\Iyzipay\Model\PaymentChannel::WEB);
    $paymentrequest->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
    $paymentCard = new \Iyzipay\Model\PaymentCard();
    $paymentCard->setCardHolderName($card_first_last_name);
    $paymentCard->setCardNumber($card_number);
    $paymentCard->setExpireMonth($card_ay);
    $paymentCard->setExpireYear($card_yil);
    $paymentCard->setCvc($card_cvc);
    $paymentCard->setRegisterCard(0);
    $paymentrequest->setPaymentCard($paymentCard);
    $buyer = new \Iyzipay\Model\Buyer();
    $buyer->setId(Auth::id());

    $buyer->setCity($request->city_information_institutional);
    $buyer->setCountry($request->country_information_institutional);
    $buyer->setName($request->First_name_institutional);
    $buyer->setSurname($request->last_name_institutional);
    $buyer->setGsmNumber($request->gsm_number_institutional);
    $buyer->setEmail($request->email_institutional);
    $buyer->setIdentityNumber($request->id_number);
    $buyer->setRegistrationAddress($request->invoiceAdress_institutional);
    $buyer->setIp("85.34.78.112");
    $paymentrequest->setBuyer($buyer);
    $shippingAddress = new \Iyzipay\Model\Address();
    $shippingAddress->setContactName($request->First_name_institutional);
    $shippingAddress->setCity($request->city_information_institutional);
    $shippingAddress->setCountry($request->country_information_institutional);
    $shippingAddress->setAddress($request->invoiceAdress_institutional);
    $billingAddress = new \Iyzipay\Model\Address();
    $billingAddress->setContactName($request->First_name_institutional);
    $billingAddress->setCity($request->city_information_institutional);
    $billingAddress->setCountry($request->country_information_institutional);
    $billingAddress->setAddress($request->invoiceAdress_institutional);
    $paymentrequest->setBillingAddress($billingAddress);
    $basketItem = new BasketItem();
    $basketItem->setId($request['input_id']);
    $basketItem->setName($request['input_id'] . " Service");
    $basketItem->setCategory1($request['input_id']);
    $basketItem->setItemType(BasketItemType::VIRTUAL);
    if(App::getLocale()=='de'){
        $money_value=$arr_result->rates->EUR;
        $money_new_value = $price*$money_value;
        $basketItem->setPrice($money_new_value);

    }
    elseif(App::getLocale()=='tr'){
        $basketItem->setPrice($price);
    }
    else{
        $money_value=$arr_result->rates->USD;
        $money_new_value = $price*$money_value;
        $basketItem->setPrice($money_new_value);
    }
    $paymentrequest->setBasketItems([$basketItem]);

}
else{
    $price = $request->input_price;
    $card_first_last_name= $request->card_first_last;
    $card_number= $request->card_number;
    $card_ay= $request->Ay;
    $card_yil= $request->Yil;
    $card_cvc= $request->CVC;


    $paymentrequest->setConversationId("123456789");
    if(App::getLocale()=='de'){
        $paymentrequest->setCurrency(\Iyzipay\Model\Currency::EUR);
        $money_value=$arr_result->rates->EUR;
        $money_new_value = $price*$money_value;
        $paymentrequest->setPrice($money_new_value);
        $paymentrequest->setPaidPrice($money_new_value);
    }
    elseif(App::getLocale()=='tr'){
        $paymentrequest->setCurrency(\Iyzipay\Model\Currency::TR);
        $paymentrequest->setPrice($price);
        $paymentrequest->setPaidPrice($price);
    }
    else{
        $paymentrequest->setCurrency(\Iyzipay\Model\Currency::USD);
        $money_value=$arr_result->rates->USD;
        $money_new_value = $price*$money_value;
        $paymentrequest->setPrice($money_new_value);
        $paymentrequest->setPaidPrice($money_new_value);
    }
    $paymentrequest->setInstallment(1);
    $paymentrequest->setBasketId("B67832");
    $paymentrequest->setPaymentChannel(\Iyzipay\Model\PaymentChannel::WEB);
    $paymentrequest->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
    $paymentCard = new \Iyzipay\Model\PaymentCard();
    $paymentCard->setCardHolderName($card_first_last_name);
    $paymentCard->setCardNumber($card_number);
    $paymentCard->setExpireMonth($card_ay);
    $paymentCard->setExpireYear($card_yil);
    $paymentCard->setCvc($card_cvc);
    $paymentCard->setRegisterCard(0);
    $paymentrequest->setPaymentCard($paymentCard);
    $buyer = new \Iyzipay\Model\Buyer();
    $buyer->setName($request->firstName_personal);
    $buyer->setSurname($request->last_namee_personal);
    $buyer->setGsmNumber($request->gsm_number_personal);
    $buyer->setEmail($request->email_personal);
    $buyer->setIdentityNumber($request->identification_number);

    $buyer->setRegistrationAddress($request->invoice_address_personal);
    $buyer->setIp($geo);
    $buyer->setCity($request->cities_personal);
    $buyer->setCountry($request->countries_personal);
    $paymentrequest->setBuyer($buyer);
    $shippingAddress = new \Iyzipay\Model\Address();
    $shippingAddress->setContactName($request->First_name_institutional);
    $shippingAddress->setCity($request->cities_personal);
    $shippingAddress->setCountry($request->countries_personal);
    $shippingAddress->setAddress($request->invoice_address_personal);
    $billingAddress = new \Iyzipay\Model\Address();
    $billingAddress->setContactName($request->First_name_institutional);
    $billingAddress->setCity($request->cities_personal);
    $billingAddress->setCountry($request->countries_personal);
    $billingAddress->setAddress($request->invoice_address_personal);
    $paymentrequest->setBillingAddress($billingAddress);
    $basketItem = new BasketItem();
    $basketItem->setId($request['input_id']);
    $basketItem->setName($request['input_id'] . " Service");
    $basketItem->setCategory1($request['input_id']);
    $basketItem->setItemType(BasketItemType::VIRTUAL);
    if(App::getLocale()=='de'){
        $paymentrequest->setCurrency(\Iyzipay\Model\Currency::EUR);
        $money_value=$arr_result->rates->EUR;
        $money_new_value = $price*$money_value;
        $basketItem->setPrice($money_new_value);

    }
    elseif(App::getLocale()=='tr'){
        $paymentrequest->setCurrency(\Iyzipay\Model\Currency::TR);
        $basketItem->setPrice($price);
    }
    else{
        $paymentrequest->setCurrency(\Iyzipay\Model\Currency::USD);
        $money_value=$arr_result->rates->USD;
        $money_new_value = $price*$money_value;
        $basketItem->setPrice($money_new_value);
    }
    $paymentrequest->setBasketItems([$basketItem]);

}


$payment = \Iyzipay\Model\Payment::create($paymentrequest, self::getOptions());
        $payment = json_decode($payment->getRawResult(), true);
        if ($payment['status'] === "success") {
            $success_message = "Payment Successful !";
        }
        else{
            $success_message = "Payment Unsuccessful !";
        }

        return view('pages/packets/packets',compact('success_message','payment','base_moeny','round_new','round_new1','round_new2','money_new_value','locale','localiton','lang','packets_reel','last','pack','middle','money_new_value'));

    }
    public static function getOptions()
    {
        $options = new Options();
        $options->setApiKey(('sandbox-bKyrtLaD0GOHCMtzDSfSMireECiKxAVC'));
        $options->setSecretKey(('sandbox-KYxvzIudKKMzhCiXx8rRbYCmi4N4tdgm'));
        $options->setBaseUrl(('https://sandbox-api.iyzipay.com'));
        return $options;
    }
}
