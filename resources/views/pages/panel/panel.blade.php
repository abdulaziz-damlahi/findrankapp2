@extends('layouts.master')
@section('content')
        <a class="SideBarName" hidden id="username">{{ auth()->user()->first_name }}</a>
        @if (session('packetempty'))
            <div class="alert alert-danger">
                {{ session('packetempty') }}
            </div>
        @endif
    {{--   <div style="" id="id">{{ $userId}}</div>--}}
    <div class="pcoded-inner-content" id="main">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="col-lg-8 col-md-12 row">
                        @foreach($userwebsites8 as $userwebsite)
                            <a href="website/{{ $userwebsite->id}} ">
                                <div class="col-md-12 col-xl-4">
                                    <div style="background-color:#ff6c3a" class="card order-card">
                                        <div class="card-block">
                                            <h6 class="m-b-20"> {{ $userwebsite->website_name }}</h6>
                                            <h class="m-b-20">Keywords Used {{ $userwebsite->wordcount }}</h>
                                            <h2 class="text-right"><i class="ti-shopping-cart f-left"
                                                                      style="text-shadow: 3px 3px 5px #0000!important; ;"></i><span></span>
                                            </h2>
                                            <p class="m-b-0"><span class="f-right"></span>
                                            <td class="sort_change text-center hidden-xs" data-change="36">

                                            </td>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                    @endforeach
                    <!-- order-card end -->
                        <div class="col-lg-12 col-md-12">
                            <div class="card whitebackground">
                                <div class="card-header ">
                                    <h5>Statistics</h5>
                                    <br>
                                    <br>
                                    <table
                                        class="table table-hover table-vcenter table-striped table-track table-layout: fixed; width: 100%"
                                        style="font-size: 13px">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col" >website</th>
                                            <th scope="col"  >word</th>
                                            <th scope="col" >rank</th>
                                            <th  scope="col">grafik</th>
                                        </tr>
                                        </thead>
                                        <tbody id="row">
                                        <tbody id="row">
                                        {{--                                            table content from js--}}
                                        <div id="myModal" class="modal">
                                            <!-- Modal content -->
                                            <div class="modal-content">
                                                <span style="size: 15px;" id="close" class="close">X</span>
                                                <br><br>
                                                <form action="{{route('addwebsite')}}" class="btn-submit" method="POST">

                                                    @csrf
                                                    <textarea class="form-control" id="urls" name="website" rows="5"
                                                              placeholder=""></textarea>
                                                    <br><br>

                                                    <button type="submit" class="btn btn-primary mcuLoadingButton"
                                                            data-handler="confirm">Kaydet
                                                    </button>
                                                </form>
                                                <button id="close2" class="btn btn-default"
                                                        data-dismiss="modal">Kapat
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

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="card whitebackground">
                            <div class="card-header whitebackground">
                                <h5>ANAHTAR KELİME POZİSYONLARI</h5>
                            </div>
                            <div class="card-block whitebackground">
                                {{--popup ilk kilme--}}
                                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                                <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                                <div class="col-md-12" style="font-size:15px; padding: 40px;">
                                        <span class="text-left"><button id="ilke3btn" class=""><i
                                                    class="fa  fa-square push-5-r"
                                                    style=" color:#005698">  </i>İlk 3'de:<b
                                                    id="ilk3">  </b> <b>kilme</b> </button> </span>
                                    <span class="text-left"><button id="ilke10btn" class=""><i
                                                class="fa  fa-square push-5-r"
                                                style=" color:#16c800">  </i>İlk 10'de: <b
                                                id="ilk10">  </b> <b>kilme</b>  </button> </span>
                                    <span class="text-left"><button id="ilke100btn" class=""><i
                                                class="fa  fa-square push-5-r"
                                                style=" color:#cb0000">  </i>İlk 100'de: <b
                                                id="ilk100">  </b> <b>kilme</b> </button>  </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- statustic and process start -->
                    <div class="col-lg-12 col-md-12">
                        <div class="card whitebackground">
                            <div class="card-header">
                                <h5>TAKİP EDİLEN WEB SİTELERİ</h5>
                                @if($errors->any())
                                    <div class="alert-danger" style="font-size: 15px;">
                                        {{$errors->first()}}
                                    </div>
                                @endif
                                <br>
                                <br>
                                <br>
                                <div class="block-content">
                                    <div class="push">
                                        <div class="btn-group">
                                            <button class="btns btn-default" type="button" id="addNewSite"><i
                                                    class="fa fa-plus text-success"><span class="hidden-xs push-7-l">Site Ekle</span></i>
                                            </button>

                                        </div>
                                        <table
                                            {{--  down table head--}}
                                            class="table table-hover table-vcenter table-striped table-track table-layout: fixed; width: 100%">
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
                                            <thead>
                                            <tr>
                                                <th scope="col">id</th>
                                                <th scope="col">SİTELER</th>
                                                <th class="hidden-xs" scope="col">GÜNLÜK DEĞİŞİM</th>
                                                <th scope="col">KELİMELER</th>
                                                <th class="hidden-xs" scope="col">delete</th>
                                            </tr>
                                            </thead>
                                            {{--   table body--}}
                                            <tbody id="followedWebsites" class="list">
                                            <div id="myModal" class="modal">
                                                <!-- Modal content -->
                                                <div class="modal-content">
                                                    <span style="size: 15px;" id="close" class="close">X</span>
                                                    <br><br>
                                                    <form action="{{route('addwebsite')}}" class="btn-submit"
                                                          method="POST">

                                                        @csrf
                                                        <textarea class="form-control" id="urls" name="website" rows="5"
                                                                  placeholder=""></textarea>
                                                        <br><br>

                                                        <button type="submit" class="btn btn-primary mcuLoadingButton"
                                                                data-handler="confirm">Kaydet
                                                        </button>
                                                    </form>
                                                    <button id="close2" class="btn btn-default"
                                                            data-dismiss="modal">Kapat
                                                    </button>
                                                </div>

                                            </div>
                                            {{--<input hidden id="hidden_input">--}}
                                            {{--<input hidden id="hidden_count">--}}


                                            </tbody>
                                            {{--  down table body--}}
                                        </table>
                                        <!-- ilk3 Modal  -->
                                        <div id="ilk3modal" class="modal">

                                            <div class="modal-content2">
                                                <span style="size: 15px;" id="closeilk3" class="close">X</span>
                                                <br><br>
                                                <div class="col-md-12 container">

                                                    <table
                                                        class="table table-hover table-vcenter table-striped table-track">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">ANAHTAR KELİME</th>
                                                            <th scope="col">sira</th>
                                                            <th scope="col">grafik</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="ilk3table" class="list">
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                        <div id="ilk10modal" class="modal">

                                            <div class="modal-content2">
                                                <span style="size: 15px;" id="closeilk10" class="close">X</span>
                                                <br><br>
                                                <div class="col-md-12 container">

                                                    <table
                                                        class="table table-hover table-vcenter table-striped table-track">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">ANAHTAR KELİME</th>
                                                            <th scope="col">sira</th>
                                                            <th scope="col">grafik</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="ilk10table" class="list">
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                        <div id="ilk100modal" class="modal">

                                            <div class="modal-content2">
                                                <span style="size: 15px;" id="closeilk100" class="close">X</span>
                                                <br><br>
                                                <div class="col-md-12 container">

                                                    <table
                                                        class="table table-hover table-vcenter table-striped table-track">
                                                        <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">ANAHTAR KELİME</th>
                                                            <th scope="col">sira</th>
                                                            <th scope="col">grafik</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody id="ilk100table" class="list">
                                                        </tbody>
                                                    </table>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>


                        <!-- statustic and process end -->
                    </div>
                </div>
                <div id="styleSelector">
                </div>
            </div>
        </div>
    </div>
@endsection
