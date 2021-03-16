@extends('layouts.master')
@section('content')
    {{--   <div style="" id="id">{{ $userId}}</div>--}}
    <div class="pcoded-inner-content" id="main">
        <div class="main-body">
            <div class="page-wrapper">

                <div class="page-body">
                    <div class="row">
                        @foreach($userwebsites8 as $userwebsite)

                            <div class="col-md-12 col-xl-3">
                                <div class="card bg-c-blue order-card">
                                    <div class="card-block">
                                        <h6 class="m-b-20"> {{ $userwebsite->website_name }}</h6>
                                        <h2 class="text-right"><i class="ti-shopping-cart f-left"
                                                                  style="text-shadow: 3px 3px 5px #0000!important; ;"></i><span></span>
                                        </h2>
                                        <p class="m-b-0"><span class="f-right"></span></p>
                                    </div>
                                </div>
                            </div>

                    @endforeach

                    <!-- order-card end -->
                    </div>
                    <!-- statustic and process start -->
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
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
                                            <button class="btns btn-default" type="button" id="updateKeywords"><i
                                                    class="fa fa-refresh text-primary"><span class="hidden-xs push-7-l">Kelimeleri Güncelle</span></i>
                                            </button>
                                        </div>
                                        <table class="table table-hover table-vcenter table-striped table-track">
                                            <thead>
                                            <tr>
                                                <th scope="col">SİTELER</th>
                                                <th scope="col">GÜNLÜK DEĞİŞİM</th>
                                                <th scope="col">KELİMELER</th>
                                                <th scope="col">delete</th>
                                            </tr>
                                            </thead>
                                            <tbody id="mysites" class="list">
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
                                            @foreach($userwebsites as $userwebsite)
                                                <tr>
                                                    <th scope="col"><a href="{{route('websitelist',$userwebsite->id)}}">{{ $userwebsite->website_name }}</a></th>
                                                    <th scope="col">GÜNLÜK DEĞİŞİM</th>
                                                    <th scope="col">{{ $userwebsite->wordcount}}</th>
                                                    <th scope="col"><a href = 'deletewebsite/{{ $userwebsite->id }}'  class="fa fa-trash text-danger"></a></th>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-lg-8 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Statistics</h5>
                                    <br>
                                    <br>
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">WEB SİTE / URL</th>
                                            <th scope="col">ANAHTAR KELİME</th>
                                            <th scope="col">SIRA</th>
                                            <th scope="col">DEĞİŞİM</th>
                                            <th scope="col">GRAFİK</th>
                                        </tr>
                                        </thead>
                                        <tbody id="row">


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
                                <div class="card-block">

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Customer Feedback</h5>
                                </div>
                                <div class="card-block">
                                    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                                    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
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
