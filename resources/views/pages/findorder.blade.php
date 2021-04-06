@extends('layouts.master')
@section('content')
    <a class="SideBarName" hidden id="username">{{ auth()->user()->first_name }}</a>
<div >
    <section id="general_find" class="row bg-parallax seo-secore padding-top-100 padding-bottom-100 padding-left-50 padding-right-50"
             >

        <br class="container" style="padding-right: 500px; padding-left:500px; ">
        <!-- Tittle -->
        <div class="heading-block white-text text-center margin-bottom-50">
            <h2 style="color: black">{{__('pages.What’s Your Google Rank ?')}}</h2>
            <span style="color: black">{{__('pages.See how well your page is optimised for your keyword')}}</span></div>
        <!-- Form -->
        <form method="post" action="{{route('findpost')}}">
            @csrf
            @if($errors->any())
                <div class="alertMessage alert-danger">
                   <h5>{{$errors->first()}}
                </div>
            @endif
            <ul class="row col-lg-12">
                <li class="col-md-6">
                    <input type="text" name="website" class="form-control" placeholder="http://">
                </li>
                <li class="col-md-6">
                    <input type="text" name="keyword" class="form-control" placeholder="Keyword">
                </li>
            </ul>

            <div class="row col-lg-12">
                <div class="btn-group col-md-3 ">
                    <div class="btn-group">
                        <select id="selectSecil" class="GoogleRank select">
                            <option class="select" value="none" selected disabled hidden>
                                {{__('pages.country')}}
                            </option>
                            <option class="select" value="TR">
                                Türkiye
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
                        <select id="language" class="select">
                            <option class="select" value="none" selected disabled hidden>
                                {{__('pages.language')}}
                            </option>
                            <option class="select">
                                {{__('pages.turkish')}}
                            </option>
                            <option class="select">
                                {{__('pages.english')}}
                            </option>
                            <option class="select">
                                {{__('pages.arabic')}}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="btn-group col-md-3 ">
                    <div class="btn-group">
                        <select id="cityy" class="select" >
                            <option value="none" selected disabled hidden>
                                {{__('pages.city')}}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="btn-group col-md-3 ">
                    <div class="btn-group">
                        <select id="device" class="select">
                            <option value="none" selected disabled hidden>
                                {{__('pages.device')}}
                            </option>
                            <option >
                                 {{__('pages.mobile')}}
                            </option>
                            <option >
                                {{__('pages.desktop')}}
                            </option>
                        </select>
                    </div>
                </div>
            </div>

            <input hidden name="hidden_collonial_name" id="hidden_collonial" />
            <input hidden name="hidden_device_name" id="hidden_device" />
            <input hidden name="language_name" id="language_hidden" />

            <div id="check_now2" >
                <button id="check_now"type="submit" class="btn btn-orange">   {{__('pages.Check Now !')}}</button>
            </div>
        </form>
        @isset($resultss)
            @foreach ($resultss as $key=>$result)
                @if(strpos($result[1],$website_request) !== false)
                <div id="alert_color" class="alert alert-light" role="alert">
                    Sorguladığınız site  {{$key}} sırada yer alıyor.
                </div>
                @endif
            @endforeach
                @if(strpos($result[1],$website_request) === false)
                    <div id="alert_color" class="alert alert-light" role="alert">
                        gelmedi
                    </div>
                @endif
            <div class="container">
                <div class="row">
            <table class="table table-sm">
                <thead>
                <tr>
                    <th>Sırası</th>
                    <th>Siteler</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($resultss as $key=>$result)
                    <tr>
                        <td>{{ $key }}</td>
                        <td>{{ $result[1] }}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
</div>
</div>
        @endisset


    </section>

</div>

@endsection
