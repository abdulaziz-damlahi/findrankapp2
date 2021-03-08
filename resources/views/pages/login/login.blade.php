@extends('layouts.master')
@section('content')

    <div id="login_container" class="container my-5 py-5">
    <form class="user" id="loginForm" method="post" action="{{route('login.post')}}">
        @csrf
        @if($errors->any())
            <div class="alert-danger">
                {{$errors->first()}}
            </div>
        @endif
        <label>
            <p class="label-txt">ENTER YOUR EMAIL</p>
            <input name="email" type="text" class="input">
            <div class="line-box">
                <div class="line"></div>
            </div>
        </label>
        <label>
            <p class="label-txt">ENTER YOUR PASSWORD</p>
            <input name="password" type="text" class="input">
            <div class="line-box">
                <div class="line"></div>
            </div>
        </label>
        <button id="button" type="submit">submit</button>
        <div >
        <a id="register"  href="#">Register here</a></div>

    </form>
    </div>
    <div id="register_container" class="container my-5 py-5" >
        <form id="loginForm" method="post" action="{{route('register.post')}}">
            @csrf
            <label>
                <p class="label-txt">FIRSTNAME</p>
                <input name="first_name" type="text" class="input">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label> <label>
                <p class="label-txt">last_name</p>
                <input name="last_name" type="text" class="input">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>     <label>
                <p class="label-txt">EMAİL</p>
                <input name="email" type="text" class="input">
                <div class="line-box">
                    <div class="line"></div>
                </div>
                <label>
                    <p class="label-txt">PHONE</p>
                    <input name="phone" type="text" class="input">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>
            </label>     <label>
                <p class="label-txt">PASSWORD</p>
                <input name="password" type="text" class="input">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <button id="button" type="submit">submit</button>
            <div >
                <a id="LoginButton"  href="#">Login here</a></div>
        </form>
    </div>
@endsection