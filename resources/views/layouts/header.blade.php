@section('header')

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
                            <li><a href="/panel"> panel </a></li>
                            <li><a href="/profile"> profile </a></li>
                            <li><a href="/contact"> CONTACT</a></li>
                            <li><a id="openbtn" class="openbtn" onclick="openNav()"> ☰</a></li>

                            </li>
                        </ul>
                    </nav>
                </div>
            </div>

        </header>
@endsection
