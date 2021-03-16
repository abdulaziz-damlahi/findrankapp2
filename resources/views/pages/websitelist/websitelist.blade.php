@extends('layouts.master')
@section('content')
    <div class="container" style="height:700px">
        <div class="col-lg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5>{{$websiteid}}</h5>
                    <br>
                    <br>
                    <div class="btn-group">
                        <button class="btns btn-default" type="button" id="addNewSite"><i
                                class="fa fa-plus text-success"><span class="hidden-xs push-7-l">keleme Ekle</span></i>
                        </button>
                    </div>
                    <br>
                    <br>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">ANAHTAR KELİME</th>
                            <th scope="col">SIRA</th>
                            <th scope="col">GRAFİK</th>
                            <th scope="col">delete</th>
                        </tr>
                        </thead>
                        <tbody id="row">


                        <div id="myModal" class="modal">
                            <!-- Modal content -->
                            <div class="modal-content">
                                <span style="size: 15px;" id="close" class="close">X</span>
                                <br><br>
                                <form action="{{route('addword')}}" class="btn-submit" method="POST">

                                    @csrf
                                    <textarea class="form-control" id="urls" name="keyword" rows="5"
                                              placeholder=""></textarea>
                                    <textarea style="display:none" class="form-control" id="urls" name="websiteid" rows="5"
                                              placeholder="">{{$websiteid}}</textarea>
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
    </div>
@endsection
