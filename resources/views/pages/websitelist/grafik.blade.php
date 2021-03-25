@extends('layouts.master')
@section('content')

    <div class="container" id="ranks">
        <div class="" id="keywordid">{{$id}}</div>
      </div>
    <form  id="myForm">
        <input type="date" id="from" name="datefrom">
        <input type="date" id="to" name="dateto">
        <input type="button" id="myButton" value="Submit">

    <div class="col-lg-12 col-md-12">
        <div style="padding: 100px; width: 100%">
            <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
        </div>

    </div>


@endsection
