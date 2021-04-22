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
                                    <div class="card-block order-card">
                                        <table class="table table-bordered table-striped table-condensed "
                                               style="width:100%;">
                                            <tbody>
                                            <tr>
                                                <td class="tableStyle wordbreak">
                                                    {{__('pages.packet')}}:
                                                </td>
                                                <td class="tableStyle wordbreak" id="packet_names"></td>
                                            </tr>
                                            <tr>
                                                <td class="tableStyle wordbreak">
                                                    {{__('pages.starts')}} :
                                                </td>
                                                <td class="tableStyle wordbreak" id="createdAt"></td>
                                            </tr>
                                            <tr>
                                                <td class="tableStyle wordbreak">
                                                    {{__('pages.ends')}}:
                                                </td>
                                                <td class="tableStyle wordbreak" id="endofpacket"></td>
                                            </tr>
                                            <tr>
                                                <td id="" class="tableStyle wordbreak">
                                                    {{__('pages.Remaining Days')}}:
                                                </td>
                                                <td id="daysleft3" class="tableStyle wordbreak">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="tableStyle wordbreak"><b><a
                                                            href="{{ route('packets') }}">{{__('pages.update your packet')}}</a>
                                                    </b>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card bg-c-yellow order-card">
                                        <div class="card-block">
                                            <div class="block-content block-content-full">
                                                <div><span class="tableStyle">{{__('pages.Remaining words')}}</span>
                                                    <span
                                                        id="" class="tableStyle pull-right"><b id="keywordused"></b>/<b
                                                            id="maxcountword"> </b></span>
                                                </div>
                                                <div class="progress-bar-border" style="margin-bottom:3px">
                                                    <div class="progress">
                                                        <div class="progress-bar bg-success" id="wordprogress"
                                                             role="progressbar" aria-valuenow="25"
                                                             aria-valuemin="0" aria-valuemax="100"></div>
                                                    </div>
                                                </div>
                                                <div class="tableStyle">
                                                    <br>
                                                    <small>{{__('pages.Total number of keywords')}}</small><br>
                                                </div>
                                                <hr>
                                                <div><span class="tableStyle">{{__('pages.Remaining sites')}}</span>
                                                    <span
                                                        class="tableStyle pull-right"><b id="websiteused"></b> /<b
                                                            id="maxwebsite"></b> </span>
                                                </div>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" id="websiteprogress"
                                                         role="progressbar" aria-valuenow="25"
                                                         aria-valuemin="0" aria-valuemax="100"></div>
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
        </div>
    </div>
    </div>
@endsection
