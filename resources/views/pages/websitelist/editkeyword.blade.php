@extends('layouts.master')
@section('content')
    <div class="container" style="height:700px">
            {{$id}}

        <div id="myModal2" class="modal2">
            <!-- Modal content -->
            <div class="container" style="background-color: gray">
                <br><br>
                <form action="{{route('addword')}}" class="btn-submit" method="POST">
                    @csrf
                    <textarea class="form-control" id="urls4" name="keyword" rows="5"
                              placeholder=""></textarea>
                    <textarea style="display:none" class="form-control" id="urls3" name="websiteid"
                              rows="5"
                              placeholder=""></textarea>
                    <br><br>
                    @if($errors->any())
                        <div class="alert-danger" style="font-size: 15px;">
                            {{$errors->first()}}
                        </div>
                    @endif
                    <div class="row col-lg-12">
                        <div class="btn-group col-md-3 ">
                            <div class="btn-group">
                                <select id="selectSecil2" name="country" class="select">
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
                                <select id="language2" name="language" class="select">
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
                                <select id="device2" name="device" class="select">
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
                                <select id="cityy2"  name="city" class="select">
                                </select>
                            </div>
                        </div>
                    </div>
                    <input hidden name="hidden_collonial_name2" id="hidden_collonial2"/>
                    <input hidden name="hidden_device_name2" id="hidden_device2"/>
                    <input hidden name="language_name2" id="language_hidden2"/>
                    <br><br><br>
                    <button type="submit" class="btn btn-primary mcuLoadingButton"
                            data-handler="confirm">Kaydet
                    </button>
                    <br><br><br>
                </form>

            </div>
        </div>
    </div>
@endsection
