@extends('layouts.master')
@section('content')
    <div class="background">
        <div id="containe" class="container">
            <div id="charts" class="col-md-12" style="height: 370px">
                <div class="col-md-6 col-sm-12 col-xs-12">
                    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                    <br>
                    <br>
                </div>
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div id="piechart"></div>
                    <div class="pull-right">
                    </div>
                </div>
            </div>
            <div id="packetsreels" class="col-md-12">
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

                                <form id="modalForm" class="form-horizontal">
                                    {{csrf_field()}}
                                    <div class="form-group ">
                                        <label>Packet Name</label>
                                        <input type="text" class="form-control" name="names_packets"
                                               id="names_packets"
                                               placeholder="Paket Name" required></div>

                                    <div class="form-group">
                                        <label>Word Count</label> <input type="number" name="word_count"
                                                                         id="word_count"
                                                                         placeholder="Word Count"
                                                                         class="form-control" required></div>
                                    <div class="form-group">
                                        <label>Websites Count</label> <input type="number" name="websites_count"
                                                                             id="websites_count"
                                                                             placeholder="Websites Count"
                                                                             class="form-control" required>
                                    </div>
                                    <div class="form-group ">
                                        <label>Rank Follow</label> <input type="number" name="rank_fosllow"
                                                                          id="rank_fosllow"
                                                                          placeholder="Rank Follow"
                                                                          class="form-control" required>
                                    </div>
                                    <div class="form-group ">
                                        <label>Description</label> <input type="text" name="description"
                                                                          placeholder="Description" id="description"
                                                                          class="form-control" required></div>
                                    <div class="form-group ">
                                        <label>Price</label> <input type="number" name="price" id="price"
                                                                    placeholder="Price"
                                                                    class="form-control" required>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="btnSave" class="btn btn-primary">Save changes
                                        </button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">close
                                        </button>
                                    </div>
                                </form>
                            </div>
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
                                <h4 class="modal-title" id="upModalLabel">Edit Packet</h4>

                            </div>
                            <div class="modal-body">

                                <form id="editmodalForm" class="form-horizontal">
                                    {{csrf_field()}}

                                    <div class="form-group ">
                                        <label>Packet Name</label>
                                        <input type="text" class="form-control" name="names_packets1"
                                               id="names_packets1"
                                               value=""></div>

                                    <div class="form-group">
                                        <label>Word Count</label> <input type="number" name="word_count1"
                                                                         class="form-control"
                                                                         value="" id="word_count1">
                                    </div>
                                    <div class="form-group">
                                        <label>Websites Count</label> <input type="number" name="websites_count1"
                                                                             value=""
                                                                             class="form-control"
                                                                             id="websites_count1">
                                    </div>
                                    <div class="form-group ">
                                        <label>Rank Follow</label> <input type="number" class="form-control"
                                                                          value=""
                                                                          name="rank_fosllow1" id="rank_fosllow1">
                                    </div>
                                    <div class="form-group ">
                                        <label>Description</label> <input type="text" class="form-control" value=""
                                                                          name="description1" id="description1">
                                    </div>
                                    <div class="form-group " id="price2">
                                        <label>Price</label> <input type="number" class="form-control" name="price1"
                                                                    value=""
                                                                    id="price1"></div>


                                    <div class="modal-footer">
                                        <button type="button" id="buttonSave" class="btn btn-primary">Save changes
                                        </button>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="deleteModal" class="modal fade">
                    <div class="modal-dialog modal-confirm">
                        <div class="modal-content">
                            <div class="modal-header flex-column">
                                <h4 class="modal-title w-100">Are you sure?</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    &times;
                                </button>
                            </div>
                            <div class="modal-footer justify-content-center">
                                <button type="button" id="deleteButton" class="btn btn-danger">Delete</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="PACKETSPURCHASED" class="col-md-12" style="width:100%;background-color: white ;">
                <h3>PACKETS PURCHASED</h3>
                <div class="card">
                    <table class="table table-hover" id="firstTable">
                        <thead>
                        <tr>
                            <th class="hide">id</th>
                            <th class="hide">Id</th>
                            <th class="hide">user_id</th>
                            <th>Name</th>
                            <th>Surname</th>
                            <th>Packet Name</th>
                            <th>Count Of Word</th>
                            <th>Max Count Of Word</th>
                            <th>Count Of Websites</th>
                            <th>Max Count Of Websites</th>
                            <th>End Of Packet</th>
                            <th>Rank Follow</th>
                            <th>Max Rank Follow</th>
                            <th>Payment Id</th>
                            <th>Description</th>
                            <th>Price</th>
                        </tr>
                        </thead>
                        <tbody id="userBodyTable">
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="pagination" class="pagination"
                 style="padding: 40px 20px;clear: both;text-align: center;margin-top: -1px;border-top:1px solid #e5e5e5;">
                <ul id="pagin" class="pagination pagination-lg" style="solid-color: #E5E5E5">
                </ul>
            </div>
        </div>
        <br><br>
    </div>
@endsection
