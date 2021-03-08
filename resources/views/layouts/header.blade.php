@section('header')
    <div style="z-index:4!important;padding-top: 100px;" id="mySidebar" class="sidebar">

        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" id="closebtn"> X </a>
<<<<<<< HEAD

        <a class="SideBarName" id="SideBarName"> abood </a>

        <div class="btn-group btn-group-justified2 push col-md-12" role="group">

            <a href="{{route("profile")}}" class="btn btn-primary col-md-6" style="font-size: 17px ;color: white;" type="button"><i
                        class="fa fa-user push-5-r "></i>Hesabım</a>
            <a href="{{route("settings")}}" class="btn btn-primary col-md-6" style="font-size: 17px; color: white;" type="button"><i
                        class="fa fa-gear push-5-r "></i>Ayarlar</a>
        </div>
        <table class="table table-bordered table-striped table-condensed">
            <tbody>
            <tr>
                <td style="width:50%" class="font-w600">Paket:</td>
                <td>Pro</td>
            </tr>
            <tr>
                <td class="font-w600">Başlangıç:</td>
                <td>15.02.2021</td>
            </tr>
            <tr>
                <td class="font-w600">Bitiş:</td>
                <td>15.03.2021</td>
            </tr>
            <tr>
                <td class="font-w600">Kalan:</td>
                <td>12 Gün</td>
            </tr>
            </tbody>
        </table>
    </div>
    @php
        $routeName = Route::getCurrentRoute()->getName();
    @endphp
    <div id="loader">
    <div class="loader">
        <div class="position-center-center">
            <div id="preloader6"> <span></span> <span></span> <span></span> <span></span> </div>
        </div>
    </div>
</div>
=======
>>>>>>> 7a2e82b9d360ff2c9e0d6a02ffc09ad6d5e1ec74

        <a class="SideBarName" id="SideBarName"> abood </a>

        <div class="btn-group btn-group-justified2 push col-md-12" role="group">

            <a href="/profile" class="btn btn-primary col-md-6" style="font-size: 17px ;color: white;" type="button"><i
                    class="fa fa-user push-5-r "></i>Hesabım</a>
            <a href="/settings" class="btn btn-primary col-md-6" style="font-size: 17px; color: white;" type="button"><i
                    class="fa fa-gear push-5-r "></i>Ayarlar</a>
        </div>
        <table class="table table-bordered table-striped table-condensed">
            <tbody>
            <tr>
                <td style="width:50%" class="font-w600">Paket:</td>
                <td>Pro</td>
            </tr>
            <tr>
                <td class="font-w600">Başlangıç:</td>
                <td>15.02.2021</td>
            </tr>
            <tr>
                <td class="font-w600">Bitiş:</td>
                <td>15.03.2021</td>
            </tr>
            <tr>
                <td class="font-w600">Kalan:</td>
                <td>12 Gün</td>
            </tr>
            </tbody>
        </table>
    </div>
    <div id="loader">
        <div class="loader">
            <div class="position-center-center">
                <div id="preloader6"><span></span> <span></span> <span></span> <span></span></div>
            </div>
        </div>
    </div>
    <!-- Page Wrapper -->
    <div id="wrap">

<<<<<<< HEAD
    <!-- Header -->
    <header class="header coporate-header">
        <div class="sticky">
            <div class="container">
                <div class="logo"> <a href="{{route("home")}}"><img src="images/logo.png" alt=""></a> </div>

                <!-- Nav -->
                <nav>
                    <ul id="ownmenu" class="ownmenu">
                        <li class="active"><a href="{{route("home")}}">{{__('home.Home')}}</a></li>
                        @if($routeName === 'home' || $routeName === 'contact'|| $routeName === 'login' )

                        <li><a href="{{route("login")}}"> Login/Logout</a></li>
                        @endif
                        <li><a href="index.html">Pages</a>
                            <ul class="dropdown">
                            </ul>
                        </li>

                        <li><a href="{{route("contact")}}"> CONTACT</a></li>
                        @if($routeName === 'panel' || $routeName === 'settings'  || $routeName === 'findorder'|| $routeName === 'profile'|| $routeName === 'findorder')
                            <li><a href="{{route("logout")}}"> LOGOUT</a></li>
                    @endif
                        @if($routeName === 'panel' || $routeName === 'settings'  || $routeName === 'findorder'|| $routeName === 'profile')

                        <li><a id="openbtn" data-toggle="toggle" class="openbtn" onclick="openNav()"> ☰</a></li>
                        @endif
                        <!--======= SEARCH ICON =========-->
                            <ul class="dropdown">
                                <li>
                                    <form>
                                        <input type="search" class="form-control" placeholder="Enter Your Keywords..." required>
                                        <button type="submit"> SEARCH </button>
                                    </form>
                                </li>
=======
        <!-- Top bar -->
        <div class="container" id="notch">
            <div class="row">
                <div class="col-md-2 noo-res"></div>
                <div class="col-md-10">
                    <div class="top-bar">
                        <div class="col-md-3">
                            <ul class="social_icons">
                                <li><a href="#."><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#."><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#."><i class="fa fa-google"></i></a></li>
                            </ul>
                        </div>

                        <!-- Social Icon -->
                        <div class="col-md-9">
                            <ul class="some-info font-montserrat">
                                <li><i class="fa fa-phone"></i> +1 548-554-451</li>
                                <li><i class="fa fa-envelope"></i> Example@domain.com</li>
                                <li><i class="fa fa-weixin"></i> LiveChat</li>
                                <li><i class="fa fa-question-circle"></i> Support</li>
>>>>>>> 7a2e82b9d360ff2c9e0d6a02ffc09ad6d5e1ec74
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Header -->
        <header style="z-index:3!important;" class="header coporate-header">
            <div class="sticky">
                <div class="container">
                    <div class="logo"><a href="/"><img src="images/logo.png" alt=""></a></div>
                    <!-- Nav -->
                    <nav>
                        <ul id="ownmenu" class="ownmenu">
                            <li class="active"><a href="/">HOME</a></li>
                            <li><a id="panelbtn" href="/panel"> PANEL </a></li>
                            <li><a href="/login"> SIGN IN </a></li>
                            <li><a href="/contact"> CONTACT</a></li>
                            <li><a id="findorder" href="/findorder"> FIND-ORDER</a></li>
                            <li id="openbtn" data-toggle="toggle" class="openbtn" onclick="openNav()">〱</li>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
    </div>
@endsection
