@section('footer')

    <footer style="margin-top: 50px;">
        <div class="container fixed-bottom">
            <div class="row">
                <div class="col-md-12 padding-top-50">
                    <!-- News Letter -->
                </div>
                <!-- Folow Us -->

                    <div class="col-mx-12 col-md-4 col-sm-12 padding-top-50">
                        <div class="news-letter">
                            <h6>{{__('footer.FOLLOW US')}}</h6>
                            <ul class="social_icons pull-left margin-left-50 margin-top-10">
                                <li><a href=""><i class="fa fa-facebook"></i></a></li>
                                <li><a href=""><i class="fa fa-twitter"></i></a></li>
                                <li><a href=""><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-mx-12 col-md-4 col-sm-12 padding-top-50">
                        <h6>{{__('footer.about us')}}</h6>
                        <div class="news-letter">
                            <li style="color: #fff;font-size: 16px;text-transform: uppercase;font-weight: normal;"></li>
                        </div>

                    </div>
                    <div class="footer-info col-mx-12 col-md-4 col-sm-12">
                        <h6>{{__('footer.CONTACT US')}}</h6>
                        <ul class="personal-info">
                            <li><i class="fa fa-map-marker"></i>Üniversite caddesi Özdiker korona D blok Kat:1 Daire:3 - Yenişehir (Çiftlikköy Mah.)</li>
                            <li><i class="fa fa-envelope"></i>seo@outlook.com</li>
                            <li><i class="fa fa-phone"></i>05349223582</li>
                        </ul>
                    </div>

            </div>
        </div>
        <!-- Rights -->
        <div class="rights">
            <div class="container">
                <p></p>
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
