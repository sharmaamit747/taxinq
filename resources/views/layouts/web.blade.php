
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="author" content="ScriptsBundle">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Taxinq</title>
        <meta name="base_url" content="{{ url('') }}">
        <link rel="icon" href="{{ url((new \App\Library\Contents)->content()->favicon)}}" type="image/x-icon" />
        <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="{{ asset("assetsweb/css/bootstrap.css") }}">
        <link rel="stylesheet" href="{{ asset("assetsweb/css/style.css") }}">
        <link rel="stylesheet" href="{{ asset("assetsweb/css/custom.css") }}">
        <link rel="stylesheet" href="{{ asset("assets/css/select2.min.css") }}">
        <link rel="stylesheet" href="{{ asset("assetsweb/css/font-awesome.css") }}">
        <link rel="stylesheet" href="{{ asset("assetsweb/css/et-line-fonts.css") }}">
        <link href="{{ asset("assets/css/select2-bootstrap-5-theme.min.css") }}" rel="stylesheet" />
        <link href="{{ asset("assets/plugins/datatable/css/dataTables.bootstrap4.min.css") }}" rel="stylesheet" type="text/css">
	<link href="{{ asset("assets/plugins/datatable/css/buttons.bootstrap4.min.css") }}" rel="stylesheet" type="text/css">
        <link href="{{ asset("assets/plugins/notifications/css/lobibox.min.css") }}" rel="stylesheet" />
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic|Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css">
        <link rel="stylesheet" type="text/css" href="{{ asset("assetsweb/css/owl.carousel.css") }}">
        <link rel="stylesheet" type="text/css" href="{{ asset("assetsweb/css/owl.style.css") }}">
        <link type="text/css" rel="stylesheet" href="{{ asset("assetsweb/css/shCoreDefault.css") }}" />
        <link type="text/css" rel="stylesheet" href="{{ asset("assetsweb/css/animate.min.css") }}" />
        <link type="text/css" rel="stylesheet" href="{{ asset("assetsweb/css/bootstrap-dropdownhover.min.css") }}" />
        <script src="{{ asset("assetsweb/js/modernizr.js") }}"></script>
    </head>

    <body>
        <!-- =-=-=-=-=-=-= HEADER =-=-=-=-=-=-= -->
        <div class="top-bar">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                        <ul class="top-nav nav-left">
                            <li class="text-white d-sm-none"><span class="icon fa fa-phone"></span> 7827945514</li>
                            <li class="text-white"><span class="icon fa fa-envelope-o"></span> info@taxinq.com</li>
                        </ul>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-6 col-xs-6">
                        <ul class="top-nav nav-right">
                            @if(Auth::user() == null)
                            <li><a href="{{ url('/login') }}"><i class="fa fa-lock" aria-hidden="true"></i>Login</a>
                            </li>
                            <li><a href="{{ url('/register') }}">
                                    <i class="fa fa-user-plus" aria-hidden="true"></i>Signup
                                </a>
                            </li>
                            @else
                            <li class="dropdown"> 
                                <a class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown" data-animations="fadeInUp">
                                    @if(Auth::user()->pic != null && Auth::user()->pic != '')
                                    <img class="img-circle resize profile-picture" src="{{ url(Auth::user()->pic) }}" alt="">
                                    @else
                                    <img class="img-circle resize profile-picture" alt="" src="{{ asset("assetsweb/images/demo1.png")}}">
                                    @endif
                                    <span class="hidden-xs small-padding">
                                        <span>{{ Auth::user()->name }}</span>
                                        <i class="fa fa-caret-down"></i>
                                    </span>
                                </a>
                                <ul class="dropdown-menu ">
                                    @if(Auth::user()->userType == 1)
                                    <li><a href="{{ url('/admin/home') }}"><i class=" icon-bargraph"></i> Dashboard</a></li>
                                    @elseif(Auth::user()->userType == 2)
                                    <li class="@if(url('consultant/home') == url()->current()) active @endif"><a href="{{ url('/consultant/home') }}"><i class="fa fa-home"></i> Home</a></li>
                                    <li class="@if(url('consultant/profile') == url()->current()) active @endif"><a href="{{ url('/consultant/profile') }}"><i class="fa fa-user"></i> My Profile</a></li>
                                    <li class="@if(url('consultant/appointments') == url()->current()) active @endif"><a href="{{ url('/consultant/appointments') }}"><i class=" icon-bargraph"></i> Appointments</a></li>
                                    @else
                                    <li><a href="{{ url('/client/home') }}"><i class="fa fa-home"></i> Home</a></li>
                                    <li><a href="{{ url('/client/profile') }}"><i class="fa fa-user"></i> My Profile</a></li>
                                    <li><a href="{{ url('/client/appointments') }}"><i class=" icon-bargraph"></i> Appointments</a></li>
                                    @endif
                                    <li>
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon-lock"></i> Logout</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-= HEADER Navigation =-=-=-=-=-=-= -->
        <div class="navbar navbar-default">
            <div class="container">
                <!-- header -->
                <div class="navbar-header">
                    <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- logo -->
                    <a href="{{ url('/') }}" class="navbar-brand">
                        <img class="img-responsive" alt="" src="{{ url((new \App\Library\Contents)->content()->logo)}}">
                    </a>
                    <!-- header end -->
                </div>
                <!-- navigation menu -->
                <div class="navbar-collapse collapse">
                    <!-- right bar -->
                    <ul class="nav navbar-nav navbar-right">
                        <li class="@if(url()->current() == route('/') ) active @endif"><a href="{{ url('/') }}">Home</a></li>
                        <li class="dropdown @if(url()->current() == route('/services') ) active @endif">
                            <a href="{{ url('/services') }}" class="dropdown-toggle" data-hover="dropdown"  data-animations="fadeInUp">
                                Our Services <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="@if(url()->current() == route('/services/gst') ) active @endif">
                                    <a href="{{ url('/services/gst') }}">Goods & Services Tax </a>
                                </li>
                                <li class="@if(url()->current() == route('/services/customs') ) active @endif">
                                    <a href="{{ url('/services/customs') }}">Customs </a>
                                </li>
                                <li class="@if(url()->current() == route('/services/income-tax') ) active @endif">
                                    <a href="{{ url('/services/income-tax') }}">Income Tax </a>
                                </li>
                                <li class="@if(url()->current() == route('/services/corporation-tax') ) active @endif">
                                    <a href="{{ url('/services/corporation-tax') }}">Corporation Tax </a>
                                </li>
                                <li class="@if(url()->current() == route('/services/pf-esi') ) active @endif">
                                    <a href="{{ url('/services/pf-esi') }}">PF & ESI </a>
                                </li>
                                <li class="@if(url()->current() == route('/services/labor-law') ) active @endif">
                                    <a href="{{ url('/services/labor-law') }}">Labor Law's </a>
                                </li>
                            </ul>
                        </li>
                        <li class="@if(url()->current() == route('/news') ) active @endif"><a href="{{ url('news') }}">News</a></li>
                        <li class="@if(url()->current() == route('/blogs') ) active @endif"><a href="{{ url('blogs') }}">Blog</a></li>
                        <li class="@if(url()->current() == route('/contact-us') ) active @endif"><a href="{{ url('contact-us') }}">Contact Us</a></li>
                        <li>
                            <div class="btn-nav">
                                <a href="{{ url('book-appointment') }}" class="btn btn-primary btn-small navbar-btn">Book Appointment</a>
                            </div>
                        </li>
                    </ul>
                </div>
                <!-- navigation menu end -->
                <!--/.navbar-collapse -->
            </div>
        </div>

        <!-- HEADER Navigation End -->
        <!-- =-=-=-=-=-=-= Main Area =-=-=-=-=-=-= -->
        <div class="main-content-area">
            @yield('content')
        </div>
        <!-- =-=-=-=-=-=-= FOOTER =-=-=-=-=-=-= -->
        <footer class="footer-area">
            <!--Footer Upper-->
            <div class="footer-content">
                <div class="container">
                    <div class="row clearfix">
                        <div class="col-md-8 col-md-offset-2">
                            <div class="footer-content text-center no-padding margin-bottom-40">
                                <div class="logo-footer">
                                    <img id="logo-footer" class="center-block" src="{{ url((new \App\Library\Contents)->content()->wlogo)}}" alt="">
                                </div>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus illo vel dolorum soluta consectetur doloribus sit. Delectus non tenetur odit dicta vitae debitis suscipit doloribus. Lorem ipsum dolor sit amet, illo vel.</p>
                            </div>
                        </div>
                        <!--Two 4th column-->
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="row clearfix">
                                <div class="col-lg-7 col-sm-6 col-xs-12 column">
                                    <div class="footer-widget about-widget">
                                        <h2>Our Addres</h2>
                                        <ul class="contact-info">
                                            <li><span class="icon fa fa-map-marker"></span> {{ (new \App\Library\Contents)->content()->address }}</li>
                                            <li><span class="icon fa fa-phone"></span> {{ (new \App\Library\Contents)->content()->contact }}</li>
                                            <li><span class="icon fa fa-map-marker"></span> {{ (new \App\Library\Contents)->content()->email }}</li>
                                            <li><span class="icon fa fa-fax"></span> 011-43632575</li>
                                        </ul>
                                        <div class="social-links-two clearfix">
                                            <a href="{{ (new \App\Library\Contents)->content()->facebook_id }}" class="facebook img-circle">	<span class="fa fa-facebook-f"></span>
                                            </a>
                                            <a href="{{ (new \App\Library\Contents)->content()->twitter_id }}" class="twitter img-circle">	<span class="fa fa-twitter"></span>
                                            </a>
                                            <a mailto="{{ (new \App\Library\Contents)->content()->email }}" class="google-plus img-circle">	<span class="fa fa-google-plus"></span>
                                            </a>
                                            <a href="#" class="linkedin img-circle"> <span class="fa fa-pinterest-p"></span>
                                            </a>
                                            <a href="{{ (new \App\Library\Contents)->content()->linkedin_id }}" class="linkedin img-circle">	<span class="fa fa-linkedin"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <!--Footer Column-->
                                <div class="col-lg-5 col-sm-6 col-xs-12 column">
                                    <h2>Our Service</h2>
                                    <div class="footer-widget links-widget">
                                        <ul>
                                            <li><a href="{{ url('services/gst') }}">GST</a>
                                            </li>
                                            <li><a href="{{ url('services/customs') }}">Customs</a>
                                            </li>
                                            <li><a href="{{ url('services/income-tax') }}">Income Tax</a>
                                            </li>
                                            <li><a href="{{ url('services/corporation-tax') }}">Corporation Tax</a>
                                            </li>
                                            <li><a href="{{ url('services/pf-esi') }}">PF & ESI</a>
                                            </li>
                                            <li><a href="{{ url('services/labor-law') }}">Labor Law</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Two 4th column End-->
                        <!--Two 4th column-->
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="row clearfix">
                                <!--Footer Column-->
                                <div class="col-lg-7 col-sm-6 col-xs-12 column">
                                    <div class="footer-widget news-widget">
                                        <h2>Latest News</h2>
                                        @foreach((new \App\Library\News)->blogs() as $val)
                                        <div class="news-post">
                                            <div class="icon"></div>
                                            <div class="news-content">
                                                <figure class="image-thumb">
                                                    <img src="{{ url($val->pic)}}" alt="">
                                                </figure>
                                                <a href="#">{{ $val->title }}</a>
                                            </div>
                                            <div class="time">{{ $val->dates }}</div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <!--Footer Column-->
                                <div class="col-lg-5 col-sm-6 col-xs-12 column">
                                    <div class="footer-widget links-widget">
                                        <h2>Site Links</h2>
                                        <ul>
                                            <li>
                                                <a href="{{ url('login') }}">Login</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('register') }}">Register</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('services') }}">Services</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('blogs') }}">Blog</a>
                                            </li>
                                            <li>
                                                <a href="{{ url('contact-us') }}">Contact Us</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--Two 4th column End-->
                    </div>
                </div>
            </div>
            <!--Footer Bottom-->
            <div class="footer-copyright">
                <div class="auto-container clearfix">
                    <!--Copyright-->
                    <div class="copyright text-center">Copyright 2023 &copy; Created By <a target="_blank" href="http://iottechsoft.com">IOTTech Softwares</a> All Rights Reserved</div>
                </div>
            </div>
        </footer>
        <!-- =-=-=-=-=-=-= JQUERY =-=-=-=-=-=-= -->
        <script src="{{ asset("assetsweb/js/jquery.min.js")}}"></script>
        <script src="{{ asset("assetsweb/js/bootstrap.min.js")}}"></script>
        <script src="{{ asset("assetsweb/js/jquery.smoothscroll.js")}}"></script>
        <script type="text/javascript" src="{{ asset("assetsweb/js/easing.js")}}"></script>
        <script src="{{ asset("assetsweb/js/jquery.countTo.js")}}"></script>
        <script src="{{ asset("assetsweb/js/jquery.waypoints.js")}}"></script>
        <script src="{{ asset("assetsweb/js/imagesloaded.js")}}"></script>
        <script src="{{ asset("assetsweb/js/isotope.min.js")}}"></script>
        <script src="{{ asset("assetsweb/js/jquery.appear.min.js")}}"></script>
        <script src="{{ asset("assets/plugins/datatable/js/jquery.dataTables.min.js") }}"></script>
        <script src="{{ asset("assetsweb/js/carousel.min.js")}}"></script>
        <script src="{{ asset("assetsweb/js/jquery.stellar.min.js")}}"></script>
        <script src="{{ asset("assetsweb/js/bootstrap-dropdownhover.min.js")}}"></script>
        <script src="{{ asset("assets/js/select2.min.js")}}"></script>
        <script src="{{ asset("assetsweb/js/repeater.js")}}"></script>
        <script src="{{ asset("vendor/unisharp/laravel-ckeditor/ckeditor.js") }}"></script>
        <script src="{{ asset("assets/plugins/notifications/js/lobibox.min.js") }}"></script>
        <script src="{{ asset("assets/plugins/notifications/js/notifications.min.js") }}"></script>
        <script src="{{ asset("assets/plugins/notifications/js/notification-custom-script.js") }}"></script>
        <script src="{{ asset("assets/js/smooth-submit.js") }}"></script>
        <script type="text/javascript" src="https://templates.scriptsbundle.com/knowledge/demo/scripts/shCore.js"></script>
        <script type="text/javascript" src="https://templates.scriptsbundle.com/knowledge/demo/scripts/shBrushPhp.js"></script>
        <script src="{{ asset("assetsweb/js/custom.js")}}"></script>
        <script src="{{ asset("assetsweb/js/web.js")}}"></script>
        @if (session()->has('message'))
        <script>
$(".message").show();
$('.message').delay(10000).fadeOut('slow');
        </script>
        @endif
    </body>
</html>
