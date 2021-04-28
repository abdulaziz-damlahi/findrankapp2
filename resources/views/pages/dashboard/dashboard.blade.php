@extends('layouts.master')
@section('content')

    <div class="container">
        <div class="col-md-12 padding-top-50" style="background-color: blanchedalmond ">
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
        <center>
            <div id="pagination" class="pagination" style="padding: 40px 20px;clear: both;text-align: center;margin-top: -1px;border-top:1px solid #e5e5e5">
                <ul id="pagin" class="pagination pagination-lg" style="solid-color: #E5E5E5">
                </ul>
            </div>
        </center>
    </div> <br><br>
    <div class="container" style="margin-bottom: 75px">
        <div class="col-md-12 padding-top-50" style="background-color: blanchedalmond;margin-top: 50px ">
            <h3>PACKETS LIST</h3>
            <div class="card">
                <div class="pull-right">
                    <button type="button" id="add" class="btn btn-success" data-toggle="modal"
                            data-target="#addModal">Create New Packet
                    </button>
                </div>
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th>Id</th>
                        <th>Packet Name</th>
                        <th>Word Count</th>
                        <th>Websites Count</th>
                        <th>Rank Follow</th>
                        <th>Description</th>
                        <th>Price</th>
                    </tr>
                    </thead>
                    <tbody id="bodyTable">
                    </tbody>
                </table>
            </div>
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
                                <input type="text" class="form-control" name="names_packets" id="names_packets"
                                       placeholder="Paket Name" required></div>

                            <div class="form-group">
                                <label>Word Count</label> <input type="number" name="word_count" id="word_count"
                                                                 placeholder="Word Count"
                                                                 class="form-control" required></div>
                            <div class="form-group">
                                <label>Websites Count</label> <input type="number" name="websites_count"
                                                                     id="websites_count" placeholder="Websites Count"
                                                                     class="form-control" required>
                            </div>
                            <div class="form-group ">
                                <label>Rank Follow</label> <input type="number" name="rank_fosllow" id="rank_fosllow"
                                                                  placeholder="Rank Follow"
                                                                  class="form-control" required>
                            </div>
                            <div class="form-group ">
                                <label>Description</label> <input type="text" name="description"
                                                                  placeholder="Description" id="description"
                                                                  class="form-control" required></div>
                            <div class="form-group ">
                                <label>Price</label> <input type="number" name="price" id="price" placeholder="Price"
                                                            class="form-control" required>
                            </div>

                            <div class="modal-footer">
                                <button type="submit" id="btnSave" class="btn btn-primary">Save changes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                <input type="text" class="form-control" name="names_packets1" id="names_packets1"
                                       value=""></div>

                            <div class="form-group">
                                <label>Word Count</label> <input type="number" name="word_count1" class="form-control"
                                                                 value="" id="word_count1">
                            </div>
                            <div class="form-group">
                                <label>Websites Count</label> <input type="number" name="websites_count1" value=""
                                                                     class="form-control"
                                                                     id="websites_count1">
                            </div>
                            <div class="form-group ">
                                <label>Rank Follow</label> <input type="number" class="form-control" value=""
                                                                  name="rank_fosllow1" id="rank_fosllow1">
                            </div>
                            <div class="form-group ">
                                <label>Description</label> <input type="text" class="form-control" value=""
                                                                  name="description1" id="description1">
                            </div>
                            <div class="form-group " id="price2">
                                <label>Price</label> <input type="number" class="form-control" name="price1" value=""
                                                            id="price1"></div>


                            <div class="modal-footer">
                                <button type="button" id="buttonSave" class="btn btn-primary">Save changes</button>
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <button type="button" id="deleteButton" class="btn btn-danger">Delete</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
