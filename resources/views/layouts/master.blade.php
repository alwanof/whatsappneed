@php
$lang = app()->getLocale();
@endphp
<!DOCTYPE html>
<html class="no-js" dir="{{ $lang == 'ar' ? 'rtl' : 'ltr' }}" lang="{{ $lang }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>{{ config('app.name', 'Project0') }} - @yield('title')</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('layout/img/favicon.png') }}" />
    <!-- Place favicon.ico in the root directory -->

    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="{{ asset('layout/css/bootstrap-5.0.0-alpha-2.min.css') }}" />
    @if ($lang == 'ar')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.rtl.min.css"
            integrity="sha384-trxYGD5BY4TyBTvU5H23FalSCYwpLA0vWEvXXGm5eytyztxb+97WzzY+IWDOSbav" crossorigin="anonymous">

    @endif
    <link rel="stylesheet" href="{{ asset('layout/css/LineIcons.2.0.css') }}" />
    <link rel="stylesheet" href="{{ asset('layout/css/tiny-slider.css') }}" />
    <link rel="stylesheet" href="{{ asset('layout/css/animate.css') }}" />
    @if ($lang == 'ar')
        <link rel="stylesheet" href="{{ asset('layout/css/main-rtl.css') }}" />

    @else
        <link rel="stylesheet" href="{{ asset('layout/css/main.css') }}" />
    @endif
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
        crossorigin="anonymous" />
</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!-- ========================= preloader start ========================= -->
    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- preloader end -->


    <!-- ========================= header start ========================= -->
    <header class="header">
        <div class="navbar-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <nav class="navbar navbar-expand-lg">
                            <a class="navbar-brand" href="index.html">
                                <img src="{{ asset('layout/img/logo/logo.png') }}" alt="Logo" />
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <!-- PHP PHP PHP -->
                                <ul id="nav" class="navbar-nav {{ $lang == 'ar' ? 'mr-auto' : 'ml-auto' }}">

                                    <li class="nav-item">
                                        <a class="page-scroll" href="#home">{{ __('front.NAV.HOME') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#features">{{ __('front.NAV.FEATURES') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#about">{{ __('front.NAV.QRMENU') }}</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="page-scroll" href="#why">{{ __('front.NAV.HOW') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#pricing">{{ __('front.NAV.WHY') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#testimonials">{{ __('front.NAV.PRICING') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#testimonials">{{ __('front.NAV.CONTACT') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="page-scroll" href="#testimonials">
                                            <i class="fas fa-globe-europe"></i>
                                            {{ strtoupper($lang) }}
                                        </a>
                                    </li>

                                </ul>
                            </div>
                            <!-- navbar collapse -->
                        </nav>
                        <!-- navbar -->
                    </div>
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- navbar area -->
    </header>
    <!-- ========================= header end ========================= -->


    @yield('content')

    <!-- ========================= footer start ========================= -->
    <footer class="footer">
        <div class="container">
            <div class="widget-wrapper">
                <div class="row">

                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="footer-widget">
                            <div class="logo mb-30">
                                <a href="index.html"> <img src="layout/img/logo/logo.png" height="44" alt=""> </a>
                            </div>
                            <p class="desc mb-30 text-white">Lorem ipsum dolor sit amet, consetetur sadipscing elitr,
                                sed dinonumy eirmod tempor invidunt.</p>
                            <ul class="socials">
                                <li>
                                    <a href="jvascript:void(0)"> <i class="lni lni-facebook-original"></i> </a>
                                </li>
                                <li>
                                    <a href="jvascript:void(0)"> <i class="lni lni-twitter-original"></i> </a>
                                </li>
                                <li>
                                    <a href="jvascript:void(0)"> <i class="lni lni-instagram-original"></i> </a>
                                </li>
                                <li>
                                    <a href="jvascript:void(0)"> <i class="lni lni-linkedin-original"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-2 col-md-6">
                        <div class="footer-widget">
                            <h3>About Us</h3>
                            <ul class="links">
                                <li> <a href="javascript:void(0)">Home</a> </li>
                                <li> <a href="javascript:void(0)">Feature</a> </li>
                                <li> <a href="javascript:void(0)">About</a> </li>
                                <li> <a href="javascript:void(0)">Testimonials</a> </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3>Features</h3>
                            <ul class="links">
                                <li> <a href="javascript:void(0)">How it works</a> </li>
                                <li> <a href="javascript:void(0)">Privacy policy</a> </li>
                                <li> <a href="javascript:void(0)">Terms of service</a> </li>
                                <li> <a href="javascript:void(0)">Refund policy</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h3>Other Products</h3>
                            <ul class="links">
                                <li> <a href="jvascript:void(0)">Accounting Software</a> </li>
                                <li> <a href="jvascript:void(0)">Billing Software</a> </li>
                                <li> <a href="jvascript:void(0)">Booking System</a> </li>
                                <li> <a href="jvascript:void(0)">Tracking System</a> </li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </footer>
    <!-- ========================= footer end ========================= -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top btn-hover">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src="{{ asset('layout/js/bootstrap.5.0.0.alpha-2-min.js') }}"></script>
    <script src="{{ asset('layout/js/tiny-slider.js') }}"></script>
    <script src="{{ asset('layout/js/wow.min.js') }}"></script>
    <script src="{{ asset('layout/js/main.js') }}"></script>
</body>

</html>
