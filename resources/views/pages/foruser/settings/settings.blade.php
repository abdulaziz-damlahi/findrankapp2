@extends('layouts.master')
@section('content')
    <div id="contact_container" class="">
        <div id="settingsForm">
            <div class="menuy col-md-12">
                <ul class="nav nav-tabs nav-justified nav-dark push-20" data-toggle="tabs">
                    <li class="setting_button active" id="button_first">
                        <a class="setting_but"  href="#tab-profile-personal"><i class="si si-user push-5-r"></i><span class="hidden-xs">Kişisel Ayarlar</span></a>
                    </li>
                    <li class="setting_button" id="button_second">
                        <a class="setting_but"  href="#tab-profile-password"><i class="setting_but si si-lock push-5-r"></i><span class="hidden-xs">Şifre İşlemleri</span></a>
                    </li>
                    <li class="setting_button" id="button_third">
                        <a class="setting_but"  href="#customize"><i class="setting_but si si-wrench push-5-r"></i><span class="hidden-xs">Özelleştirme</span></a>
                    </li>
                </ul>
            </div>
            <form class="password_process">
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
            <label class="col-md-12">
                <p class="label-txt">EMAIL </p>
                <input type="text" class="input">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label class="col-md-12">
                <p class="label-txt">PHONE NUMBER</p>
                <input type="text" class="input">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <button id="button_contact" type="submit">submit</button>
            </form>
            <form class="personal_settings">
            <label class="col-md-12">
                <p class="label-txt">ŞİMDİKİ ŞİFRE </p>
                <input type="text" class="input">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label class="col-md-12">
                <p class="label-txt">YENİ ŞİFRE</p>
                <input type="text" class="input">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label> <label class="col-md-12">
                <p class="label-txt">YENİ ŞİFRE TEKRARI</p>
                <input type="text" class="input">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <button id="button_contact" type="submit">submit</button>
            </form> <form class="custumize">
            <label class="col-md-6">
                <p class="label-txt">FIRSTNAME </p>
                <input type="text" class="input">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label class="col-md-6">
                <p class="label-txt">LASTNAME</p>
                <input type="text" class="input">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label> <label class="col-md-12">
                <p class="LABEL_text">LASTNAME</p>
                <input type="file" class="input_file">
            </label>
            <button id="button_contact" type="submit">submit</button>
            </form>
        </div>
    </div>
@endsection