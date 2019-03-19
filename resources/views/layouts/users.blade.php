<!DOCTYPE html>
<head>
    <title>Online Book Download</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ URL::asset('css/app.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ URL::asset('css/bootstrap.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ URL::asset('css/zoomslider.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ URL::asset('css/style6.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ URL::asset('css/style.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ URL::asset('css/extended_style.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ URL::asset('css/fontawesome-all.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dosis:200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">
</head>

<body>
    <!--pre-loader-->
    <div class="preloader"><span class="beacon"></span></div>
    @include('./layouts.header')

    <!-- banner-text -->
    <div class="container">
        <div class="user_admin" id = "AppUser">

            <div class="row">
                <div class="col-md-3">
                    <div class="user_admin_menu">
                        <ul>
                            <li><a href=""><i class="fa fa-upload"></i>My Books</a></li>
                            <li><a href=""><i class="fa fa-download"></i>My Downloads</a></li>
                            <li><a href=""><i class="fa fa-user"></i>My Profile</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    @yield("content")
                </div>
            </div>
            
        </div>
        
    </div>
    <footer class="footer-emp bg-dark dotts py-lg-5 py-3">
        <div class="container-fluid px-lg-5 px-3">
            <div class="row footer-top">
                <div class="col-lg-3 footer-grid-wthree-w3ls">
                    <div class="footer-title">
                        <h3>About Us</h3>
                    </div>
                    <div class="footer-text">
                        <p>We provide online resources, professional support and guidance to all our students whenever, and from wherever they have chosen to study.</p>
                        <ul class="footer-social text-left mt-lg-4 mt-3">

                            <li class="mx-2">
                                <a href="#">
                                    <span class="fab fa-facebook-f"></span>
                                </a>
                            </li>
                            <li class="mx-2">
                                <a href="#">
                                    <span class="fab fa-twitter"></span>
                                </a>
                            </li>
                            <li class="mx-2">
                                <a href="#">
                                    <span class="fab fa-google-plus-g"></span>
                                </a>
                            </li>
                            <li class="mx-2">
                                <a href="#">
                                    <span class="fab fa-linkedin-in"></span>
                                </a>
                            </li>
                            <li class="mx-2">
                                <a href="#">
                                    <span class="fas fa-rss"></span>
                                </a>
                            </li>
                            <li class="mx-2">
                                <a href="#">
                                    <span class="fab fa-vk"></span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 footer-grid-wthree-w3ls">
                    <div class="footer-title">
                        <h3>Get in touch</h3>
                    </div>
                    <div class="contact-info">
                        <h4>Location :</h4>
                        <p>Mirpur, Dhaka</p>
                        <div class="phone">
                            <h4>Contact :</h4>
                            <p>Phone : +8801200000000</p>
                            <p>Email :
                                <a href="#">info@example.com</a>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 footer-grid-wthree-w3ls">
                    <div class="footer-title">
                        <h3>Quick Links</h3>
                    </div>
                    <ul class="links">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a href="about.html">About</a>
                        </li>
                        <li>
                            <a href="404.html">Error</a>
                        </li>
                        <li>
                            <a href="pricing.html">Book Categories</a>
                        </li>
                        <li>
                            <a href="contact.html">Contact Us</a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="col-lg-3 footer-grid-wthree-w3ls">
                    <div class="footer-title">
                        <h3>Subscribe</h3>
                    </div>
                    <div class="footer-text">
                        <p>By subscribing to our mailing list you will always get latest news and updates from us.</p>
                        <form action="#" method="post">
                            <input class="form-control" type="email" name="Email" placeholder="Enter your email..." required="">
                            <button class="btn2">
                                <i class="far fa-envelope" aria-hidden="true"></i>
                            </button>
                            <div class="clearfix"> </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="copyright mt-4">
                <p class="copy-right text-center ">&copy; 2019 All Rights Reserved | Design by
                    Online Library</a>
                </p>
            </div>
        </div>
    </footer>
    <!-- //footer -->

    <!--model-forms-->
    <!--/Login-->
    <div class="modal fade" id="LoginModel" tabindex="-1" role="dialog" aria-hidden="true">

    </div>
    <!--//Login-->
    <!--/Register-->
    <div class="modal fade" id="exampleModalCenter2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="user_register_component">
                    
                </div>

            </div>
        </div>
    </div>
    <!--//Register-->
    <!--//model-form-->

    <!-- js -->
    <!--/slider-->
    <script src="{{ URL::asset('js/app.js') }}"></script>
    <script src="{{ URL::asset('js/modernizr-2.6.2.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.zoomslider.min.js') }}"></script>
    <!--//slider-->
    <!--search jQuery-->
    <script src="{{ URL::asset('js/classie-search.js') }}"></script>
    <script src="{{ URL::asset('js/demo1-search.js') }}"></script>
    <!--//search jQuery-->
    
    <!-- stats -->
    <script src="{{ URL::asset('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ URL::asset('js/jquery.countup.js') }}"></script>
    <!-- //stats -->

    <!-- //js -->
    <script src="{{ URL::asset('js/bootstrap.js') }}"></script>
    <!--/ start-smoth-scrolling -->
    <script src="{{ URL::asset('js/move-top.js') }}"></script>
    <script src="{{ URL::asset('js/easing.js') }}"></script>
    <script src="{{ URL::asset('js/main.js') }}"></script>
</body>

</html>