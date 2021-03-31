@extends('layouts.master')
@section('content')
    <div class="container" style="height:700px">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 style="display: none">{{$websiteid}}</h5>
                    <br>
                    <br>
                    <div class="btn-group">
                        <a class="btns btn-default" href="{{route('panel')}}" type="button" id=""><i
                                class="fa fa-arrow-left text-info">PANEL</i></a>
                        <button class="btns btn-default" type="button" id="addNewword"><i
                                class="fa fa-plus text-success"><span class="hidden-xs push-7-l">ADD WORD</span></i>
                        </button>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('notsuccess'))
                            <div class="alert alert-danger">
                                {{ session('notsuccess') }}
                            </div>
                        @endif
                        @if (session('cantbeempty'))
                            <div class="alert alert-danger">
                                {{ session('cantbeempty') }}
                            </div>
                        @endif
                    </div>
                    <br>
                    <br>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">word</th>
                            <th scope="col">SIRA</th>
                            <th scope="col" id="country">country</th>
                            <th scope="col" id="city" class="hidden-xs">city</th>

                            <th scope="col"id="device">device</th>
                            <th scope="col" id="language"class="hidden-xs" >language</th>
                            <th scope="col">grafik</th>
                            <th scope="col">delete</th>
                            <th scope="col">edit</th>
                        </tr>
                        </thead>
                        <tbody id="row">

                        <div id="myModal" class="modal">
                            <!-- Modal content -->
                            <div class="modal-content">
                                <span style="size: 15px;" id="close" class="close">X</span>
                                <br><br>
                                <form action="{{route('addword')}}" class="btn-submit" method="POST">
                                    @csrf
                                    <textarea class="form-control" id="urls" name="name" rows="5"
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
                                    <div class="row col-lg-6">
                                        <div class="btn-group col-md-3 ">
                                            <div class="btn-group">
                                                <select id="selectSecil" name="country" class="select">
                                                    <option value="none" selected disabled hidden>
                                                        country
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
                                        <div class="btn-group col-md-3 ">
                                            <div class="btn-group">
                                                <select id="language" name="language" class="select">
                                                    <option value="none" selected disabled hidden>
                                                        language
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
                                                <select id="device" name="device" class="select">
                                                    <option value="none" selected disabled hidden>
                                                        device
                                                    </option>
                                                    <option>
                                                        Mobil
                                                    </option>
                                                    <option>
                                                        Masaüstü
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="btn-group col-md-3 ">
                                            <div class="btn-group">
                                                <select id="cityy" name="city" class="select">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <input hidden name="hidden_collonial_name" id="hidden_collonial"/>
                                    <input hidden name="hidden_device_name" id="hidden_device"/>
                                    <input hidden name="language_name" id="language_hidden"/>
                                    <br><br><br>
                                    <button type="submit" class="btn btn-primary mcuLoadingButton"
                                            data-handler="confirm">Kaydet
                                    </button>
                                </form>
                                <button id="close2" class="btn btn-default"
                                        data-dismiss="modal">Kapat
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
                                        data-dismiss="grafikmodal">Kapat
                                </button>
                            </div>
                        </div>

                        </tbody>
                    </table>
                    <div class="pagination" id="pagination">
                        {{--java script generated Pagination in tbody (panel.js)--}}
                    </div>
                    <div id="pageDetails" class="page-details">
                    </div>
                </div>
                <div class="card-block">

                </div>
            </div>
        </div>
    </div>
@endsection
