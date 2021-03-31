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
                                                        Paket:
                                                    </td>
                                                    <td class="tableStyle">{{$packetdata->packet_names}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="tableStyle">
                                                        Başlangıç:
                                                    </td>
                                                    <td class="tableStyle">{{$packetdata->created_at}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="tableStyle">
                                                        Bitiş:
                                                    </td>
                                                    <td class="tableStyle">{{$packetdata->end_of_pocket}}</td>
                                                </tr>
                                                <tr>
                                                    <td id="daysleft" class="tableStyle">
                                                        Gün Kaldı
                                                    </td>
                                                    <td class="tableStyle"><b><a href="{{ route('packets') }}">update your packet</a></b>
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
                                                <div><span class="tableStyle">Kelime Takibi</span> <span
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
                                                    <small>Toplam takip altına alabileceğiniz kelime sayısı.</small><br>
                                                    <small>Bu kelimelerin sırası her gün otomatik olarak
                                                        güncellenir.</small>
                                                </div>
                                                <hr>

                                                <div><span class="tableStyle">Site Ekleme</span> <span
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
    <style>
        .tableStyle {
            width: 50%;
            font-size: 15px !important;
            color: black !important;
        }
    </style>>
@endsection
