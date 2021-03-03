@extends('layouts.master')
@section('content')
    <div id="contact_container" class="">
        <form id="settingsForm">
            <h4 id="contact_us_title">CONTACT US</h4>
            <label class="col-md-6">
                <p class="label-txt">FIRSTNAME </p>
                <input type="text" class="input">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <label class="col-md-6">
                <p class="label-txt">LASTNAME</p>
                <input type="text" class="input">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>   <label class="col-md-6">
                <p class="label-txt">EMAIL ADDRESS</p>
                <input type="text" class="input">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>   <label class="col-md-6">
                <p class="label-txt">PHONE NUMBER</p>
                <input type="text" class="input">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>   <label class="col-md-12">
                <p class="label-txt">YOUR MESSAGE</p>
                <textarea type="text" class="input"></textarea>
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <button id="button_contact" type="submit">submit</button>
        </form>
    </div>
@endsection