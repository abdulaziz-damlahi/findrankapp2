@extends('layouts.master')
@section('content')

    <div id="contact_container">
        <form id="contactForm" method="post" action="{{route('contact.post')}}">
            @if($errors->any())
                <div class="alert-danger">
                    {{$errors->first()}}
                </div>
            @endif
            @if (!empty($success))
                <h1>{{$success}}</h1>
            @endif
            @csrf
                <div class="col-md-12">
            <h4 id="contact_us_title">CONTACT US</h4>
                </div>
            <div class="col-md-12">
                <label class="col-md-6">
                    <p class="label-txt">FIRSTNAME </p>
                    <input type="text" name="firstname" class="input">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>
                <label class="col-md-6">
                    <p class="label-txt">LASTNAME</p>
                    <input type="text" name="lastname" class="input">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>
            </div>
            <div class="col-md-12">
                <label class="col-md-6">
                    <p class="label-txt">EMAIL ADDRESS</p>
                    <input type="text" name="mail" class="input">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>
                <label class="col-md-6">
                    <p class="label-txt">PHONE NUMBER</p>
                    <input type="text" name="phone" class="input">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>
            </div>
            <label class="col-md-12">
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
