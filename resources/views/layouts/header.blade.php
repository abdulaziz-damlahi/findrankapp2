@section('header')

    <div id="loader">
    <div class="loader">
        <div class="position-center-center">
            <div id="preloader6"> <span></span> <span></span> <span></span> <span></span> </div>
        </div>
    </div>
</div>

<!-- Page Wrapper -->
<div id="wrap">

    <!-- Top bar -->
    <div class="container">
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
    <header class="header coporate-header">
        <div class="sticky">
            <div class="container">
                <div class="logo"> <a href="index.html"><img src="images/logo.png" alt=""></a> </div>

                <!-- Nav -->
                <nav>
                    <ul id="ownmenu" class="ownmenu">
                        <li class="active"><a href="index.html">{{__('home.Home')}}</a></li>
                        <li><a href="{{route('login')}}"> Login/Logout</a></li>
                        <li><a href="index.html">Pages</a>
                            <ul class="dropdown">
                                <li><a href="index.html">Index Defult</a></li>
                                <li><a href="index-1.html">Index 2</a></li>
                                <li><a href="about.html">About</a></li>
                                <li><a href="services.html">Services</a></li>
                                <li><a href="case-studies.html">Case Studies</a></li>
                                <li><a href="case-studies-single.html">Case Studies Single</a></li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="blog-single.html">Blog Single</a></li>
                                <li><a href="contact.html">Contact</a></li>
                                <li><a href="404-page.html">404 Ppage</a></li>
                            </ul>
                        </li>
                        <li><a href={{route('contact')}}> CONTACT</a></li>

                        <!--======= SEARCH ICON =========-->
                            <ul class="dropdown">
                                <li>
                                    <form>
                                        <input type="search" class="form-control" placeholder="Enter Your Keywords..." required>
                                        <button type="submit"> SEARCH </button>
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