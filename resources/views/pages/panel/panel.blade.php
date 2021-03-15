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

                                            @foreach($userwebsites as $userwebsite)
                                                <tr>
                                                    <th scope="col">{{ $userwebsite->website_name }}</th>
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
                                    <span class="d-block text-c-blue f-24 f-w-600 text-center">365247</span>
                                    <canvas id="feedback-chart" height="100"></canvas>
                                    <div class="row justify-content-center m-t-15">
                                        <div class="col-auto b-r-default m-t-5 m-b-5">
                                            <h4>83%</h4>
                                            <p class="text-success m-b-0"><i class="ti-hand-point-up m-r-5"></i>Positive
                                            </p>
                                        </div>
                                        <div class="col-auto m-t-5 m-b-5">
                                            <h4>17%</h4>
                                            <p class="text-danger m-b-0"><i class="ti-hand-point-down m-r-5"></i>Negative
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- statustic and process end -->
                        <!-- tabs card start -->
                        <div class="col-sm-12">
                            <div class="card tabs-card">
                                <div class="card-block p-0">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs md-tabs" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#home3" role="tab"><i
                                                    class="fa fa-home"></i>Home</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#profile3" role="tab"><i
                                                    class="fa fa-key"></i>Security</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#messages3" role="tab"><i
                                                    class="fa fa-play-circle"></i>Entertainment</a>
                                            <div class="slide"></div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#settings3" role="tab"><i
                                                    class="fa fa-database"></i>Big Data</a>
                                            <div class="slide"></div>
                                        </li>
                                    </ul>
                                    <!-- Tab panes -->
                                    <div class="tab-content card-block">
                                        <div class="tab-pane active" id="home3" role="tabpanel">

                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr>
                                                        <th>Image</th>
                                                        <th>Product Code</th>
                                                        <th>Customer</th>
                                                        <th>Purchased On</th>
                                                        <th>Status</th>
                                                        <th>Transaction ID</th>
                                                    </tr>
                                                    <tr>
                                                        <td><img src="{{asset('images')}}/product/prod2.jpg"
                                                                 alt="prod img"
                                                                 class="img-fluid"></td>
                                                        <td>PNG002344</td>
                                                        <td>John Deo</td>
                                                        <td>05-01-2017</td>
                                                        <td><span class="label label-danger">Faild</span></td>
                                                        <td>#7234486</td>
                                                    </tr>
                                                    <tr>
                                                        <td><img src="{{asset('images')}}/product/prod3.jpg"
                                                                 alt="prod img"
                                                                 class="img-fluid"></td>
                                                        <td>PNG002653</td>
                                                        <td>Eugine Turner</td>
                                                        <td>04-01-2017</td>
                                                        <td><span class="label label-success">Delivered</span></td>
                                                        <td>#7234417</td>
                                                    </tr>
                                                    <tr>
                                                        <td><img src="{{asset('images')}}/product/prod4.jpg"
                                                                 alt="prod img"
                                                                 class="img-fluid"></td>
                                                        <td>PNG002156</td>
                                                        <td>Jacqueline Howell</td>
                                                        <td>03-01-2017</td>
                                                        <td><span class="label label-warning">Pending</span></td>
                                                        <td>#7234454</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="text-center">
                                                <button class="btn btn-outline-primary btn-round btn-sm">Load More
                                                </button>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="profile3" role="tabpanel">

                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr>
                                                        <th>Image</th>
                                                        <th>Product Code</th>
                                                        <th>Customer</th>
                                                        <th>Purchased On</th>
                                                        <th>Status</th>
                                                        <th>Transaction ID</th>
                                                    </tr>
                                                    <tr>
                                                        <td><img src="{{asset('images')}}/product/prod3.jpg"
                                                                 alt="prod img"
                                                                 class="img-fluid"></td>
                                                        <td>PNG002653</td>
                                                        <td>Eugine Turner</td>
                                                        <td>04-01-2017</td>
                                                        <td><span class="label label-success">Delivered</span></td>
                                                        <td>#7234417</td>
                                                    </tr>
                                                    <tr>
                                                        <td><img src="{{asset('images')}}/product/prod4.jpg"
                                                                 alt="prod img"
                                                                 class="img-fluid"></td>
                                                        <td>PNG002156</td>
                                                        <td>Jacqueline Howell</td>
                                                        <td>03-01-2017</td>
                                                        <td><span class="label label-warning">Pending</span></td>
                                                        <td>#7234454</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="text-center">
                                                <button class="btn btn-outline-primary btn-round btn-sm">Load More
                                                </button>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="messages3" role="tabpanel">

                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr>
                                                        <th>Image</th>
                                                        <th>Product Code</th>
                                                        <th>Customer</th>
                                                        <th>Purchased On</th>
                                                        <th>Status</th>
                                                        <th>Transaction ID</th>
                                                    </tr>
                                                    <tr>
                                                        <td><img src="{{asset('images')}}/product/prod1.jpg"
                                                                 alt="prod img"
                                                                 class="img-fluid"></td>
                                                        <td>PNG002413</td>
                                                        <td>Jane Elliott</td>
                                                        <td>06-01-2017</td>
                                                        <td><span class="label label-primary">Shipping</span></td>
                                                        <td>#7234421</td>
                                                    </tr>
                                                    <tr>
                                                        <td><img src="{{asset('images')}}/product/prod4.jpg"
                                                                 alt="prod img"
                                                                 class="img-fluid"></td>
                                                        <td>PNG002156</td>
                                                        <td>Jacqueline Howell</td>
                                                        <td>03-01-2017</td>
                                                        <td><span class="label label-warning">Pending</span></td>
                                                        <td>#7234454</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="text-center">
                                                <button class="btn btn-outline-primary btn-round btn-sm">Load More
                                                </button>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="settings3" role="tabpanel">

                                            <div class="table-responsive">
                                                <table class="table">
                                                    <tr>
                                                        <th>Image</th>
                                                        <th>Product Code</th>
                                                        <th>Customer</th>
                                                        <th>Purchased On</th>
                                                        <th>Status</th>
                                                        <th>Transaction ID</th>
                                                    </tr>
                                                    <tr>
                                                        <td><img src="{{asset('images')}}/product/prod1.jpg"
                                                                 alt="prod img"
                                                                 class="img-fluid"></td>
                                                        <td>PNG002413</td>
                                                        <td>Jane Elliott</td>
                                                        <td>06-01-2017</td>
                                                        <td><span class="label label-primary">Shipping</span></td>
                                                        <td>#7234421</td>
                                                    </tr>
                                                    <tr>
                                                        <td>PNG002344</td>
                                                        <td>John Deo</td>
                                                        <td>05-01-2017</td>
                                                        <td><span class="label label-danger">Faild</span></td>
                                                        <td>#7234486</td>
                                                    </tr>
                                                </table>
                                            </div>
                                            <div class="text-center">
                                                <button class="btn btn-outline-primary btn-round btn-sm">Load More
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- tabs card end -->
                    </div>
                </div>
                <div id="styleSelector">
                </div>
            </div>
        </div>
    </div>
@endsection
