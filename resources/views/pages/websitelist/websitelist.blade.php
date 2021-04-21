@extends('layouts.master')
@section('content')

    <div class="container websitescont">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 hidden id="websiteid">{{$websiteid}}</h5>
                    <br><br>
                    <div class="btn-group">
                        <a class="containerbtns btns btn-default " href="{{route('panel')}}" type="button">
                            <i class="fa fa-arrow-left"></i>{{__('pages.panel')}}</a>
                        <button class="containerbtns btns btn-default" type="button" id="addNewword">
                            <i class="fa fa-plus"></i><span class="hidden-xs push-7-l">{{__('pages.Add Word')}}</span>
                        </button>
                        <button class="containerbtns btns btn-default" type="button" style="display:none" id="editmyModalbtn">
                            <i class="fa fa-edit"></i><span class="hidden-xs push-7-l">{{__('pages.edit')}}</span>
                        </button>
                        <div id="daysleft" hidden></div>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('notsuccess'))
                            <div class="alert alert-danger">
                                {{ session('notsuccess') }}
                            </div>`
                        @endif
                        @if (session('cantbeempty'))
                            <div class="alert alert-danger">
                                {{ session('cantbeempty') }}
                            </div>
                        @endif
                        <div id="packetalert" class="alert alert-danger" style="display: none">
                            you dont have any packet
                        </div>
                    </div>
                    <br><br>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col"><span class="fa fa-pencil"></span></th>
                            <th scope="col">{{__('pages.Keyword')}}</th>
                            <th scope="col">{{__('pages.order')}}</th>
                            <th scope="col" id="country" class="one">{{__('pages.country')}}</th>
                            <th scope="col" id="city" class="one">{{__('pages.city')}}</th>
                            <th scope="col" id="device" class="one">{{__('pages.device')}}</th>
                            <th scope="col" id="language" class="one">{{__('pages.language')}}</th>
                            <th scope="col">{{__('pages.graph')}}</th>
                            <th scope="col">{{__('pages.delete')}}</th>
                            <th scope="col"></th>
                        </tr>
                        </thead>
                        <tbody id="row">
                        <div id="myModal" class="modal">
                            <!-- Modal content -->
                            <div class="modal-content">
                                <span id="close" class="close">X</span>
                                <br><br>
                                <form action="{{route('addword')}}" class="btn-submit" method="POST">
                                    @csrf
                                    <textarea class="form-control" id="urls" name="keyword" rows="5"
                                              placeholder=""></textarea>
                                    <textarea style="display:none" class="form-control" id="urls2" name="websiteid"
                                              rows="5"
                                              placeholder="">{{$websiteid}}</textarea>
                                    <br><br>
                                    @if($errors->any())
                                        <div class="alert-danger" style="font-size: 15px;">
                                            {{$errors->first()}}
                                        </div>
                                    @endif
                                    <div class="row col-lg-10 col-md-10 col-xs-12" style="margin-bottom: 10px">
                                        <div class="btn-group col-md-3">
                                            <div class="btn-group">
                                                <select id="selectSecil" name="country" class="select">
                                                    <option value="none" selected disabled hidden>
                                                        {{__('pages.country')}}
                                                    </option>
                                                    <option value="TR">
                                                        Türkiye
                                                    </option>
                                                    <option value="AE">
                                                        Birleşik Arap Emirlikleri
                                                    </option>
                                                    <option value="AR">
                                                        Arjanstin
                                                    </option>
                                                    <option value="AU">
                                                        Avusturalya
                                                    </option>
                                                    </option>
                                                    <option value="AT">
                                                        Avusturya
                                                    </option>
                                                    </option>
                                                    <option value="BE">
                                                        Belçika
                                                    </option>
                                                    <option value="CA">
                                                        Kanada
                                                    </option>
                                                    <option value="CL">
                                                        Şili
                                                    </option>
                                                    <option class="select" value="CN">
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
                                                    </option>
                                                    <option class="select" value="BG">
                                                        Bulgaristan
                                                    </option>
                                                    <option class="select" value="BR">
                                                        Brezilya
                                                    </option>
                                                    <option class="select" value="CH">
                                                        İsviçre
                                                    </option>
                                                    <option class="select" value="DE">
                                                        Almanya
                                                    </option>
                                                    <option class="select" value="CO">
                                                        Kolombiya
                                                    </option>
                                                    <option class="select" value="DK">
                                                        Danimarka
                                                    </option>
                                                    <option class="select" value="EC">
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
                                                    </option>
                                                    <option class="select" value="GB">
                                                        İngiltere
                                                    </option>
                                                    <option class="select" value="GR">
                                                        Yunanistan
                                                    </option>
                                                    <option class="select" value="HU">
                                                        Macaristan
                                                    </option>
                                                    <option class="select" value="IN">
                                                        Hindistan
                                                    </option>
                                                    <option class="select" value="IE">
                                                        İrlanda
                                                    </option>
                                                    <option class="select" value="IL">
                                                        İsrail
                                                    </option>
                                                    <option class="select" value="IT">
                                                        İtalya
                                                    </option>
                                                    <option class="select" value="JP">
                                                        Japonya
                                                    </option>
                                                    <option class="select" value="KR">
                                                        Kore
                                                    </option>
                                                    <option class="select" value="LK">
                                                        Sri lanka
                                                    </option>
                                                    <option class="select" value="Lu">
                                                        Lüksemburg
                                                    </option>
                                                    <option class="select" value="MA">
                                                        Fas
                                                    </option>
                                                    <option class="select" value="JP">
                                                        Japonya
                                                    </option>
                                                    <option class="select" value="MX">
                                                        Meksika
                                                    </option>
                                                    <option class="select" value="NG">
                                                        Nijerya
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="btn-group col-md-3">
                                            <div class="btn-group">
                                                <select id="language" name="language" class="select">
                                                    <option value="none" selected disabled hidden>
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
                                        <div class="btn-group col-md-3">
                                            <div class="btn-group">
                                                <select id="device" name="device" class="select">
                                                    <option value="none" selected disabled hidden>
                                                        {{__('pages.device')}}
                                                    </option>
                                                    <option>
                                                        {{__('pages.mobile')}}
                                                    </option>
                                                    <option>
                                                        {{__('pages.desktop')}}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="btn-group col-md-3">
                                            <div class="btn-group">
                                                <select id="cityy" name="city" class="select">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br><br>
                                    <button type="submit" class="btn btn-primary mcuLoadingButton"
                                            data-handler="confirm"> {{__('pages.save')}}
                                    </button>
                                </form>
                                <button id="close2" class="btn btn-default"
                                        data-dismiss="modal"> {{__('pages.close')}}
                                </button>
                            </div>
                        </div>
                        <div id="editmyModal" class="editmyModal">
                            <!-- Modal content -->
                            <div class="modal-content">
                                <span id="editclose" class="close">X</span>
                                <br><br>
                                <form id="editForm" onsubmit='return onSubmit(this)'>
                                    @csrf
                                    <textarea class="form-control" id="editurls" name="editkeyword" rows="5"
                                              placeholder=""></textarea>
                                    <textarea style="display:none" class="form-control" id="editwebsiteid" name="editwebsiteid"
                                              placeholder="">{{$websiteid}}</textarea>
                                    <br><br>
                                    <div class="row col-lg-10 col-md-10 col-xs-12" style="margin-bottom: 10px">
                                        <div class="btn-group col-md-3 col-sm-6 col-xs-12">
                                            <div class="btn-group">
                                                <select id="editcountry" name="editcountry" class="select">
                                                    <option value="none" disabled hidden>
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
                                                    </option>
                                                    <option class="select" value="AU">
                                                        Avusturalya
                                                    </option>
                                                    </option>
                                                    <option class="select" value="AT">
                                                        Avusturya
                                                    </option>
                                                    </option>
                                                    <option class="select" value="BE">
                                                        Belçika
                                                    </option>
                                                    <option class="select" value="CA">
                                                        Kanada
                                                    </option>
                                                    <option class="select" value="CL">
                                                        Şili
                                                    </option>
                                                    <option class="select" value="CN">
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
                                                    </option>
                                                    <option class="select" value="BG">
                                                        Bulgaristan
                                                    </option>
                                                    <option class="select" value="BR">
                                                        Brezilya
                                                    </option>
                                                    <option class="select" value="CH">
                                                        İsviçre
                                                    </option>
                                                    <option class="select" value="DE">
                                                        Almanya
                                                    </option>
                                                    <option class="select" value="CO">
                                                        Kolombiya
                                                    </option>
                                                    <option class="select" value="DK">
                                                        Danimarka
                                                    </option>
                                                    <option class="select" value="EC">
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
                                                    </option>
                                                    <option class="select" value="GB">
                                                        İngiltere
                                                    </option>
                                                    <option class="select" value="GR">
                                                        Yunanistan
                                                    </option>
                                                    <option class="select" value="HU">
                                                        Macaristan
                                                    </option>
                                                    <option class="select" value="IN">
                                                        Hindistan
                                                    </option>
                                                    <option class="select" value="IE">
                                                        İrlanda
                                                    </option>
                                                    <option class="select" value="IL">
                                                        İsrail
                                                    </option>
                                                    <option class="select" value="IT">
                                                        İtalya
                                                    </option>
                                                    <option class="select" value="JP">
                                                        Japonya
                                                    </option>
                                                    <option class="select" value="KR">
                                                        Kore
                                                    </option>
                                                    <option class="select" value="LK">
                                                        Sri lanka
                                                    </option>
                                                    <option class="select" value="Lu">
                                                        Lüksemburg
                                                    </option>
                                                    <option class="select" value="MA">
                                                        Fas
                                                    </option>
                                                    <option class="select" value="JP">
                                                        Japonya
                                                    </option>
                                                    <option class="select" value="MX">
                                                        Meksika
                                                    </option>
                                                    <option class="select" value="NG">
                                                        Nijerya
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="btn-group col-md-3 col-sm-6 col-xs-12">
                                            <div class="btn-group">
                                                <select id="editlanguage" name="editlanguage" class="select">
                                                    <option value="none" disabled hidden>
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
                                        <div class="btn-group col-md-3 col-sm-6 col-xs-12">
                                            <div class="btn-group">
                                                <select id="editdevice" name="editdevice" class="select">
                                                    <option value="none" disabled hidden>
                                                        {{__('pages.device')}}
                                                    </option>
                                                    <option>
                                                        {{__('pages.mobile')}}
                                                    </option>
                                                    <option>
                                                        {{__('pages.desktop')}}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="btn-group col-md-3 col-sm-6 col-xs-12">
                                            <div class="btn-group">
                                                <select id="editcity" name="editcity" class="select">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br><br><br>
                                    <button id="submitedit" type="submit" class="btn btn-primary mcuLoadingButton"> {{__('pages.save')}}
                                    </button>
                                </form>
                                <button id="editclose2" class="btn btn-default" data-dismiss="editmodal">
                                    {{__('pages.close')}}
                                </button>
                            </div>
                        </div>
                        {{-- grafik modal--}}
                        <div id="grafikmodal" class="grafikmodal">
                            <!-- Modal content -->
                            <div class="grafikmodal-content">
                                <span style="size: 15px;" id="grafikclose" class="grafikclose">X</span>
                                <br><br>
                                <button id="grafikclose2" class="btn btn-default"
                                        data-dismiss="grafikmodal"> {{__('pages.close')}}
                                </button>
                            </div>
                        </div>
                        </tbody>
                    </table>
                    <div class="pagination" id="pagination">
                        {{--java script generated Pagination in tbody (panel.js)--}}
                    </div>
                    <div id="CountOfWords" style="float:right;margin-right:100px">total is</div>
                </div>
                <div class="card-block">
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="col-lg-12 col-md-12 paddingcontainer">
            <div class="col-lg-6 col-md-12 ">
                <div class="card whitebackground">
                    <div class="card-header whitebackground">
                        <h5>{{__('panel.positions')}}</h5>
                    </div>
                    <div class="card-block whitebackground">
                        {{--popup ilk kilme--}}
                        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                    </div>
                    <br><br>
                </div>
            </div>
            {{-- ANAHTAR KELİME DEĞİŞİMLERİ--}}
            <div class="col-lg-6 col-md-12 totalwordlist" style="margin-top: 120px">
                <div class="card whitebackground">
                    <div class="card-header whitebackground">
                        <div class="block block-bordered block-rounded">
                            <div class="block-header">
                                <h4 class="text-center">{{__('panel.KEYWORDS CHANGES')}}</h4>
                            </div>
                            <div class="block-content block-content-full">
                                <div class="push-5-l" style="margin-top:-17px">
                                    <div style="display:inline-block"><b style="font-size:28px" id="totalup"></b>
                                        <medium class="text-muted">{{__('panel.Rise')}}</medium>
                                        <br> <img class="svgstyleWebsites" src="{{asset('assets')}}/svg/up-arrow.svg"><br></div>
                                    <div class="pull-right push-5-r"><b style="font-size:28px" id="totaldown"></b>
                                        <medium class="text-muted">{{__('panel.Drop')}}</medium>
                                        <br><img class="svgstyleWebsites" src="{{asset('assets')}}/svg/down-arrow.svg"><br></div>
                                </div>
                                <br>
                                <div class="progress backorange" id="mainprogress">
                                    <div class="progress-bar backgreen" id="KeywordTotalWordCount" role="progressbar" aria-valuenow="25"
                                         aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                                <span> <span id="totalword" class="font-w600"></span> &nbsp;{{__('panel.word')}} </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
