@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="pull-right">
            <button type="button" id="add" class="btn btn-success" data-toggle="modal"
                    data-target="#addModal">Create New Packet
            </button>
        </div>
        <table class="table table-striped" id="packetTable">

            <thead>
            <tr>

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

@endsection
