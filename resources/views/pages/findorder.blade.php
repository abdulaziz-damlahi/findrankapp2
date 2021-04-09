@extends('layouts.master')
@section('content')
<div >
    <div class="full"></div>
    <section id="general_find" class="col-md-12 row bg-parallax seo-secore padding-top-100 padding-bottom-100 padding-left-100 padding-right-65"
             >
        <script src="https://cdn.socket.io/3.1.3/socket.io.min.js" integrity="sha384-cPwlPLvBTa3sKAgddT6krw0cJat7egBga3DJepJyrLl4Q9/5WLra3rrnMcyTyOnh" crossorigin="anonymous"></script>
        <script src=" https://cdnjs.cloudflare.com/ajax/libs/socket.io/3.1.3/socket.io.min.js" integrity="sha384-cPwlPLvBTa3sKAgddT6krw0cJat7egBga3DJepJyrLl4Q9/5WLra3rrnMcyTyOnh" crossorigin="anonymous"></script>


        <script>
          $(document).ready(function () {
            const socket = io.connect("http://localhost:3000/", {});

            socket.on('connect',function (){
              console.log('connected server2')
              $('#post_method').submit(function (e) {
                let test='girer';
                socket.emit('girdi',{
                  test
                })
                let website = $("#website_value").val();
                let keyword = $("#keyword_value").val();
                let country = $("#country ").val();
                let city = $("#cityy ").val();
                let language = $("#language ").val();
                let device = $("#device ").val();

                socket.emit('dönüyorMmu', {
                  website,
                  keyword,
                  device,
                  country,
                  city,
                  language,
                })
              });
            })
            socket.on('newmessage',function (message){
              console.log('newmessage',message)
              $( ".full" ).append(message.from);
            })
          });
        </script>
        <br class="container" style="padding-right: 500px; padding-left:500px; ">
        <!-- Tittle -->
        <div class="heading-block white-text text-center margin-bottom-50">
            <h2 style="color: black">What’s Your Google Rank ?</h2>
            <span style="color: black">See how well your page is optimised for your keyword</span></div>
        <!-- Form -->
        <form method="post" id="post_method" content="{{ csrf_token() }}" data-route="{{route('findpost')}}" class="form_rank_order col-md-12" enctype="multipart/form-data" >
            @csrf
            @if($errors->any())
                <div class="alertMessage alert-danger">
                   <h5>{{$errors->first()}}
                </div>
            @endif
            <ul class="row col-lg-12">
                <li class="col-md-6">
                    <input type="text" id="website_value" name="website" class="form-control" placeholder="http://">
                </li>
                <li class="col-md-6">
                    <input type="text" id="keyword_value" name="keyword" class="form-control" placeholder="Keyword">
                </li>
            </ul>

            <div class="row select_row col-lg-12">
                <div class="btn-group findr_select col-md-3 ">
                    <div class="btn-group">
                        <select id="selectSecil" id="country" class="GoogleRank select">
                            <option class="select">
                                Ülke
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
                <div class="btn-group findr_select col-md-3 ">
                    <div class="btn-group">
                        <select id="language"  class="select GoogleRank">
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
                <div class="btn-group findr_select col-md-3 ">
                    <div class="btn-group">
                        <select id="cityy" class="select GoogleRank">
                        </select>
                    </div>
                </div>
                <div class="btn-group findr_select col-md-3 ">
                    <div class="btn-group">
                        <select id="device" class="select GoogleRank">
                            <option >
                                Mobil
                            </option>
                            <option >
                                Masaüstü
                            </option>
                        </select>
                    </div>
                </div>
            </div>

            <input hidden name="hidden_collonial_name" id="hidden_collonial" />
            <input hidden name="hidden_device_name" id="hidden_device" />
            <input hidden name="language_name" id="language_hidden" />

            <div id="check_now2" >

                <button id="check_now" class="btn btn-orange">Check Now !</button>
            </div>
        </form>
        @isset($resultss)
            @if($resultss>0)
                @if($language!=="arabic")
            @foreach ($resultss as $keyo=>$result)
                @if(strpos($result[2],$website_request) !== false)
                <div id="alert_color" class="alert alert-light" role="alert">

                   <p>Sorguladığınız site  {{$keyo+1}} sırada yer alıyor.</p>
                    <script>
                      $(document).ready(function() {
                        $(".deneme").hide();
                        $(".deneme").css('display','none');
                      });
                    </script>
                </div>
                @endif
            @endforeach
                @isset($result)
                    @if($result!=0)
                @if(strpos($result[2],$website_request) === false)
                    <div class="col-md-12">
                    <div id="alert_color" class="alert deneme alert-light" role="alert">
                        <p>Aradığınız site bulunmamaktadır.</p>
                    </div>
                    </div>
                @endif
                        @endif
                @endisset
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
                        <td>{{ $key+1 }}</td>
                        @if(strpos($result[2],$website_request) !== false)
                            @if($device_information=="Mozilla/5.0 (iPhone; CPU iPhone OS 7_0_4 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) CriOS/45.0.2454.68 Mobile/11B554a Safari/9537.53")

                            <td ><pre style="background-color: #03fdf5">{!!html_entity_decode($result[2])!!}</pre>
                            </td>
                            @else
                                <td ><pre style="background-color: #03fdf5">{!!html_entity_decode($result[2])!!}</pre>
                                </td>
                                @endif
                        @else
                            @if($device_information=="Mozilla/5.0 (iPhone; CPU iPhone OS 7_0_4 like Mac OS X) AppleWebKit/537.51.1 (KHTML, like Gecko) CriOS/45.0.2454.68 Mobile/11B554a Safari/9537.53")
                            <td><pre >{!!html_entity_decode($result[1])!!}</pre>
                            </td>
                                @else
                                <td><pre >{!!html_entity_decode($result[2])!!}</pre>
                                @endif
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
</div>
</div>
                @else
                    @foreach ($resultss as $keyo=>$result)
                        @if(strpos($result[0],$website_request) !== false)
                            <div id="alert_color" class="alert alert-light" role="alert">

                                Sorguladığınız site  {{$keyo+1}} sırada yer alıyor.

                            </div>
                        @else
                            <div id="deneme" class="alert alert-light" role="alert">
                                gelmedi
                            </div>
                        @endif
                    @endforeach

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
                                        <td><pre>{!!html_entity_decode($result[0])!!}</pre>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    @endif
                @endif
        @endisset


    </section>

</div>

@endsection
