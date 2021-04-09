
@section('header')
    <div style="z-index:4!important;padding-top: 100px;" id="mySidebar" class="sidebar">

        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" id="closebtn"> X </a>

        <a class="SideBarName" id="SideBarName"></a>

        <div class="btn-group btn-group-justified2 push col-md-12" role="group">

            <a href="{{route("profile")}}" class="btn btn-primary col-md-6" style="font-size: 17px ;color: white;"
               type="button"><i
                    class="fa fa-user push-5-r "></i>{{__('header.my account')}}</a>
            <a href="{{route("settings")}}" class="btn btn-primary col-md-6" style="font-size: 17px; color: white;"
               type="button"><i
                    class="fa fa-gear push-5-r "></i>{{__('header.settings')}}</a>
        </div>
        <table class="table table-bordered table-striped table-condensed" style=";font-size: 15px">
            <tbody>
            <tr>

                <td style="width:50%" class="font-w600">{{__('header.packet')}}:</td>
                <td id="packet_names1"></td>
            </tr>
            <tr>
                <td class="font-w600">{{__('header.Start')}}:</td>
                <td id="createdAt1" ></td>
            </tr>
            <tr>
                <td class="font-w600">{{__('header.ends')}}:</td>
                <td id="endofpacket1"></td>
            </tr>
            <tr>
                <td class="font-w600">{{__('header.remaining')}}:</td>
                <td id="daysleft1"></td>
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
                <div id="preloader6"><span></span> <span></span> <span></span> <span></span></div>
            </div>
        </div>
    </div>
    <!-- Page Wrapper -->
    <div id="wrap">
        <!-- Top bar -->
        <div class="container" >
            <div class="row" id="notch">
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
                                <li><i class="fa fa-phone"></i>05349223582</li>
                                <li><i class="fa fa-envelope"></i> seo@outlook.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Header -->
        <header class="header coporate-header">
            <div class="sticky">
                <div class="container" id="hedercont">
                    <div class="logo"><a href="{{route("home")}}"><img src="{{asset('images')}}/logo.png" alt=""></a></div>
                    <!-- Nav -->
                    <nav>
                        <ul id="ownmenu" class="ownmenu">
                            <li class="active"><a href="{{route("home")}}">{{__('header.Home')}}</a></li>
                            @if($routeName === 'home' || $routeName === 'contact'|| $routeName === 'login' )
                                <li><a href="{{route("login")}}">{{__('header.Login/Logout')}}</a></li>
                            @endif
                            <li><a href="{{route("findorder")}}">{{__('header.FIND-ORDER')}}</a>
                            </li>
                            <li><a href="{{route("panel")}}">{{__('header.panel')}}</a>
                            </li>
                            <li><a href="{{route("contact")}}"> {{__('header.CONTACT')}}</a></li>
                            @if($routeName === 'panel' || $routeName === 'settings'  || $routeName === 'findorder'|| $routeName === 'profile'|| $routeName === 'findorder')
                                <li><a href="{{route("logout")}}">{{__('header.Logout')}}</a></li>
                            @endif
                            @if($routeName === 'panel' || $routeName === 'settings'  || $routeName === 'findorder'|| $routeName === 'profile')

                                <li id="openbtn" data-toggle="toggle" class="openbtn" onclick="openNav()">〱</li>
                        @endif
                        <!--======= SEARCH ICON =========-->
                            <ul class="dropdown">
                                <li>
                                    <form>
                                        <input type="search" class="form-control" placeholder="Enter Your Keywords..."
                                               required>
                                    </form>
                                </li>
                            </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

        </header>
@endsection
