@extends('layouts.master')
@section('content')
    <div class="container ">
    <div  class="">
        <h3 class="font-alegreya margin-top-50">Get In Touch With Us</h3>
        <div class="contact-form ">

            <!-- FORM -->
            <form role="form" id="contact_form" class="contact-form" method="post" action="{{route('contact.post')}}">
                @csrf

                <ul class="row">
                    <li class="col-sm-6">
                        <label>*NAME
                            <input type="text" class="form-control" name="name" id="name" placeholder="">
                        </label>
                    </li>
                    <li class="col-sm-6">
                        <label>*EMAIL
                            <input type="text" class="form-control" name="email" id="email" placeholder="">
                        </label>
                    </li>
                    <li class="col-sm-6">
                        <label>PHONE
                            <input type="text" class="form-control" name="company" id="company" placeholder="">
                        </label>
                    </li>
                    <li class="col-sm-6">
                        <label>SUBJECT
                            <input type="text" class="form-control" name="website" id="website" placeholder="">
                        </label>
                    </li>
                    <li class="col-sm-12">
                        <label>*MESSAGE
                            <textarea class="form-control" name="message" id="message" rows="5" placeholder=""></textarea>
                        </label>
                    </li>
                    <li class="col-sm-12 no-margin">
                        <button type="submit" value="degistir" class="btn" id="btn_submit" >SEND NOW</button>
                    </li>
                </ul>
            </form>
        </div>
    </div>
    </div>
    </div>
@endsection
