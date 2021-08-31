<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title') - Clinic at Home</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{asset('assets/img/icon.svg')}}" rel="icon">
    <link href="{{asset('assets/img/icon.svg')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/icofont/icofont.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/venobox/venobox.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/fontawesome/css/all.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/owl.carousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

    @yield('styles')

</head>

<body>

<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-none d-lg-flex align-items-center fixed-top">
    <div class="container d-flex">
        <div class="contact-info mr-auto">
        </div>
        <div class="social-links ">
            <a href="https://chanjocovid.moh.go.tz/" target="_blank" class="twitter d-flex align-items-center justify-content-between">
                <img src="{{asset('assets/img/tanzania.svg')}}" width="15" alt="">
                <i class="ri-syringe-line mx-2"></i>
                Apply for the COVID-19 Delta Vaccination!
            </a>

        </div>
    </div>
</div>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

        <a href="https://clinic.rombonation.com"><img src="{{asset('assets/img/logo.svg')}}" width="150"><a href="index.html"></a>

            <div class="d-flex align-items-center justify-content-center">
                <nav class="nav-menu d-none d-lg-block mt-0">
                    <ul>
                        <li class="@if(request()->segment(1) == null) active @endif"><a href="{{url('/')}}">Home</a></li>
                        <li><a href="@if(request()->segment(1) == null) #about @else {{url('/#about')}} @endif ">About</a></li>
                        <li><a href="@if(request()->segment(1) == null) #appointment @else {{url('/#appointment')}} @endif " class="scrollto">Work with us</a></li>
                    </ul>

                </nav><!-- .nav-menu -->

                <a href="{{route('login')}}" class="appointment-btn">Login</a>

            </div>
    </div>
</header><!-- End Header -->

@yield('content')

<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6 footer-contact">
                    <img src="{{asset('assets/img/logo.svg')}}" style="width:150px; margin-right: auto;" ><a href="index.html"></a></h1>
                    <p class="mt-3">

                    <p>
                        <img src="{{asset('assets/img/RomboNation.svg')}}" alt="Rombo Nation" width="15px" class="mr-1">
                        <a href="https://www.rombonation.com" target="_blank">Rombo Nation</a>
                    </p>

                    <p>
                        <i class="ri-phone-line mr-1"></i>
                        <a href="tel:+255742529173">+255 742 529 173</a>
                    </p>

                    <p>
                        <i class="ri-map-pin-2-line mr-1"></i>
                        Moshi, Kilimanjaro
                    </p>

                    <p class="d-flex align-items-center">
                        <i class="ri-mail-send-line mr-2"></i>
                        <a href="mailto:clinic@rombonation.com">clinic@rombonation.com</a>
                    </p>

                    </p>
                </div>

                <div class="col-lg-4 col-md-6 footer-links">
                    <h4>Useful Links</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="{{route('login')}}">Login</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Documentation</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-6 footer-links">
                    <h4>Useful systems</h4>
                    <ul>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Hospital Information System</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Clinic at Home</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Imudu</a></li>
                        <li><i class="bx bx-chevron-right"></i> <a href="#">Jimudu</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>

    <div class="container d-md-flex align-items-center justify-content-center py-4">

        <div class="">
            <div class="copyright">
                &copy; {{date('Y')}} <strong><span><a href="https://www.rombonation.com" target="_blank">Rombo Nation</a></span></strong>. All Rights Reserved
            </div>
        </div>

    </div>
</footer><!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>

<!-- Vendor JS Files -->
<script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
<script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
<script src="{{asset('assets/vendor/venobox/venobox.min.js')}}"></script>
<script src="{{asset('assets/vendor/waypoints/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('assets/vendor/counterup/counterup.min.js')}}"></script>
<script src="{{asset('assets/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/vendor/fontawesome/js/all.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{asset('assets/js/main.js')}}"></script>

@yield('scripts')

</body>

</html>
