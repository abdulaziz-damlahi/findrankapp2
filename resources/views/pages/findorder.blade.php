@extends('layouts.master')
@section('content')
    <a class="SideBarName" hidden id="username">{{ auth()->user()->first_name }}</a>
    <div class="container" id="FindOrderContainer">
        <section id="general_find" class="row bg-parallax seo-secore padding-top-100 padding-bottom-100 padding-left-50 padding-right-50">
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
                    <div class="row col-lg-12">
                        <div class="btn-group col-md-3 col-sm-3" style="padding-top: 40px;padding-bottom: 30px">
                            <div class="btn-group">
                                <select id="selectSecil" class="selectpicker countrypicker" data-flag="true">
                                </select>
                                <script rel="stylesheet" src="{{asset('js')}}/selectedcountry.js"></script>
                            </div>
                        </div>
                        <div class="btn-group col-md-3 col-sm-3">
                            <div class="btn-group">
                                <select id="language" class="select">
                                    <option class="select" value="none" selected disabled hidden>
                                        {{__('pages.language')}}
                                    </option>
                                    <option class="select" value="turkish">
                                        {{__('pages.turkish')}}
                                    </option>
                                    <option class="select" value="english">
                                        {{__('pages.english')}}
                                    </option>
                                    <option class="select" value="arabic">
                                        {{__('pages.arabic')}}
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="btn-group col-md-3 col-sm-3">
                            <div class="btn-group">
                                <select id="device" class="select">
                                    <option value="none" selected disabled hidden>
                                        {{__('pages.device')}}
                                    </option>
                                    <option value="mobile">
                                        {{__('pages.mobile')}}
                                    </option>
                                    <option value="desktop">
                                        {{__('pages.desktop')}}
                                    </option>
                                </select>
                            </div>

                        </div>
                        <div class="btn-group col-md-3 col-sm-3">
                            <div class="btn-group">
                                <select id="cityy" class="select">
                                    <option value="none" selected disabled hidden>
                                        {{__('pages.city')}}
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </ul>
                <input hidden name="hidden_collonial_name" id="hidden_collonial"/>
                <input hidden name="hidden_device_name" id="hidden_device"/>
                <input hidden name="language_name" id="language_hidden"/>
                <div id="check_now2">
                    <button id="check_now" type="submit" class="btn btn-orange bi bi-search"><i style="font-size: 20px"
                                                                                                class="fa fa-search">  {{__('pages.Check Now !')}} </i></button>
                </div>
            </form>
            @isset($resultss)
                @foreach ($resultss as $key=>$result)
                    @if(strpos($result[1],$website_request) !== false)
                        <div id="alert_color" class="alert alert-light" role="alert">
                            Sorguladığınız site {{$key}} sırada yer alıyor.
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
