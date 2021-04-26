@extends('layouts.master')
@section('content')
    <div class="background">
        <div class="">
{{--            <div id="rightMenu">--}}
{{--                <div id="userPicture">--}}
{{--                    <svg xmlns="http://www.w3.org/2000/svg" fill="white" width="60" height="60" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm7.753 18.305c-.261-.586-.789-.991-1.871-1.241-2.293-.529-4.428-.993-3.393-2.945 3.145-5.942.833-9.119-2.489-9.119-3.388 0-5.644 3.299-2.489 9.119 1.066 1.964-1.148 2.427-3.393 2.945-1.084.25-1.608.658-1.867 1.246-1.405-1.723-2.251-3.919-2.251-6.31 0-5.514 4.486-10 10-10s10 4.486 10 10c0 2.389-.845 4.583-2.247 6.305z"/></svg>--}}
{{--                </div>--}}
{{--                <div class="mt-20 ml-5" id="userName">--}}
{{--                    <h3 class="mx-auto;" id="adminName">{{Auth::user()->first_name}}</h3>--}}
{{--                </div>--}}
{{--                <div class="mt-20" id="visitorsMenu">--}}
{{--                    <h5 id="visitors"> Bugünkü Sorgu Sayısı <br> Sayısı</h5>--}}
{{--                    <h5 id="visitorsCount"> {{$i}} </h5>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div style="float:right;" class="mt-150" id="Buttondashboard">--}}
{{--                <svg id="arrowleft" xmlns="http://www.w3.org/2000/svg" fill="white"  width="24" height="24" viewBox="0 0 24 24"><path d="M16.67 0l2.83 2.829-9.339 9.175 9.339 9.167-2.83 2.829-12.17-11.996z"/></svg>--}}
{{--                </a>--}}
{{--                <a href="#" class="mt-20" id="buttondash">--}}
{{--            </div>--}}
{{--            <svg id="arrowicon" xmlns="http://www.w3.org/2000/svg" fill="white" width="24" height="24" viewBox="0 0 24 24"><path d="M6.028 0v6.425l5.549 5.575-5.549 5.575v6.425l11.944-12z"/></svg>--}}
{{--        </div>--}}
   <div id="containe" class="container">
        <div class="col-md-12" >
            <div class="col-md-6">
                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
            </div>
            <div class="col-md-4">
                <div id="piechart" ></div>
                <div class="pull-right">
                </div>
            </div>
        </div>
<div class="col-md-12">
        <div id="under_menu">
            <table class="table table-striped" id="packetTable">

                <thead>
                <button type="button" id="add" class="btn btn-success" data-toggle="modal"
                        data-target="#addModal">Create New Packet
                </button>
                <tr>

                    <th>Packet Name</th>
                    <th>Word Count</th>
                    <th>web count</th>
                    <th class="hidden-xs">Rank Follow</th>
                    <th class="hidden-xs">Description</th>
                    <th>Price</th>
                </tr>
                </thead>
                <tbody id="bodyTable">
                </tbody>
            </table>
        </div>

    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="addModalLabel">Create Packet</h4>

                </div>
                <div class="modal-body">
                    {{csrf_field()}}
                    <form id="modalForm" class="form-horizontal">

                        <div class="form-group ">
                            <label>Packet Name</label>
                            <input type="text" class="form-control" id="names_packet"></div>

                        <div class="form-group">
                            <label>Word Count</label> <input type="number" class="form-control" id="word_count"></div>
                        <div class="form-group">
                            <label>Websites Count</label> <input type="number" class="form-control" id="websites_count">
                        </div>
                        <div class="form-group ">
                            <label>Rank Follow</label> <input type="number" class="form-control" id="rank_fosllow">
                        </div>
                        <div class="form-group ">
                            <label>Description</label> <input type="text" class="form-control" id="description"></div>
                        <div class="form-group ">
                            <label>Price</label> <input type="number" class="form-control" id="price"></div>

                        <div class="modal-footer">
                            <button type="submit" id="btnSave" class="btn btn-primary">Save changes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="modal fade" id="upModal" style="display: none" tabindex="-1" role="dialog"
             aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="addModalLabel">Create Packet</h4>

                    </div>
                    <div class="modal-body">
                        {{csrf_field()}}
                        <form id="editmodalForm" class="form-horizontal">

                            <div class="form-group ">
                                <label>Packet Name</label>
                                <input type="text" class="form-control" id="names_packet"></div>

                            <div class="form-group">
                                <label>Word Count</label> <input type="number" class="form-control" id="word_count"></div>
                            <div class="form-group">
                                <label>Websites Count</label> <input type="number" class="form-control" id="websites_count">
                            </div>
                            <div class="form-group ">
                                <label>Rank Follow</label> <input type="number" class="form-control" id="rank_fosllow">
                            </div>
                            <div class="form-group ">
                                <label>Description</label> <input type="text" class="form-control" id="description"></div>
                            <div class="form-group ">
                                <label>Price</label> <input type="number" class="form-control" id="price"></div>


                            <div class="modal-footer">
                                <button type="submit" id="btnSave" class="btn btn-primary">Save changes</button>
                                <button type="bu  tton" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>

   </div>
   </div>
@endsection
