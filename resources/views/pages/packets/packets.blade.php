@extends('layouts.master')
@section('content')
<section class="pricing-table light-gray-bg padding-top-100 padding-bottom-100">
    <div class="container">

        <!-- Tittle -->
        <div id="packets_show" class="heading-block text-center margin-bottom-80">
            <h2>Affordable SEO Services Packages </h2>
        <div class="row">

            <!-- Price -->
            <div class="col-md-4">
                <!-- Icon -->
                <div class="plan-icon"><img src="{{asset('images')}}/plan-icon-1.png" alt=" "></div>

                <!-- Plan  -->
                <div class="pricing-head">
                    <h4>{{$last->names_packets}}</h4>
                    <span class="curency">{{$base_moeny}}</span> <span class="amount">{{$round_new2}}<span>.99</span></span> <span class="month">/ month</span> </div>

                <!-- Plean Detail -->
                <div class="price-in">
                    <ul class="text-center">
                        <li> {{$last->word_count}} Keywords</li>
                        <li> {{$last->websites_count}} Websites</li>
                        <li> {{$last->rank_fosllow}} Rank Follow</li>
                        <li> {{$last->description}}</li>
                    </ul>
                    <a href="#." class="PURCHACE btn btn-orange">PURCHACE</a> </div>
            </div>

            <!-- Price -->
            <div class="col-md-4">
                <!-- Icon -->
                <div class="plan-icon orange-bg"><img src="{{asset('images')}}/plan-icon-2.png" alt=" "></div>

                <!-- Plan  -->
                <div class="pricing-head orange-bg">
                    <h4>{{$middle->names_packets}}</h4>
                    <span class="curency">{{$base_moeny}}</span> <span class="amount">{{$round_new1}}<span>.99</span></span> <span class="month">/ month</span> </div>

                <!-- Plean Detail -->
                <div class="price-in">
                    <ul class="text-center">
                        <li> {{$middle->word_count}} Keywords</li>
                        <li> {{$middle->websites_count}} Websites</li>
                        <li> {{$middle->rank_fosllow}} Rank Follow</li>
                        <li> {{$middle->description}}</li>
                    </ul>
                    <a href="#." class="PURCHACE btn btn-orange">PURCHACE</a> </div>
            </div>

            <!-- Price -->
            <div class="col-md-4">
                <!-- Icon -->
                <div class="plan-icon"><img src="{{asset('images')}}/plan-icon-3.png" alt=" "></div>

                <!-- Plan  -->
                <div class="pricing-head">
                    <h4>{{$pack->names_packets}}</h4>
                    <span class="curency">{{$base_moeny}}</span> <span class="amount">{{$round_new}}<span>.99</span></span> <span class="month">/ month</span> </div>

                <!-- Plean Detail -->
                <div class="price-in">
                    <ul class="text-center">
                        <li> {{$pack->word_count}} Keywords</li>
                        <li> {{$pack->websites_count}} Websites</li>
                        <li> {{$pack->rank_fosllow}} Rank Follow</li>
                        <li> {{$pack->description}}</li>
                    </ul>
                    <a href="#." class="PURCHACE btn btn-orange">PURCHACE</a> </div>
            </div>
        </div>
    </div>
        <div id="settingsForm">
            <div class="menuy col-md-12">
                <ul id="sa" class="nav nav-tabs nav-justified nav-dark push-20" data-toggle="tabs">
                    <li class="setting_button active" id="button_first">
                        <a id="setting_button1"  href="#tab-profile-personal"><i class="si si-user push-5-r"></i><span class="hidden-xs">Fatura Bilgilerim</span></a>
                    </li>

                    <li class="setting_button" id="button_second">
                        <a id="setting_button2"  href="#tab-profile-password"><i class="setting_but si si-lock push-5-r"></i><span class="hidden-xs">Paket Özeti</span></a>
                    </li>
                    <li class="setting_button" id="button_third">
                        <a id="setting_button3"  href="#customize"><i class="setting_but si si-wrench push-5-r"></i><span class="hidden-xs">Ödeme Bilgileri</span></a>
                    </li> <li class="setting_button" id="button_third">
                        <a id="setting_button3"  href="#customize"><i class="setting_but si si-wrench push-5-r"></i><span class="hidden-xs">Sonuç</span></a>
                    </li>
                </ul>
            </div>
            <form class="invoice_records">
                <div  ><input id="kurumsal" type="radio" name="gender" value="Kurumsal"> Kurumsal
                    <input checked type="radio" id="bireysel" name="gender" value="Kurumsal"> Bireysel
                </div>
                <div id="form1">
                    <label class="kurumsal col-md-6">
                        <p class="label-txt">FIRMA ADI</p>
                        <input type="text" class="input">
                        <div class="line-box">
                            <div class="line"></div>
                        </div>
                    </label>   <label class="kurumsal col-md-6">
                        <p class="label-txt">VERGI NO</p>
                        <input type="text" class="input">
                        <div class="line-box">
                            <div class="line"></div>
                        </div>
                    </label>
                    <label class="kurumsal col-md-6">
                        <p class="label-txt">VERGI ADRESİ</p>
                        <input type="text" class="input">
                        <div class="line-box">
                            <div class="line"></div>
                        </div>
                    </label>
                <label class="col-md-6">
                    <p class="label-txt">FIRST NAME</p>
                    <input type="text" class="input">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>   <label class="col-md-6">
                    <p class="label-txt">LAST NAME</p>
                    <input type="text" class="input">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>
                <label class="col-md-6">
                    <p class="label-txt">IDENTIFICATION NUMBER</p>
                    <input type="text" class="input">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>
                <label class="col-md-6">
                    <p class="label-txt">INVOICE RECORDS</p>
                    <input type="text" class="input">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>

                    <label class="col-md-6">
                    <p class="label-txt">COUNTRY</p>
                    <input type="text" class="input">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>    <label id="themostunder" class="col-md-6">
                    <p class="label-txt">CITY</p>
                    <input type="text" class="input">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>
                </div>
                <div id="form2">
                <label class="col-md-6">
                    <p class="label-txt">FIRST NAMEss</p>
                    <input type="text" class="input">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>   <label class="col-md-6">
                    <p class="label-txt">LAST NAME</p>
                    <input type="text" class="input">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>
                <label class="col-md-6">
                    <p class="label-txt">IDENTIFICATION NUMBER</p>
                    <input type="text" class="input">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>
                <label class="col-md-6">
                    <p class="label-txt">INVOICE RECORDS</p>
                    <input type="text" class="input">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>    <label class="col-md-6">
                    <p class="label-txt">COUNTRY</p>
                    <input type="text" class="input">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>    <label class="col-md-6">
                    <p class="label-txt">CITY</p>
                    <input type="text" class="input">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>
                </div>
                <div id="form3">
                <label class="col-md-6">
                    <p class="label-txt">FIRST NAMEsssasdq</p>
                    <input type="text" class="input">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>   <label class="col-md-6">
                    <p class="label-txt">LAST NAME</p>
                    <input type="text" class="input">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>
                <label class="col-md-6">
                    <p class="label-txt">IDENTIFICATION NUMBER</p>
                    <input type="text" class="input">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>
                <label class="col-md-6">
                    <p class="label-txt">INVOICE RECORDS</p>
                    <input type="text" class="input">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>    <label class="col-md-6">
                    <p class="label-txt">COUNTRY</p>
                    <input type="text" class="input">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>    <label class="col-md-6">
                    <p class="label-txt">CITY</p>
                    <input type="text" class="input">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>
                </div> <div id="form4">
                <label class="col-md-6">
                    <p class="label-txt">FIRST NAMEss</p>
                    <input type="text" class="input">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>   <label class="col-md-6">
                    <p class="label-txt">LAST NAME</p>
                    <input type="text" class="input">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>
                <label class="col-md-6">
                    <p class="label-txt">IDENTIFICATION NUMBER</p>
                    <input type="text" class="input">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>
                <label class="col-md-6">
                    <p class="label-txt">INVOICE RECORDS</p>
                    <input type="text" class="input">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>    <label class="col-md-6">
                    <p class="label-txt">COUNTRY</p>
                    <input type="text" class="input">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>    <label class="col-md-6">
                    <p class="label-txt">CITY</p>
                    <input type="text" class="input">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>
                </div>
                <div>
                </div>
            </form>
            <button id="button_contact" type="submit">Önce</button>
            <button id="button_contact2" type="submit">Sonra</button>
</div>
</div>
</section>
@endsection