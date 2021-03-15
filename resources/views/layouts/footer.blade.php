@section('footer')
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6 padding-top-50">

                <!-- News Letter -->
                <div class="news-letter">
                    <h6>News Letter</h6>
                    <form>
                        <input type="email" placeholder="Enter your email..." >
                        <button type="submit"><i class="fa fa-envelope-o"></i></button>
                    </form>
                </div>
            </div>

            <!-- Folow Us -->
            <div class="col-md-6 padding-top-50">
                <div class="news-letter">
                    <h6>Follow us</h6>
                    <ul class="social_icons pull-left margin-left-50 margin-top-10">
                        <li><a href="#."><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#."><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#."><i class="fa fa-google-plus"></i></a></li>
                        <li><a href="#."><i class="fa fa-linkedin"></i></a></li>
                        <li><a href="#."><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#."><i class="fa fa-skype"></i></a></li>
                        <li><a href="#."><i class="fa fa-behance"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer Info -->
    <div class="footer-info">
        <div class="container">
            <div class="row">

                <!-- About -->
                <div class="col-md-4"> <img class="margin-bottom-30" src="images/logo-footer.png" alt="" >
                    <p>Aoluptas sit aspernatur aut odit aut fugit, sed elits quias consequuntur magni dolores eos qui ratione volust  luptatem sequi nesciunt. .</p>
                    <ul class="personal-info">
                        <li><i class="fa fa-map-marker"></i> 10th Floor,Washington Square Park,
                            NY, United States.</li>
                        <li><i class="fa fa-envelope"></i> Support@domain.com</li>
                        <li><i class="fa fa-phone"></i> (004)+ 124 45 78 678 </li>
                    </ul>
                </div>

                <!-- Service provided -->
                <div class="col-md-4">
                    <h6>Service provided</h6>
                    <ul class="links">
                        <li><a href="#.">SEO Services</a></li>
                        <li><a href="#.">Pay per click</a></li>
                        <li><a href="#.">Social Media</a></li>
                        <li><a href="#.">Web Analytics</a></li>
                        <li><a href="#.">Web Developement</a></li>
                        <li><a href="#.">Content Management</a></li>
                        <li><a href="#.">Blog Management</a></li>
                        <li><a href="#.">Virtual Marketing</a></li>
                        <li><a href="#.">Email Marketing</a></li>
                        <li><a href="#.">Keyword Analytics</a></li>
                    </ul>
                </div>

                <!-- Quote -->
                <div class="col-md-4">
                    <h6>Get Free Quote</h6>
                    <div class="quote">
                        <form>
                            <input class="form-control" type="text" placeholder="Name">
                            <input class="form-control" type="text" placeholder="Phone No">
                            <textarea class="form-control" placeholder="Messages"></textarea>
                            <button type="submit" class="btn btn-orange">SEND NOW</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Rights -->
    <div class="rights">
        <div class="container">
            <p>Copyright © 2016 Infinity SEO Solution. All Rights Reserved.</p>
        </div>
    </div>
</footer>
</div>

<!-- End Page Wrapper -->

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

<!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
<script type="text/javascript" src="{{asset('rs-plugin')}}/js/jquery.themepunch.tools.min.js"></script>
<script type="text/javascript" src="{{asset('rs-plugin')}}/js/jquery.themepunch.revolution.min.js"></script>
<script src="{{asset('js')}}/main.js"></script>
</body>
</html>
@endsection