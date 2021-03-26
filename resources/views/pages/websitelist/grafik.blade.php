@extends('layouts.master')
@section('content')
    <div  id="keywordid" class="hidden" >{{$id}}</div>

        <form id="myForm" style="padding-left: 100px">
            <input type="date" id="from" name="datefrom" style="height: 50px">
            <input type="date" id="to" name="dateto" style="height: 50px">
            <input type="button" class="btn" id="myButton" value="Submit">
        </form>
            <div class="col-lg-12 col-md-12">
                <div style="padding: 100px; width: 100%">
                    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                </div>
            </div>
@endsection
