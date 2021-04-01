@extends('layouts.master')
@section('content')
    <div  id="keywordid" class="hidden" >{{$id}}</div>
    <div  id="userid"  class="hidden">{{ auth()->user()->id }}</div>
        <form id="myForm"  class="myform">

            <select id="lastForm" class="lastdate" >
                <option class="lastdate" id="custom" selected value="custom">iki tarih arasis</option>
                <option class="lastdate" id="1hafta" value="1hafta">son 1 hafta</option>
                <option class="lastdate" id="1ay" value="1ay">son 1 ay</option>
                <option class="lastdate" id="3ay" value="3ay">son 3 ay</option>
                <option class="lastdate" id="6ay" value="6ay">son 6 ay</option>
                <option class="lastdate" id="12ay" value="12ay">son 12 ay</option>
            </select>
            <input class="btn " type="button" id="myButton" value="Submit">
               <div id="fromto">
               <input type="date" id="from" name="datefrom" class="fromto">
               <input type="date" id="to" name="dateto" class="fromto">
               </div>
        </form>
            <div class="col-lg-12 col-md-12">
                <div class="grafik2">
                    <div id="chartContainer" class="grafik"></div>
                    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                </div>
            </div>
@endsection
