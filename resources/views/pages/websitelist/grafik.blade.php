@extends('layouts.master')
@section('content')
    <div  id="keywordid" class="hidden" >{{$id}}</div>
    <div  id="userid"  class="hidden">{{ auth()->user()->id }}</div>
    <div class="col-lg-12 col-md-12">
    <form id="myForm"  class="myform">
        <select id="lastForm" class="lastdate" >
            <option class="lastdate" id="custom" selected value="custom">{{__('pages.Between Two Dates')}}</option>
            <option class="lastdate" id="1hafta" value="1hafta">{{__('pages.Last Week')}}</option>
            <option class="lastdate" id="1ay" value="1ay">{{__('pages.Last Month')}}</option>
            <option class="lastdate" id="3ay" value="3ay">{{__('pages.Last 3 Months')}}</option>
            <option class="lastdate" id="6ay" value="6ay">{{__('pages.Last 6 Months')}}</option>
            <option class="lastdate" id="12ay" value="12ay">{{__('pages.Last 12 Months')}}</option>
        </select>
        <input class="applybtn " type="button" id="myButton" value="{{__('pages.apply')}}">
        <div id="fromto"    class="fromto">
            <input type="date" id="from" name="datefrom" class="fromto">
            <input type="date" id="to" name="dateto" class="fromto">
        </div>
        </div>
    </form>
            <div class="col-lg-12 col-md-12">
                <div class="grafik2">

                    <div id="chartContainer" class="grafik"></div>
                    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                </div>
            </div>
@endsection
