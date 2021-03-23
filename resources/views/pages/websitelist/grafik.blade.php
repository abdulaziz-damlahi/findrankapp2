@extends('layouts.master')
@section('content')
    <div class="container">{{$rank1num}}</div>
    <div class="container">{{$rank2num}}</div>
    <div class="container">{{$rank3num}}</div>
    <div class="container">{{$rank4num}}</div>
    <div class="container">{{$rank5num}}</div>
    <div class="container">{{$rank6num}}</div>
    <div class="container">{{$rank7num}}</div>

<div class="contanier" style="padding-left: 200px;padding-right: 200px">
    <div id="chartContainer" style="height: 370px; width: 100%;"></div>
    <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</div>
@endsection
