@extends('layouts.master')
@section('content')

    <div class="container" id="seo">
        <section class="row bg-parallax seo-secore padding-top-100 padding-bottom-100 "
                 style="background-color: #efefef; ">

            <br class="container" style="padding-right: 500px; padding-left:500px; ">
            <!-- Tittle -->
            <div class="heading-block white-text text-center margin-bottom-50">
                <h2 style="color: black">What’s Your SEO Score ?</h2>
                <span style="color: black">See how well your page is optimised for your keyword</span></div>
            <!-- Form -->
            <form>

                <ul class="row col-lg-12">
                    <li class="col-md-6">
                        <input type="text" class="form-control" placeholder="http://">
                    </li>
                    <li class="col-md-6">
                        <input type="text" class="form-control" placeholder="Keyword">
                    </li>
                </ul>

                <div class="row col-lg-12 padding-top-50">
                    <div class="btn-group col-md-3 ">
                        <div class="btn-group">
                            <select class="select">
                                <option class="select">
                                    Ülke
                                </option>
                                <option class="select">
                                    turkey
                                </option>
                                <option class="select">
                                    syria
                                </option>
                                <option class="select">
                                    uk
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="btn-group col-md-3 ">
                        <div class="btn-group">
                            <select class="select">
                                <option class="select">
                                    dil
                                </option>
                                <option class="select">
                                    turkish
                                </option>
                                <option class="select">
                                    english
                                </option>
                                <option class="select">
                                    arabic
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="btn-group col-md-3 ">
                        <div class="btn-group">
                            <select class="select">
                                <option class="select">
                                    Şehir
                                </option>
                                <option class="select">
                                    mersin
                                </option>
                                <option class="select">
                                    istanbul
                                </option>
                                <option class="select">
                                    karabuk
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="btn-group col-md-3 ">
                        <div class="btn-group">
                            <select class="select">
                                <option class="select">
                                    Cihaz
                                </option>
                                <option class="select">
                                    mobile
                                </option>
                                <option class="select">
                                    masaustu
                                </option>
                            </select>
                        </div>
                    </div>
                </div>


            </form>
            <div class="row col-md-3 padding-top-50" style="margin: auto">
                <li class="">
                    <button type="submit" class="btn btn-orange">Check Now !</button>
                </li>
            </div>
        </section>
    </div>
    <style>
        .scrollable-menu {
            height: auto;
            max-height: 200px;
            overflow-x: hidden;
        }

        .select {
            font-size: 15px;
            font-weight: bold !important;
            color: #fff !important;
            background: #222935 !important;
            font-family: inherit !important;
            height: 50px;
            width: 195px;
            text-transform: uppercase;
        }
    </style>

@endsection
