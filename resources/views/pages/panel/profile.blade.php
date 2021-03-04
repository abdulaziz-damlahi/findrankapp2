@extends('layouts.master')
@section('content')

    <div class="pcoded-inner-content" id="main">
        <div class="main-body col-md-12">
            <div class="page-wrapper col-md-12">

                <div class="page-body ">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-6">
                                <div class="card bg-c-green order-card">
                                    <div class="card-block " style="height: 300px">
                                        <table class="table table-bordered table-striped table-condensed ">
                                            <tbody>
                                            <tr>
                                                <td class="tableStyle">
                                                    Paket:
                                                </td>
                                                <td class="tableStyle">Pro</td>
                                            </tr>
                                            <tr>
                                                <td class="tableStyle">
                                                    Başlangıç:
                                                </td>
                                                <td class="tableStyle">15.02.2021</td>
                                            </tr>
                                            <tr>
                                                <td class="tableStyle">
                                                    Bitiş:
                                                </td>
                                                <td class="tableStyle">15.03.2021</td>
                                            </tr>
                                            <tr>
                                                <td class="tableStyle">
                                                    25 Gün Kaldı
                                                </td>
                                                <td class="tableStyle"><a href="/packet">update your packet</a> </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card bg-c-yellow order-card">
                                    <div class="card-block">
                                        <div class="block-content block-content-full">
                                            <div><span  class="tableStyle">Kelime Takibi</span> <span  class="tableStyle pull-right"><b>249</b> / 250</span></div>
                                            <div class="progress-bar-border" style="margin-bottom:3px">
                                                <div class="progress progress-mini" style="margin-bottom:0;"><div class="progress-bar progress-bar-success" role="progressbar" style="width: 99.6%"></div></div>
                                            </div>
                                            <div  class="tableStyle">
                                                <small>Toplam takip altına alabileceğiniz kelime sayısı.</small><br>
                                                <small>Bu kelimelerin sırası her gün otomatik olarak güncellenir.</small>
                                            </div>
                                            <hr>

                                            <div><span  class="tableStyle">Site Ekleme</span> <span  class="tableStyle pull-right"><b>1</b> / 25</span></div>
                                            <div class="progress-bar-border" style="margin-bottom:3px">
                                                <div class="progress progress-mini" style="margin-bottom:0;"><div class="progress-bar progress-bar-success" role="progressbar" style="width: 4%"></div></div>
                                            </div>
                                            <div  class="tableStyle">
                                                <small>Toplam takip altına alabileceğiniz site sayısı.</small>
                                            </div>
                                            <hr>

                                            <div><span  class="tableStyle">Rakip Ekleme</span> <span  class="tableStyle pull-right"><b>5</b> / 30</span></div>
                                            <div class="progress-bar-border" style="margin-bottom:3px">
                                                <div class="progress progress-mini" style="margin-bottom:0;"><div class="progress-bar progress-bar-success" role="progressbar" style="width: 16.666666666667%"></div></div>
                                            </div>
                                            <div  class="tableStyle">
                                                <small>Toplam takip altına alabileceğiniz rakip site sayısı.</small>
                                            </div>
                                            <hr>

                                            <div><span  class="tableStyle">Sıra Sorgulama</span> <span  class="tableStyle pull-right"><b>0</b> / 500</span></div>
                                            <div class="progress-bar-border" style="margin-bottom:3px">
                                                <div class="progress progress-mini" style="margin-bottom:0;"><div class="progress-bar progress-bar-success" role="progressbar" style="width: 0%"></div></div>
                                            </div>
                                            <div  class="tableStyle">
                                                <small>Günlük manuel sıra sorgulama hakkınız.</small><br>
                                                <small>Yeni kelime takibinde, manuel sıra güncellemesinde ve sıra bulucuda yapacağınız sorgular.</small>
                                            </div>
                                            <hr>

                                            <div><span  class="tableStyle">Kelime Önerisi</span> <span  class="tableStyle pull-right"><b>0</b> / 250</span></div>
                                            <div class="progress-bar-border" style="margin-bottom:3px">
                                                <div class="progress progress-mini" style="margin-bottom:0;"><div class="progress-bar progress-bar-success" role="progressbar" style="width: 0%"></div></div>
                                            </div>
                                            <div  class="tableStyle">
                                                <small>Anahtar kelime aracında günlük sorgulayabileceğiniz farklı kelime sayısı.</small>
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

    <style>
        .tableStyle{ width:50%;
            font-size:15px !important;
            color: black !important;}
    </style>
@endsection
