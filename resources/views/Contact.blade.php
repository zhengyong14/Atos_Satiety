<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Satiety- Contact</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="{{ url('/img/favicon.png')}}" rel="icon">
    <link href="{{ url('/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ url('/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ url('/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{ url('/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{ url('/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{ url('/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Variables CSS Files. Uncomment your preferred color scheme -->
    <link href="{{ url('/css/variables.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{ url('/css/main.css') }}" rel="stylesheet">

    <!-- =======================================================
        * Template Name: HeroBiz - v2.0.0
        * Template URL: https://bootstrapmade.com/herobiz-bootstrap-business-template/
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->
</head>

<body>

<!-- ======= Header ======= -->
<header id="header" class="header fixed-top" data-scrollto-offset="0">
    <div class="container-fluid row align-items-center justify-content-between">

        <div class="container col-1 float-start ">
            <a href="{{ url('/Dashboard') }}" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
                <img src="{{ url('/img/logo.png')}}" alt="">
            </a>
        </div>

        <div class="container col-9 align-items-center">
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="{{ url('/Dashboard') }}">Famine</a></li>
                    <li><a class="nav-link scrollto" href="{{ url('/Agriculture') }}">Agriculture</a></li>
                    <li><a class="nav-link scrollto" href="{{ url('/AidAgencies') }}">Aid Agencies</a></li>
                    <li><a class="nav-link scrollto" href="{{ url('/Contact') }}">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle d-none"></i>
            </nav><!-- .navbar -->
        </div>

        <div class="container col-1"></div>

    </div>
</header><!-- End Header -->

<section class="satellite-image">

</section>


<section class="container align-items-center contact col-6">
    <h3>Contact Us</h3>
    <p>
        Welcome to leave us an email or contact us directly with your mobile phone.
    </p>
</section>

<section class="container-fluid d-flex  getintouch">
    <div class="container col-6 justify-content-center whitebox ">
        <div>
            <img class="getintouchlogo" src="{{ url('/images/call.png')}}" alt="">
            <p>
                Call Us:
            </p>
            <p>
                +601234567
            </p>
        </div>

        <br>
        <br>
        <br>

        <div>
            <img class="getintouchlogo" src="{{ url('/images/email.png')}}" alt="">
            <p>
                Email Us:
            </p>
            <p><a href="mailto:satiety@gmail.com">satiety@gmail.com</a></p>

        </div>

    </div>
    <div class="container col-4">

        <div>
            <h3>Let’s Get In Touch</h3>
            <p>
                We openly accept funding and seek help.
                <br>
                For more information about us, please click on the link below
            </p>
        </div>
        <div class="container-fluid d-flex logosandtext" >
            <div class="twitterlogo">
                <img class="twitterlogo flex-column" src="{{ url('/images/twitterlogo.png')}}" alt="">
                <p class="flex-column"> SatietyTW</p>
            </div>
            <div class="facebooklogo">
                <img class="getintouchlogo" src="{{ url('/images/facebooklogo.png')}}" alt="">
                <p class="d-flex"> SatietyFB</p>
            </div>

        </div>
    </div>

</section>


<main id="main">
</main>

<!-- ======= Footer ======= -->
<footer id="footer" class="footer">

    <div class="footer-content">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6 footer-info">
                    <h3>Contact Us:</h3>
                    <p>Phone: +601234567</p>
                    <p>Email: satiety@gmail.com</p>
                    <p>Facebook: SatietyFB</p>
                    <p>Twitter: SatietyTW</p>
                </div>

                <div class="col-lg-8 col-md-6 footer-info">
                    <h3>About Us:</h3>
                    <p>
                        We help government/humanitarian agency to deliver food supplies to areas with food shortages in a timely manner. Early
                        warning helps aid agencies to plan early intervention that could minimise the impact of a famine crisis and secure
                        funding as quickly as possible.
                    </p>
                </div>
            </div>
        </div>
    </div>

</footer><!-- End Footer -->

<a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<div id="preloader"></div>

<!-- Vendor JS Files -->
<script src="{{ url('/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{ url('/vendor/aos/aos.js')}}"></script>
<script src="{{ url('/vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{ url('/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{ url('/vendor/swiper/swiper-bundle.min.js')}}"></script>
<script src="{{ url('/vendor/php-email-form/validate.js')}}"></script>

<!-- Template Main JS File -->
<script src="{{ url('/js/main.js')}}"></script>

</body>

</html>
