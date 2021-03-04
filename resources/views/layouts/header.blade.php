@section('header')
    <div style="z-index:4!important;padding-top: 100px;" id="mySidebar" class="sidebar">

        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" id="closebtn"> X </a>

        <a class="SideBarName" id="SideBarName"> abood </a>

        <div class="btn-group btn-group-justified2 push col-md-12" style="" role="group">

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
                            <li><a href="/panel"> PANEL </a></li>
                            <li><a href="/contact"> CONTACT</a></li>
                            <li><a id="findorder" href="/findorder"> FIND-ORDER</a></li>
                            <li><a id="openbtn" data-toggle="toggle" class="openbtn" onclick="openNav()"> ☰</a></li>

                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

        </header>


        <style>
            .sidebar {
                -moz-box-shadow: 3px 3px 5px 6px #404040;
                -webkit-box-shadow: 3px 3px 5px 6px #404040;
                box-shadow: 3px 3px 5px 6px #404040;
                right: 0;
                height: 100%;
                width: 0;
                position: fixed;
                z-index: 0 !important;
                top: 0;
                background-color: #ffffff;
                overflow-x: hidden;
                transition: 0.3s;
                padding-top: 60px;

            }

            .sidebar a {
                padding: 8px 8px 8px 32px;
                text-decoration: none;
                font-size: 25px;
                color: #818181;
                display: block;
                transition: 0.3s;
                z-index: 4 !important;

            }

            .sidebar a:hover {
                color: #f1f1f1;
            }

            .sidebar .closebtn {
                position: absolute;
                top: 0;

                z-index: auto;
            }

            .SideBarName {
                position: absolute;
                top: 0;
                padding-right: 20px;
                right: 0px;
                z-index: auto;
            }

            .openbtn {
                cursor: pointer;
                background-color: #111;
                color: white;
                padding: 10px 15px;
                border: none;
                z-index: 4 !important;
            }

            .openbtn:hover {
                background-color: #444;
                z-index: 4 !important;
            }

            #main {
                transition: margin-left .5s;
                padding: 16px;
            }

            /* On smaller screens, where height is less than 450px, change the style of the sidenav (less padding and a smaller font size) */
            @media screen and (max-height: 450px) {
                .sidebar {
                    padding-top: 15px;
                }

                .sidebar a {
                    font-size: 18px;
                }
            }
        </style>

        <script>
            click = 0;

            function openNav() {
                if (click == 0) {
                    document.getElementById("mySidebar").style.width = "320px";
                    document.getElementById("main").style.marginRight = "320px";
                    click = 1;
                } else {
                    document.getElementById("mySidebar").style.width = "0px";
                    document.getElementById("main").style.marginRight = "0px";
                    click = 0;
                }
            }

            function closeNav() {
                document.getElementById("mySidebar").style.width = "0";
                document.getElementById("main").style.marginRight = "0";
            }

            $('html').click(function () {
                document.getElementById("mySidebar").style.width = "0";
                document.getElementById("main").style.marginRight = "0";
            });


            var x = location.href;
            console.log(x);
            if (x == 'http://127.0.0.1:8000/') {
                document.getElementById("openbtn").remove();
                document.getElementById("findorder").hide();
            }
        </script>
@endsection
