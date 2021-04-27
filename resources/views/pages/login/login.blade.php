@extends('layouts.master')
@section('content')
    @if (session('permissionsError'))
        <div id="permissionerror" class="alert alert-danger" role="alert">
            {{ session('permissionsError') }}
        </div>
    @endif
    <div id="login_container" class="container my-5 py-5">

    <form class="user" id="loginForm" method="post" action="{{route('login.post')}}">
        @csrf
        @if($errors->any())
            <div class="alert-danger">
                {{$errors->first()}}
            </div>

        @endif
        @if(session('success'))
            <div class="alert-success">
                <h5>{{session('success')}}</h5>
            </div>
        @endif
        <label>
            <p class="label-txt">{{__('pages.enter your email')}}</p>
            <input name="email" type="text" class="input">
            <div class="line-box">
                <div class="line"></div>
            </div>
        </label>
        <label>
            <p class="label-txt">{{__('pages.ENTER YOUR PASSWORD')}}</p>
            <input name="password" type="password" class="input">
            <div class="line-box">
                <div class="line"></div>
            </div>
        </label>
        <button id="button" type="submit">{{__('pages.save')}}</button>
        <div >
        <a id="register"  href="#">{{__('pages.Register Here')}}</a></div>

    </form>
    </div>
    <div id="register_container" class="container my-5 py-5" >
        <form id="loginForm" method="post" action="{{route('register.post')}}">
            @csrf
            <label>
                <p class="label-txt">{{__('pages.name')}}</p>
                <input name="first_name" type="text" class="input">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label> <label>
                <p class="label-txt">{{__('pages.Last Name')}}</p>
                <input name="last_name" type="text" class="input">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>     <label>
                <p class="label-txt">{{__('pages.e-mail')}}</p>
                <input name="email" type="text" class="input">
                <div class="line-box">
                    <div class="line"></div>
                </div>
                <label>
                    <p class="label-txt">{{__('pages.PHONE NUMBER')}}</p>
                    <input name="phone" type="text" class="input">
                    <div class="line-box">
                        <div class="line"></div>
                    </div>
                </label>
            </label>     <label>
                <p class="label-txt">{{__('pages.PASSWORD')}}</p>
                <input name="password" type="password" class="input">
                <div class="line-box">
                    <div class="line"></div>
                </div>
            </label>
            <button id="button" type="submit">{{__('pages.save')}}</button>
            <div >
                <a id="LoginButton"  href="#">{{__('pages.Login Here')}}</a></div>
        </form>
    </div>
@endsection
