@extends('layouts.master')
@section('content')
    <a class="SideBarName" hidden id="username">{{ auth()->user()->first_name }}</a>
    <div class="container" id="main">
        <div class="pcoded-inner-content">
            <div class="main-body col-md-12">
                <div class="page-wrapper col-md-12">
                    <div class="page-body ">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="col-md-12 ">
                                    <div class="card bg-c-green order-card">
                                        <div class="card-block " style="height: 300px">
                                            <table class="table table-bordered table-striped table-condensed " style="width:100%;">
                                                <tbody>
                                                <tr>
                                                    <td class="tableStyle">
                                                        {{__('pages.packet')}}:
                                                    </td>
                                                    <td class="tableStyle">{{$packetdata->packet_names}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="tableStyle">
                                                        {{__('pages.starts')}} :
                                                    </td>
                                                    <td class="tableStyle">{{$packetdata->created_at}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="tableStyle">
                                                        {{__('pages.ends')}}:
                                                    </td>
                                                    <td class="tableStyle">{{$packetdata->end_of_pocket}}</td>
                                                </tr>
                                                <tr>
                                                    <td id="daysleft" class="tableStyle">
                                                        {{__('pages.Remaining Days')}}
                                                    </td>
                                                    <td class="tableStyle"><b><a href="{{ route('packets') }}">{{__('pages.update your packet')}}</a></b>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card bg-c-yellow order-card">
                                        <div class="card-block">
                                            <div class="block-content block-content-full">
                                                <div><span class="tableStyle">{{__('pages.Remaining words')}}</span> <span
                                                        id="" class="tableStyle pull-right"><b id="keywordused"></b>/<b
                                                            id="maxcountword">{{$packetdata->max_count_of_words}}</b></span>
                                                </div>
                                                <div class="progress-bar-border" style="margin-bottom:3px">
                                                    <div id="keywordprogress" class="progress progress-mini"
                                                         style="margin-bottom:0;">
                                                        <div class="progress-bar progress-bar-success"
                                                             role="progressbar" style="width: 100%"></div>
                                                    </div>
                                                </div>
                                                <div class="tableStyle">
                                                    <br>
                                                    <small>{{__('pages.Total number of keywords')}}</small><br>
                                                </div>
                                                <hr>

                                                <div><span class="tableStyle">{{__('pages.Remaining sites')}}</span> <span
                                                        class="tableStyle pull-right"><b id="websiteused"></b> /<b
                                                            id="maxwebsite">{{$packetdata->max_count_of_websites}}</b> </span>
                                                </div>
                                                <div class="progress-bar-border" style="margin-bottom:3px">
                                                    <div class="progress progress-max" style="margin-bottom:0;">
                                                        <div id="websiteprogress"
                                                             class="progress-bar progress-bar-success"
                                                             role="progressbar" style="width: 100%"></div>
                                                    </div>
                                                </div>
                                                <div class="tableStyle">
                                                    <br>
                                                    <small>{{__('pages.Total number of websites')}}</small><br>
                                                    <small>{{__('pages.The total of  keywords and sites')}}</small>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="styleSelector">
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
