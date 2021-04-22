@extends('layouts.master')
@section('content')

    <a class="SideBarName" hidden id="username">{{ auth()->user()->first_name }}</a>
    <a class="SideBarName" hidden id="userid">{{ auth()->user()->id }}</a>
    @if (session('packetempty'))
        <div class="alert alert-danger">
            {{ session('packetempty') }}
        </div>
    @endif
    {{--<div style="" id="id">{{ $userId}}</div>--}}
    <div class="pcoded-inner-content" id="main">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">
                    <div class="col-lg-8 col-md-12 row">
                        @foreach($userwebsites8 as $userwebsite)
                            <a href="website/{{ $userwebsite->id}} ">
                                <div class="col-md-12 col-xl-4">
                                    <div style="background-color:#ff6c3a;" class="card order-card">
                                        <div class="card-block">
                                            <h6 class="m-b-20"> {{ $userwebsite->website_name }}</h6>
                                            <h6 class="m-b-20" hidden>{{ $userwebsite->id}}</h6>
                                            <h class="m-b-20">{{__('panel.Keywords Used')}} {{ $userwebsite->wordcount }}</h>
                                            <br><br>
                                            <table>
                                                <th><h5 id='up{{ $userwebsite->id}}' style="color:lightgreen;width: 50px">
                                                        <img class="svgstyle" src="{{asset('assets')}}/svg/up-arrow.svg"></h5></th>
                                                <th><h5 id='equal{{ $userwebsite->id}}' style="color:mediumpurple">
                                                        <img class="svgstyle" src="{{asset('assets')}}/svg/equal-arrow.svg"></h5></th>
                                                <th><h5 id='down{{ $userwebsite->id}}' style="color:white">
                                                        <img class="svgstyle" src="{{asset('assets')}}/svg/down-arrow.svg"></h5></th>
                                            </table>
                                            <h2 class="text-right"><i class="ti-shopping-cart f-left"></i><span></span>
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
                        <div class="col-lg-12 col-md-12">
                            <div class="card whitebackground">
                                <div class="card-header ">
                                    <h5>{{__('panel.Statistics')}}</h5>
                                    <br>
                                    <br>
                                    <table
                                        class="table table-hover table-vcenter table-striped table-track table-layout: fixed; width: 100%"
                                        style="font-size: 13px">
                                        <thead>
                                        <tr>
                                            <th scope="col">{{__('panel.website')}}</th>
                                            <th scope="col">{{__('panel.word')}}</th>
                                            <th scope="col">{{__('panel.rank')}}</th>
                                            <th scope="col">{{__('panel.graph')}}</th>
                                        </tr>
                                        </thead>
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
                                                            data-handler="confirm">{{__('panel.save')}}
                                                    </button>
                                                </form>
                                                <button id="close2" class="btn btn-default"
                                                        data-dismiss="modal">{{__('panel.close')}}
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
                                <h5>{{__('panel.positions')}}</h5>
                            </div>
                            <div class="card-block whitebackground">
                                {{--popup ilk kilme--}}
                                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                                <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                                <div class="col-md-12" style="font-size:15px; padding: 40px;">
                                        <span class="text-left"><button id="ilke3btn" class="ilkbtn"><i class="fa  fa-square push-5-r"
                                                                                                        style=" color:#ff6c3a">  </i>{{__('panel.first')}} 3{{__('panel.de')}}:<b
                                                    id="ilk3">  </b> <b>{{__('panel.word')}}</b> </button> </span>
                                    <span class="text-left"><button id="ilke10btn" class="ilkbtn"><i
                                                class="fa  fa-square push-5-r"
                                                style=" color:cornflowerblue">  </i>{{__('panel.first')}} 10{{__('panel.de')}}: <b
                                                id="ilk10">  </b> <b>{{__('panel.word')}}</b>  </button> </span>
                                    <span class="text-left"><button id="ilke100btn" class="ilkbtn"><i
                                                class="fa  fa-square push-5-r"
                                                style=" color:#cb0000">  </i>{{__('panel.first')}} 100{{__('panel.de')}}: <b
                                                id="ilk100">  </b> <b>{{__('panel.word')}}</b> </button>  </span>
                                </div>
                            </div>
                        </div>
                        {{-- ANAHTAR KELİME DEĞİŞİMLERİ--}}
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
                                                <br> <img class="svgstylepanel" src="{{asset('assets')}}/svg/up-arrow.svg"><br></div>
                                            <div class="pull-right push-5-r"><b style="font-size:28px" id="totaldown"></b>
                                                <medium class="text-muted">{{__('panel.Drop')}}</medium>
                                                <br><img class="svgstylepanel" src="{{asset('assets')}}/svg/down-arrow.svg"><br></div>
                                        </div>
                                        <br>
                                        <div class="progress backorange" id="mainprogress">
                                            <div class="progress-bar backgreen" id="KeywordTotalWordCount" role="progressbar" aria-valuenow="25"
                                                 aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                        <span> <span id="totalword" class="font-w600"></span>{{__('panel.word')}} </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- statustic and process start -->
                    <div class="col-lg-12 col-md-12">
                        <div class="card whitebackground">
                            <div class="card-header">
                                <h5>{{__('panel.Followed Websites')}}</h5>
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
                                                    class="fa fa-plus text-success"><span class="hidden-xs push-7-l">{{__('panel.Add Website')}}</span></i>
                                            </button>
                                        </div>
                                        <table class="table table-hover table-vcenter table-striped table-track table-layout: fixed; width: 100%">
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
                                                <th scope="col">{{__('panel.Sites')}}</th>
                                                <th class="hidden-xs" scope="col">{{__('panel.daily change')}}</th>
                                                <th scope="col">{{__('panel.words count')}}</th>
                                                <th class="hidden-xs" scope="col">{{__('panel.delete')}}</th>
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
                                                                data-handler="confirm">{{__('panel.save')}}
                                                        </button>
                                                    </form>
                                                    <button id="close2" class="btn btn-default"
                                                            data-dismiss="modal">{{__('panel.close')}}
                                                    </button>
                                                </div>
                                            </div>
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
                                                            <th scope="col">{{__('panel.keyword')}}</th>
                                                            <th scope="col">{{__('panel.order')}}</th>
                                                            <th scope="col">{{__('panel.graph')}}</th>
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
                                                            <th scope="col">{{__('panel.keyword')}}</th>
                                                            <th scope="col">{{__('panel.order')}}</th>
                                                            <th scope="col">{{__('panel.graph')}}</th>
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
                                                            <th scope="col">{{__('panel.keyword')}}</th>
                                                            <th scope="col">{{__('panel.order')}}</th>
                                                            <th scope="col">{{__('panel.graph')}}</th>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
