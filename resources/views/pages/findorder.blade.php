@extends('layouts.master')
@section('content')
    <div class="container" id="seo">
        <section class="row bg-parallax seo-secore padding-top-100 padding-bottom-100 "
             style="background-color: #EFEFEF; ">

        <br class="container" style="padding-right: 500px; padding-left:500px; ">
        <!-- Tittle -->
        <div class="heading-block white-text text-center margin-bottom-50">
            <h2 style="color: black">What’s Your SEO Score ?</h2>
            <span style="color: black">See how well your page is optimised for your keyword</span></div>
        <!-- Form -->
        <form>

            <ul class="row col-lg-12">
                <li class="col-md-6">
                    <input type="text" class="form-control" placeholder="http://">
                </li>
                <li class="col-md-6">
                    <input type="text" class="form-control" placeholder="Keyword">
                </li>
            </ul>

                <div class="row col-lg-12">
                    <div class="btn-group col-md-3 ">
                        <div class="btn-group">
                            <select class="select">
                                <option class="select">
                                    Ülke
                                </option>
                                <option class="select">
                                    turkey
                                </option>
                                <option class="select" value="AE">
                                    Birleşik Arap Emirlikleri
                                </option>
                                <option class="select" value="AR">
                                    Arjanstin
                                </option>  <option class="select" value="AU">
                                    Avusturalya
                                </option>
                                </option>  <option class="select" value="AT">
                                    Avusturya
                                </option>   </option>  <option class="select" value="BE">
                                    Belçika</option>
                                <option class="select" value="CA">
                                    Kanada
                                </option>   <option class="select" value="CL">
                                    Şili
                                </option><option class="select" value="CN">
                                    Çin
                                </option>
                                <option class="select" value="CZ">
                                    Çek Cumhuriyeti
                                </option>
                                <option class="select" value="CZ">
                                    Çek Cumhuriyeti
                                </option>
                                <option class="select" value="DE">
                                    Almanya
                                </option> <option class="select" value="BG">
                                    Bulgaristan
                                </option> <option class="select" value="BR">
                                    Brezilya
                                </option> <option class="select" value="CH">
                                    İsviçre
                                </option>
                                <option class="select" value="DE">
                                    Almanya
                                </option>
                                <option class="select" value="CO">
                                    Kolombiya
                                </option>   <option class="select" value="DK">
                                    Danimarka
                                </option>   <option class="select" value="EC">
                                    Ekvator
                                </option>
                                <option class="select" value="CO">
                                    Kolombiya
                                </option>
                                <option class="select" value="EG">
                                    Mısır
                                </option>
                                <option class="select" value="ES">
                                    İspanya
                                </option>
                                <option class="select" value="FI">
                                    Finlandiya
                                </option>
                                <option class="select" value="FR">
                                    Finlandiya
                                </option> <option class="select" value="GB">
                                    İngiltere
                                </option><option class="select" value="GR">
                                    Yunanistan
                                </option>
                                <option class="select" value="HU">
                                    Macaristan
                                </option> <option class="select" value="IN">
                                    Hindistan
                                </option> <option class="select" value="IE">
                                    İrlanda
                                </option><option class="select" value="IL">
                                    İsrail
                                </option><option class="select" value="IT">
                                    İtalya
                                </option>
                                <option class="select" value="JP">
                                    Japonya
                                </option>   <option class="select" value="KR">
                                    Kore
                                </option>   <option class="select" value="LK">
                                    Sri lanka
                                </option>   <option class="select" value="Lu">
                                    Lüksemburg
                                </option>   <option class="select" value="MA">
                                    Fas
                                </option>   <option class="select" value="JP">
                                    Japonya
                                </option>   <option class="select" value="MX">
                                    Meksika
                                </option> <option class="select" value="NG">
                                    Nijerya
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="btn-group col-md-3 ">
                        <div class="btn-group">
                            <select class="select">
                                <option class="select">
                                    dil
                                </option>
                                <option class="select">
                                    turkish
                                </option>
                                <option class="select">
                                    english
                                </option>
                                <option class="select">
                                    arabic
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="btn-group col-md-3 ">
                        <div class="btn-group">
                            <select class="select">
                                <option class="select">
                                    Şehir
                                </option>
                                <option class="select">
                                    mersin
                                </option>
                                <option class="select">
                                    istanbul
                                </option>
                                <option class="select">
                                    karabuk
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="btn-group col-md-3 ">
                        <div class="btn-group">
                            <select class="select">
                                <option class="select">
                                    Cihaz
                                </option>
                                <option class="select">
                                    mobile
                                </option>
                                <option class="select">
                                    masaustu
                                </option>
                            </select>
                        </div>
                    </div>
                </div>


        </form>
        <div class="row col-md-3 " style="margin: auto">
            <li class="">
                <button type="submit" class="btn btn-orange">Check Now !</button>
            </li>
        </div>
    </section>
    </div>

@endsection
