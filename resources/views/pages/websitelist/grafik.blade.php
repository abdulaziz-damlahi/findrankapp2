@extends('layouts.master')
@section('content')
    <div class="container hidden">{{$rank1num}}</div>
    <div class="container hidden">{{$rank2num}}</div>
    <div class="container hidden">{{$rank3num}}</div>
    <div class="container hidden">{{$rank4num}}</div>
    <div class="container hidden">{{$rank5num}}</div>
    <div class="container hidden">{{$rank6num}}</div>
    <div class="container hidden">{{$rank7num}}</div>

    <div class="card-header ">
        <div class="col-lg-12 col-md-12">
            <div class="card whitebackground">
                <div class="card-header ">
                    <div style="padding: 200px;">
                        <div id="chartContainer" style="height: 370px; width: 100%;"></div>
                        <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
