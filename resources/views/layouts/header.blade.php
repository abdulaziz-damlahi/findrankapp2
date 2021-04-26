@section('header')
    @php
        $routeName2 = Route::getCurrentRoute()->getName();
    @endphp

    <div style="z-index:4!important;padding-top: 100px;" id="mySidebar" class="sidebar">
@if($routeName2=="dashboard")
            <div id="userPicture">--}}
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" id="closebtn"> X </a>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="white" width="60" height="60" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm7.753 18.305c-.261-.586-.789-.991-1.871-1.241-2.293-.529-4.428-.993-3.393-2.945 3.145-5.942.833-9.119-2.489-9.119-3.388 0-5.644 3.299-2.489 9.119 1.066 1.964-1.148 2.427-3.393 2.945-1.084.25-1.608.658-1.867 1.246-1.405-1.723-2.251-3.919-2.251-6.31 0-5.514 4.486-10 10-10s10 4.486 10 10c0 2.389-.845 4.583-2.247 6.305z"/></svg>
                                </div>
                                <div class="mt-20 ml-5" id="userName">
                                    <h3 class="mx-auto;" id="adminName">{{Auth::user()->first_name}}</h3>
                                </div>
                                <div class="mt-20" id="visitorsMenu">
                                    <h5 id="visitors"> Bugünkü Sorgu Sayısı <br> Sayısı</h5>
                                    <h5 id="visitorsCount"> {{$i}} </h5>
                                </div>
    @endif
        @if($routeName2!="dashboard")
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" id="closebtn"> X </a>

        <a class="SideBarName" id="SideBarName"></a>

        <div class="btn-group btn-group-justified2 push col-md-12" role="group">
            <a href="{{route("profile")}}" class="btn  col-md-6" style="font-size: 17px ;color: white;margin-bottom: 30px"
               type="button"><i class="fa fa-user push-5-r "></i>{{__('header.my account')}}</a>
            <a href="{{route("settings")}}" class="btn  col-md-6" style="font-size: 17px; color: white;"
               type="button"><i class="fa fa-gear push-5-r "></i>{{__('header.settings')}}</a>
        </div>
        <table class="table table-bordered table-striped table-condensed" style=";font-size: 15px">
            <tbody>
            <tr>
                <div id="daysleft" hidden></div>
                <td style="width:50%" class="font-w600">{{__('header.packet')}}:</td>
                <td id="packet_names1"></td>
            </tr>
            <tr>
                <td class="font-w600">{{__('header.Start')}}:</td>
                <td id="createdAt1"></td>
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

    <a href="{{route("packets")}}" class="btn btn-sm btn-success" style="display: none;margin-left:15px;margin-right:15px" id="buypacketbtn">
            <i class="fa fa-dropbox" aria-hidden="true"></i> Paket Satın Al</a>
        <br>
        <div class="col-md-12">
            <div class="card order-card" style="background-color: #ff6c3a">
                <div class="card-block">
                    <div class="block-content block-content-full">
                        <div><span class="tableStyle">{{__('pages.Remaining words')}}</span> <span
                                id="" class="tableStyle pull-right"><b id="keywordusedSidebar"></b>/<b id="maxcountwordSidebar"></b></span>
                        </div>
                        <div class="progress-bar-border" style="margin-bottom:3px">
                            <div class="progress">
                                <div class="progress-bar bg-success" id="wordprogressSidebar" role="progressbar" aria-valuenow="25"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="tableStyle">
                            <br>
                        </div>
                        <hr>
                        <div><span class="tableStyle">{{__('pages.Remaining sites')}}</span> <span
                                class="tableStyle pull-right"><b id="websiteusedSidebar"></b> /<b id="maxwebsiteSidebar"></b> </span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-success" id="websiteprogressSidebar" role="progressbar" aria-valuenow="25"
                                 aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="tableStyle">
                        <br>
                    </div>
                </div>
            </div>
        </div>
    @endif
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
        <div class="container">
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
                            @if($routeName === 'panel' ||$routeName === 'dashboard' || $routeName === 'settings'  || $routeName === 'findorder'|| $routeName === 'profile'|| $routeName === 'websitelist')

                                <li id="openbtn" data-toggle="toggle" class="openbtn" onclick="openNav()">〱</li>
                        @endif
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
