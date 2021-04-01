@section('footer')

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12 padding-top-50">
                    <!-- News Letter -->
                </div>
                <!-- Folow Us -->
                @foreach($footer as $footers)
                <div class="col-mx-12 col-md-4 col-sm-12 padding-top-50">
                    <div class="news-letter">
                        <h6>Follow us</h6>
                        <ul class="social_icons pull-left margin-left-50 margin-top-10">
                            <li><a href="{{$footers->facebook}}"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{$footers->twitter}}"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="{{$footers->linkedin}}"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-mx-12 col-md-4 col-sm-12 padding-top-50">
                    <h6>about us</h6>
                        <div class="news-letter">
                            <li style="color: #fff;font-size: 16px;text-transform: uppercase;font-weight: normal;">{{$footers->aboutUs}}</li>
                        </div>

                </div>
                <div class="footer-info col-mx-12 col-md-4 col-sm-12">
                    <h6>contact us</h6>
                    <ul class="personal-info">
                        <li><i class="fa fa-map-marker"></i>{{$footers->location}}</li>
                        <li><i class="fa fa-envelope"></i>{{$footers->email}}</li>
                        <li><i class="fa fa-phone"></i>{{$footers->phone}}</li>
                    </ul>
                </div>
                @endforeach
            </div>
        </div>
        <!-- Rights -->
        <div class="rights">
            <div class="container">
                <p>{{$footers->copyright}}</p>
            </div>
        </div>
    </footer>
    </div>
    <!-- JavaScripts -->
    <script src="{{asset('js')}}/vendors/jquery/jquery.min.js"></script>
    <script src="{{asset('js')}}/vendors/wow.min.js"></script>
    <script src="{{asset('js')}}/vendors/bootstrap.min.js"></script>
    <script src="{{asset('js')}}/vendors/own-menu.js"></script>
    <script src="{{asset('js')}}/vendors/flexslider/jquery.flexslider-min.js"></script>
    <script src="{{asset('js')}}/vendors/jquery.countTo.js"></script>
    <script src="{{asset('js')}}/vendors/jquery.isotope.min.js"></script>
    <script src="{{asset('js')}}/vendors/jquery.bxslider.min.js"></script>
    <script src="{{asset('js')}}/vendors/owl.carousel.min.js"></script>
    <script src="{{asset('js')}}/vendors/jquery.sticky.js"></script>
    <script type="text/javascript" src="{{asset('rs-plugin')}}/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="{{asset('rs-plugin')}}/js/jquery.themepunch.revolution.min.js"></script>
    <script src="{{asset('js')}}/main.js"></script>
    </body>
    </html>
@endsection
