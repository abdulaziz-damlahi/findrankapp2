@section('header')
    @php
        $routeName2 = Route::getCurrentRoute()->getName();
    @endphp

    <div style="z-index:4!important;padding-top: 100px;" id="mySidebar" class="sidebar">
        @if($routeName2=="dashboard")
            <div id="userPicture">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" id="closebtn"> X </a>
            </div>
            <div class="mt-20 ml-5" id="userName">
                <a class="SideBarName" id="SideBarName">{{Auth::user()->first_name}}</a>
            </div>
            <div class="btn-group btn-group-justified2 push col-md-12" role="group">
                <a class="btn  col-md-6" id="homeBTN" style="font-size: 17px ;color: white;margin-bottom: 30px"
                   type="button"><i class="fa fa-line-chart push-5-r "></i> panel</a>
                <a class="btn  col-md-6" id="packetsBTN" style="font-size: 17px; color: white;" type="button"><i
                        class="fa fa-gift push-5-r "></i> packets</a>
            </div>
            <div class="mt-20" id="visitorsMenu" style="padding-left: 20px">
                    <h5 id="visitorsCount"> Bugünkü Sorgu Sayısı Sayısı {{$i}}  </h5>
                    <h5 id="visitorsCount"> toplam satin alan paketler {{$allpackets}} </h5>
            </div>
    </div>
    @endif
    @if($routeName2!="dashboard")
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" id="closebtn"> X </a>

        <a class="SideBarName" id="SideBarName"></a>

        <div class="btn-group btn-group-justified2 push col-md-12" role="group">
            <a href="{{route("profile")}}" class="btn  col-md-6"
               style="font-size: 14px ;color: white;margin-bottom: 30px"
               type="button"><i class="fa fa-user push-5-r "></i>{{__('header.my account')}}</a>
            <a href="{{route("settings")}}" class="btn  col-md-6" style="font-size: 14px; color: white;"
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
        <a href="{{route("packets")}}" class="btn btn-sm btn-success"
           style="display: none;margin-left:15px;margin-right:15px" id="buypacketbtn">
            <i class="fa fa-dropbox" aria-hidden="true"></i> Paket Satın Al</a>
        <br>
        <div class="col-md-12">
            <div class="card order-card" style="background-color: #ff6c3a">
                <div class="card-block">
                    <div class="block-content block-content-full">
                        <div><span class="tableStyle">{{__('pages.Remaining words')}}</span> <span
                                id="" class="tableStyle pull-right"><b id="keywordusedSidebar"></b>/<b
                                    id="maxcountwordSidebar"></b></span>
                        </div>
                        <div class="progress-bar-border" style="margin-bottom:3px">
                            <div class="progress">
                                <div class="progress-bar bg-success" id="wordprogressSidebar" role="progressbar"
                                     aria-valuenow="25"
                                     aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <div class="tableStyle">
                            <br>
                        </div>
                        <hr>
                        <div><span class="tableStyle">{{__('pages.Remaining sites')}}</span> <span
                                class="tableStyle pull-right"><b id="websiteusedSidebar"></b> /<b
                                    id="maxwebsiteSidebar"></b> </span>
                        </div>
                        <div class="progress">
                            <div class="progress-bar bg-success" id="websiteprogressSidebar" role="progressbar"
                                 aria-valuenow="25"
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
            <!--Header -->
            <header class="header coporate-header">
                <div class="sticky">
                    <div class="container" id="hedercont">
                        <div class="logo"><a href="{{route("home")}}"><img src="{{asset('images')}}/logo.png"
                                                                           alt=""></a>
                        </div>
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
                                            <input type="search" class="form-control"
                                                   placeholder="Enter Your Keywords..."
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
