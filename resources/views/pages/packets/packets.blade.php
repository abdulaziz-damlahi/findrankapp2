@extends('layouts.master')
@section('content')
    <section class="pricing-table light-gray-bg padding-top-100 padding-bottom-100">
        <div class="container">
            <!-- Tittle -->
            <div id="packets_show" class="heading-block text-center margin-bottom-80">
                <h2>Affordable SEO Services Packages </h2>
                <div class="row">
@isset($country)
                    <input hidden value="{{$country}}" val="{{$country}}" id="countryinformation">
@endisset
                @isset($iyzico_transaction_id)
                        <input hidden val="{{$iyzico_transaction_id}}" id="iyzico_transaction_id">
                    @endisset
                    @isset($payid)
                        <p hidden id="pay_id" val="{{$payid}}" >{{$payid}}</p>
                @endisset
                <!-- Price -->
                    <div id="satis" class="col-md-4">
                        <!-- Icon -->
                        <div class="plan-icon"><img src="{{asset('images')}}/plan-icon-1.png" alt=" "></div>
                        <div hidden val=""></div>
                        <!-- Plan  -->
                        <div class="pricing-head">
                            <h4>{{$pack->names_packets}}</h4>
                            <span class="curency">{{$base_moeny}}</span> <span
                                    class="amount">{{$round_new}}<span>.99</span></span> <span class="month">/ month</span>
                        </div>

                        <!-- Plean Detail -->
                        <div class="price-in">
                            <ul class="text-center">
                                <li> {{$pack->word_count}} Keywords</li>
                                <li> {{$pack->websites_count}} Websites</li>
                                <li> {{$pack->rank_fosllow}} Rank Follow</li>
                                <li> {{$pack->description}}</li>
                            </ul>
                            <a href="#." class="PURCHACE btn btn-orange">PURCHACE</a></div>
                    </div>

                    <!-- Price -->
                    <div class="col-md-4">
                        <!-- Icon -->
                        <div class="plan-icon orange-bg"><img src="{{asset('images')}}/plan-icon-2.png" alt=" "></div>

                        <!-- Plan  -->
                        <div class="pricing-head orange-bg">
                            <h4>{{$middle->names_packets}}</h4>
                            <span class="curency">{{$base_moeny}}</span> <span
                                    class="amount">{{$round_new1}}<span>.99</span></span> <span class="month">/ month</span>
                        </div>

                        <!-- Plean Detail -->
                        <div class="price-in">
                            <ul class="text-center">
                                <li> {{$middle->word_count}} Keywords</li>
                                <li> {{$middle->websites_count}} Websites</li>
                                <li> {{$middle->rank_fosllow}} Rank Follow</li>
                                <li> {{$middle->description}}</li>
                            </ul>
                            <a href="#." class="PURCHACE btn btn-orange">PURCHACE</a></div>
                    </div>

                    <!-- Price -->
                    <div class="col-md-4">
                        <!-- Icon -->
                        <div class="plan-icon"><img src="{{asset('images')}}/plan-icon-3.png" alt=" "></div>

                        <!-- Plan  -->
                        <div class="pricing-head">
                            <h4>{{$last->names_packets}}</h4>
                            <span class="curency">{{$base_moeny}}</span> <span
                                    class="amount">{{$round_new2}}<span>.99</span></span> <span class="month">/ month</span>
                        </div>

                        <!-- Plean Detail -->
                        <div class="price-in">
                            <ul class="text-center">
                                <li> {{$last->word_count}} Keywords</li>
                                <li> {{$last->websites_count}} Websites</li>
                                <li> {{$last->rank_fosllow}} Rank Follow</li>
                                <li> {{$last->description}}</li>
                            </ul>
                            <a href="#." class="PURCHACE btn btn-orange">PURCHACE</a></div>
                    </div>
                </div>
            </div>
            <div id="settingsForm">

                <div class="menuy col-md-12">
                    <ul id="sa" class="nav nav-tabs nav-justified nav-dark push-20" data-toggle="tabs">
                        <li class="setting_button active" id="button_first">
                            <a id="setting_button1" href="#tab-profile-personal"><i
                                        class="si si-user push-5-r"></i><span class="hidden-xs">Fatura Bilgilerim</span></a>
                        </li>

                        <li class="setting_button" id="button_second">
                            <a id="setting_button2" href="#tab-profile-password"><i
                                        class="setting_but si si-lock push-5-r"></i><span
                                        class="hidden-xs">Paket Özeti</span></a>
                        </li>
                        <li class="setting_button" id="button_third">
                            <a id="setting_button3" href="#customize"><i
                                        class="setting_but si si-wrench push-5-r"></i><span class="hidden-xs">Ödeme Bilgileri</span></a>
                        </li>
                        <li class="setting_button" id="button_third">
                            <a id="setting_button3" href="#customize"><i
                                        class="setting_but si si-wrench push-5-r"></i><span
                                        class="hidden-xs">Sonuç</span></a>
                        </li>
                    </ul>
                </div>
                <form class="invoice_records" method="post" method="post" action="{{route('packets_post')}}">
                    @csrf
                    <div id="iyzipay-checkout-form" class="responsive">
                        <br>
                        <div id="form1">
                            <div class="invoiceeetype" id="invoice_type">
                                <input id="kurumsal" type="radio" name="invoicetype" value="institutional"> Kurumsal
                                <input checked type="radio" id="bireysel" name="invoicetype" value="individual"> Bireysel
                            </div>
                            <div id="Kurumsalform">
                                <label class="kurumsal col-md-6">
                                    <p class="label-txt">FIRMA ADI</p>
                                    <input id="companyName" type="text" class="input">
                                    <div class="line-box">
                                        <div class="line"></div>
                                    </div>
                                </label> <label class="kurumsal col-md-6">
                                    <p class="label-txt">VERGI NO</p>
                                    <input id="invoice_noo" type="text" class="input">
                                    <div class="line-box">
                                        <div class="line"></div>
                                    </div>
                                </label>
                                <label class="kurumsal col-md-6">
                                    <p class="label-txt">VERGI ADRESİ</p>
                                    <input name="invoice_address_institutional" id="invoicd_address" type="text" class="input">
                                    <div class="line-box">
                                        <div class="line"></div>
                                    </div>
                                </label>
                                <label class="col-md-6">
                                    <p class="label-txt">FIRST NAME</p>
                                    <input name="First_name_institutional" id="first_name" type="text" class="input">
                                    <div class="line-box">
                                        <div class="line"></div>
                                    </div>
                                </label> <label class="col-md-6">
                                    <p class="label-txt">LAST NAME</p>
                                    <input name="last_name_institutional" id="last_name" type="text" class="input">
                                    <div class="line-box">
                                        <div class="line"></div>
                                    </div>
                                </label>

                                <label class="col-md-6">
                                    <p class="label-txt">Kimlik Numarası</p>
                                    <input name="id_number" id="number_personal" type="text" class="input">
                                    <div class="line-box">
                                        <div class="line"></div>
                                    </div>
                                </label>
                                <label class="col-md-6">
                                    <p class="label-txt">Telefon Numarası</p>
                                    <input name="gsm_number_institutional" id="gsm_number_insu" type="text" class="input">
                                    <div class="line-box">
                                        <div class="line"></div>
                                    </div>
                                </label> <label class="col-md-6">
                                    <p class="label-txt">Email</p>
                                    <input name="email_institutional" id="email_ins" type="text" class="input">
                                    <div class="line-box">
                                        <div class="line"></div>
                                    </div>
                                </label>

                                <label class="col-md-6">
                                    <p class="label-txt">COUNTRY</p>
                                    <input name="country_information_institutional" id="country" type="text" class="input">
                                    <div class="line-box">
                                        <div class="line"></div>
                                    </div>
                                </label> <label id="themostunder" class="col-md-6">
                                    <p class="label-txt">CITY</p>
                                    <input name="city_information_institutional" id="city" type="text" class="input">
                                    <div class="line-box">
                                        <div class="line"></div>
                                    </div>
                                </label><label id="themostunder" class="col-md-6">
                                    <p class="label-txt">DISTRICT</p>
                                    <input name="district_insitutinoal" id="DISTRICT_NAME" type="text" class="input">
                                    <div class="line-box">
                                        <div class="line"></div>
                                    </div>
                                </label>
                                <div style="margin-left:20%;" id="tax_mükkelefisaas" class="col-md-7">
                                    <label id="tax_mukellefi">E vergi Mükellefiyim</label>
                                    <input style="margin:0px" type="checkbox" id="e_invoice" name="e_invoice">
                                </div>

                            </div>
                            <div id="Bireyselfrom">
                                <label class="col-md-6">
                                    <p class="label-txt">FIRST NAMEss</p>
                                    <input name="firstName_personal" id="firstt_namee" type="text" class="input">
                                    <div class="line-box">
                                        <div class="line"></div>
                                    </div>
                                </label>
                                <label class="col-md-6">
                                    <p class="label-txt">LAST NAME</p>
                                    <input name="last_namee_personal" id="last_namee" type="text" class="input">
                                    <div class="line-box">
                                        <div class="line"></div>
                                    </div>
                                </label>
                                <label class="col-md-6">
                                    <p class="label-txt">IDENTIFICATION NUMBER</p>
                                    <input name="identification_number" id="numberr" type="text" class="input">
                                    <div class="line-box">
                                        <div class="line"></div>
                                    </div>
                                </label>
                                <label class="col-md-6">
                                    <p class="label-txt">Fatura Adresi</p>
                                    <input name="invoice_address_personal" id="invoice_adresses" type="text" class="input">
                                    <div class="line-box">
                                        <div class="line"></div>
                                    </div>
                                </label>
                                <label class="col-md-6">
                                    <p class="label-txt">Telefon Numarası</p>
                                    <input name="gsm_number_personal" id="gsm_number" type="text" class="input">
                                    <div class="line-box">
                                        <div class="line"></div>
                                    </div>
                                </label>
                                <label class="col-md-6">
                                    <p class="label-txt">Email</p>
                                    <input name="email_personal" id="email" type="text" class="input">
                                    <div class="line-box">
                                        <div class="line"></div>
                                    </div>
                                </label>
                                <label class="col-md-6">
                                    <p class="label-txt">COUNTRY</p>
                                    <input name="countries_personal" id="countries_personal" type="text" class="input">
                                    <div class="line-box">
                                        <div class="line"></div>
                                    </div>
                                </label>
                                <label class="col-md-6">
                                    <p class="label-txt">CITY</p>
                                    <input name="cities_personal" id="cities_personal" type="text" class="input">
                                    <div class="line-box">
                                        <div class="line"></div>
                                    </div>
                                </label>    <label class="col-md-6">
                                    <p class="label-txt">DISTRICT</p>
                                    <input id="district_bireysel" type="text" class="input">
                                    <div class="line-box">
                                        <div class="line"></div>
                                    </div>
                                </label>
                                <div style="margin-left:20%;" id="tax_mükkelefisaas" class="col-md-7">
                                    <label id="tax_mukellefi">E vergi Mükellefiyim</label>
                                    <input style="margin:0px" type="checkbox" id="e_invoicee" name="e_invoice">
                                </div>
                            </div>
                        </div>
                        <div id="form2">
                            <div class="block-content tab-content">
                                <!-- Step 1 -->
                                <div class="tab-pane fade fade-up push-30-t push-50" id="simple-classic-progress-step1">
                                    <!-- Card Container -->
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">

                                            <div class="h4"
                                                 style="border-bottom:1px solid #ccc;padding-bottom:10px;margin-bottom:20px;">
                                                Fatura Türü 2
                                            </div>

                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <div>
                                                        <label>
                                                            <input name="data[invoice][type]" type="radio" value="1"
                                                                   style="width:auto">
                                                            Bireysel
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input name="data[invoice][type]" type="radio" value="2"
                                                                   checked="">
                                                            Kurumsal
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="h4"
                                                 style="border-bottom:1px solid #ccc;padding-bottom:10px;margin-bottom:20px;">
                                                Fatura Bilgileri
                                            </div>


                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <div class="form-material">
                                                        <input class="form-control" id="invoice-name"
                                                               name="firstname" type="text" value="Denizkan "
                                                        >
                                                        <label for="invoice-name">Adınız</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <div class="form-material">
                                                        <input class="form-control" id="invoice-lastname"
                                                               name="lastname" type="text" value="Erdoğan"
                                                        >
                                                        <label for="invoice-lastname">Soyadınız</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <div class="form-material">
                                                        <input class="form-control" id="invoice-idno"
                                                               name="data[invoice][idno]" type="text" value="33913884290"
                                                        >
                                                        <label for="invoice-idno">T.C Kimlik No</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <div class="form-material">
                                                        <input class="form-control" id="invoice-address"
                                                               name="data[invoice][address]" type="text"
                                                               value="Çiftlikköy mahallesi Mersin Üniversitesi kampüsü teknopark z06 yenişehir mersin"
                                                        >
                                                        <label for="invoice-address">Fatura Adresi</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <div class="form-material">
                                                        <input class="form-control" id="invoice-country"
                                                               name="countryy" type="text"
                                                        >
                                                        <label for="invoice-country">Ülke</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <div class="form-material">
                                                        <input class="form-control" id="invoice-city"
                                                               name=cityy type="text"
                                                        >
                                                        <label for="invoice-city">Şehir</label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <div>
                                                        <label>
                                                            <input name="data[sameaddress]" type="checkbox" value="1"
                                                                   checked="" style="width:auto">
                                                            Teslimat adresim fatura adresimle aynı
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                            <div id="shipping-holder" class="hide">
                                                <div class="h4"
                                                     style="border-bottom:1px solid #ccc;padding-bottom:10px;margin-bottom:20px;">
                                                    Teslimat Adresi
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-xs-12">
                                                        <div class="form-material">
                                                            <input class="form-control" id="shipping-name"
                                                                   name="data[shipping][name]" type="text"
                                                            >
                                                            <label for="shipping-name">Adınız</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-xs-12">
                                                        <div class="form-material">
                                                            <input class="form-control" id="shipping-lastname"
                                                                   name="data[shipping][lastname]" type="text"
                                                            >
                                                            <label for="shipping-lastname">Soyadınız</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-xs-12">
                                                        <div class="form-material">
                                                            <input class="form-control" id="shipping-idno"
                                                                   name="data[shipping][idno]" type="text"
                                                                   value="33913884290">
                                                            <label for="shipping-idno">T.C Kimlik No</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-xs-12">
                                                        <div class="form-material">
                                                            <input class="form-control" id="shipping-address"
                                                                   name="data[shipping][address]" type="text"
                                                            >
                                                            <label for="shipping-address">Fatura Adresi</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-xs-12">
                                                        <div class="form-material">
                                                            <input class="form-control" id="shipping-country"
                                                                   name="data[shipping][country]" type="text"
                                                                   value="Türkiye">
                                                            <label for="shipping-country">Ülke</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="col-xs-12">
                                                        <div class="form-material">
                                                            <input class="form-control" id="shipping-city"
                                                                   name="data[shipping][city]" type="text" value="mersin">
                                                            <label for="shipping-city">Şehir</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="col-xs-12">
                                                    <div>
                                                        <label>
                                                            <input name="data[invoice][sent_invoice]" type="radio" value="0"
                                                                   checked="" style="width:auto">
                                                            Faturayı kendim gelip alacağım.
                                                        </label>
                                                    </div>
                                                    <div>
                                                        <label>
                                                            <input name="data[invoice][sent_invoice]" type="radio"
                                                                   value="1">
                                                            Fatura adresime kargolansın. (+10 TL kargo bedeli)
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- /Card Container -->
                                </div>
                                <!-- END Step 1 -->

                                <!-- Step 2 -->
                                <div class="tab-pane fade fade-up push-30-t push-50 in active"
                                     id="simple-classic-progress-step2">
                                    <table class="table table-striped table-vcenter">
                                        <tbody>
                                        <tr>
                                            <td>
                                                <a id="başlangic" href="#">Başlangıç</a>
                                                <div class="font-s12 text-muted">1 aylık abonelik hizmeti.</div>
                                            </td>
                                            <td class="text-right">
                                                <div class="font-w600 text-success"><h6 class="price_packet"></h6></div>
                                            </td>
                                        </tr>
                                        <tr id="shippingTr" class="hide">
                                            <td>
                                                <a class="h5" href="#">Kargo Bedeli</a>
                                                <div class="font-s12 text-muted">Kargo gönderim bedeli.</div>
                                            </td>
                                            <td class="text-right">
                                                <div class="font-w600 text-success"><span>10</span> TL</div>
                                            </td>
                                        </tr>
                                        <tr id="couponCodeTr" class="hide">
                                            <td>
                                                <a class="h5" href="#">İndirim</a>
                                                <div class="font-s12 text-muted">Kupon kodu indirimi.</div>
                                            </td>
                                            <td class="text-right">
                                                <div class="font-w600 text-success">-<span></span> TL</div>
                                            </td>
                                        </tr>
                                        <tr class="success">
                                            <td colspan="2" class="text-right">
                                                <div class="h4 font-w600"><b class="push-20-r"><h6 id="total_price">Toplam:</h6></b>
                                                </div>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>

                                </div>
                                <!-- END Step 2 -->

                                <!-- Step 3 -->
                                <div class="tab-pane fade fade-up push-30-t push-50" id="simple-classic-progress-step3">
                                    <!-- Card Container -->
                                    <div class="row">
                                        <div class="col-sm-6 col-sm-offset-3">
                                            <div id="paymentFrame">Ödeme formunuz oluşturuluyor...</div>
                                        </div>
                                    </div>
                                    <!-- / Container -->
                                </div>
                                <!-- END Step 3 -->

                                <!-- Step 4 -->
                                <div class="tab-pane fade fade-up push-30-t push-50"
                                     id="simple-classic-progress-step4"></div>
                                <!-- END Step 4 -->
                            </div>
                        </div>
                        <div id="form3">
                            <label class="col-md-12">
                                <p class="label-txt">Kart Üzerindeki Ad, Soyad:</p>
                                <input name="card_first_last" type="text" class="input">
                                <div class="line-box">
                                    <div class="line"></div>
                                </div>
                            </label>
                            <label class="col-md-12">
                                <p class="label-txt">Kart Numarası:</p>
                                <input name="card_number" type="number" class="input">
                                <div class="line-box">
                                    <div class="line"></div>
                                </div>
                            </label>
                            <div class="col-md-12">
                                <p class="label-txt">Kart Son Kullanma Tarihi:</p>
                                <label class="col-md-4">
                                    <input name="Ay" type="number" placeholder="Ay" class="input">
                                    <div class="line-box">
                                        <div class="line"></div>
                                    </div>
                                </label>
                                <label class="col-md-4">
                                    <input name="Yil" type="number" placeholder="Yil" class="input">
                                    <div class="line-box">
                                        <div class="line"></div>
                                    </div>
                                </label>
                                <label class="col-md-4">
                                    <input name="CVC" type="number" placeholder="CVV" class="input">
                                    <div class="line-box">
                                        <div class="line"></div>
                                    </div>
                                </label>
                            </div>
                            <div class="col-md-12">
                                <img class="img-responsive tr_en_img_x"
                                     src="https://www.paytr.com/img/odeme_sayfasi/os_kartlar_x3.png" alt="Kart Güvenliği"
                                     style="padding: 0px 0 10px 0;">
                            </div>
                            <p hidden id="hidden_id" val="{{\Illuminate\Support\Facades\Auth::id()}}">{{\Illuminate\Support\Facades\Auth::id()}}</p>
                            <input hidden class="hidden_size">
                            <input hidden class="id_hidden">
                            <input hidden class="hidden_descrpitions">
                            <input hidden class="my_count_of_words">
                            <input hidden class="max_my_count_of_words">
                            <input hidden class="rank_follow">
                            <input hidden name="input_price" class="input_price">
                            <input hidden name="input_id" class="input_id">
                            <input hidden class="rank_follow_max">
                            <input hidden class="rank_follow_max_max">
                            <input hidden class="date_packet">
                            <input hidden class="my_count_of_websites">
                            <input hidden class="max_my_count_of_websites">
                            <input hidden class="count_of_websites">
                            <input hidden class="count_of_words">
                            <input hidden class="packet_names">

                            <input hidden class="invoice_first_name">
                            <input hidden class="invoice_last_name">
                            <input hidden class="invoice_tax_no">
                            <input hidden class="invoice_tax_address">
                            <input hidden class="invoice_id_number">
                            <input hidden class="invoice_country">
                            <input hidden class="invoice_city">
                            <input hidden class="invoice_invoice_type">
                            <input hidden class="invoice_company_name">
                            <input hidden class="invoice_user_id ">
                            <input hidden class="invoice_id">
                            <input hidden class="invoice_size">

                        </div>
                        <div id="form4">
                            <div class="success-page">
                                @isset($deneme)
                                    @if ($deneme['status'] === "success")

                                        <h2 id="unSuccessMessage">{{$success_message}}</h2>
                                        <a href="{{route('panel')}}" id="startTouse">Kullanmaya Başla!</a>
                                    @else
                                        <h2 id="unsuccesmessage">{{$success_message}}</h2>
                                        <a href="{{route('packets')}}"id="try_again">Tekrar Dene</a>
                                    @endif
                                @endisset

                            </div>
                        </div>
                        <input hidden class="hidden">
                        <p hidden id="hidden_word_count"></p>
                        <p hidden id="hidden_websites_count"></p>
                        <p hidden id="hidden_rank_follow"></p>
                        <p name="hidden_price" hidden id="hidden_price"></p>
                        <p hidden id="hidden_created"></p>
                        <p hidden id="hidden_description"></p>
                        <p hidden id="hidden_name_packets"></p>
                    </div>
                    <button id="button_pay" type="submit">Ödeme Yap</button>

                </form>

                <button id="button_contact" type="submit">Önce</button>
                <button id="button_contact2" type="submit">Sonra</button>
            </div>
        </div>
    </section>
@endsection
