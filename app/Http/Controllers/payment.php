<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Iyzipay\Model\BasketItem;
use Iyzipay\Model\BasketItemType;
use Iyzipay\Options;
use App\Models\packets_reels;
use App\Models\packets;
use Illuminate\Routing\Controller;

class payment extends Controller
{
    //
    public function pay_post(Request $request){
        $paymentrequest = new \Iyzipay\Request\CreatePaymentRequest();
      /*  $packets_reel = packets_reels::all();
        $packets = packets::all()->first();
        foreach($packets_reel as $sad ){
            $keywordcount = packets_reels::where('names_packets', '=', $packets->packet_names)->first();
        }
        echo $keywordcount->price;
      */
if($request->First_name_institutional!==""){
    $price = $request->input_price;
    $card_first_last_name= $request->card_first_last;
    $card_number= $request->card_number;
    $card_ay= $request->Ay;
    $card_yil= $request->Yil;
    $card_cvc= $request->CVC;

    $paymentrequest->setLocale(\Iyzipay\Model\Locale::TR);
    $paymentrequest->setConversationId("123456789");
    $paymentrequest->setPrice($price);
    $paymentrequest->setPaidPrice($price);
    $paymentrequest->setCurrency(\Iyzipay\Model\Currency::TL);
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
    $basketItem->setPrice($price);
    $paymentrequest->setBasketItems([$basketItem]);

}
else{
    $price = $request->input_price;
    $card_first_last_name= $request->card_first_last;
    $card_number= $request->card_number;
    $card_ay= $request->Ay;
    $card_yil= $request->Yil;
    $card_cvc= $request->CVC;

    $paymentrequest->setLocale(\Iyzipay\Model\Locale::TR);
    $paymentrequest->setConversationId("123456789");
    $paymentrequest->setPrice($price);
    $paymentrequest->setPaidPrice($price);
    $paymentrequest->setCurrency(\Iyzipay\Model\Currency::TL);
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
    $buyer->setIp("85.34.78.112");
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
    $basketItem->setPrice($price);
    $paymentrequest->setBasketItems([$basketItem]);

}


$payment = \Iyzipay\Model\Payment::create($paymentrequest, self::getOptions());
dd($payment);
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
