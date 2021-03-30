@extends('layouts.master')
@section('content')
    <div  id="keywordid" class="hidden" >{{$id}}</div>

        <form id="myForm"  style="padding-left: 100px; height: 100px">

            <select id="lastForm" class="lastdate" style="background-color: white;">
                <option class="lastdate" id="custom" selected value="custom">iki tarih arasis</option>
                <option class="lastdate" id="1hatfa" value="1hatfa">son 1 hafta</option>
                <option class="lastdate" id="1ay" value="1ay">son 1 ay</option>
                <option class="lastdate" id="3ay" value="3ay">son 3 ay</option>
                <option class="lastdate" id="6ay" value="6ay">son 6 ay</option>
                <option class="lastdate" id="12ay" value="12ay">son 12 ay</option>
            </select>
            <input class="btn " type="button" id="myButton" value="Submit">
               <div id="fromto">
               <input type="date" id="from" name="datefrom" style="height: 50px">
               <input type="date" id="to" name="dateto" style="height: 50px">
               </div>
        </form>
            <div class="col-lg-12 col-md-12">
                <div style="padding: 100px; width: 100%">
                    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                </div>
            </div>
@endsection
