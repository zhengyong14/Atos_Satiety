<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Satiety</title>
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
    <link href="{{ url('/css/main.css')}}" rel="stylesheet">

    <!-- Google Map -->
    <link href="{{ url('/css/map-container-google-3.css')}}" rel="stylesheet">


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
            <a href="{{ url('Dashboard')}}" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
                <img src="{{ url('/img/logo.png')}}" alt="">
            </a>
        </div>

        <div class="container col-9 align-items-center">
            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto" href="{{ url('/Dashboard')}}">Famine</a></li>
                    <li><a class="nav-link scrollto" href="{{ url('/Agriculture')}}">Agriculture</a></li>
                    <li><a class="nav-link scrollto" href="{{ url('AidAgencies')}}">Aid Agencies</a></li>
                    <li><a class="nav-link scrollto" href="{{ url('/Contact')}}">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle d-none"></i>
            </nav><!-- .navbar -->
        </div>

        <div class="container col-1"></div>

    </div>
</header><!-- End Header -->

<section class="satellite-image">

</section>


<section class="container align-items-center contact col-10">
    <h3>SEARCH HERE TO LOCATE YOUR FARM</h3>
</section>

    <!-- Map -->

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <style>
        #map{
            height: 100vh;
            width: 100%;
        }

        .info {
            padding: 6px 8px;
            font: 14px/16px Arial, Helvetica, sans-serif;
            background: white;
            background: rgba(255,255,255,0.8);
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
            border-radius: 5px;
        }
        .info h4 {
            margin: 0 0 5px;
            color: #777;
        }

        .legend {
            line-height: 18px;
            color: #555;
        }
        .legend i {
            width: 18px;
            height: 18px;
            float: left;
            margin-right: 8px;
            opacity: 0.7;
        }

    </style>

    </head>
    <body>
    <div id="map"></div>
    </body>
</html>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<!-- ======= Data ======= -->
<script src="{{ url('/data/line.js')}}"></script>
<script src="{{ url('/data/point.js')}}"></script>
<script src="{{ url('/data/polygon.js')}}"></script>
<script src="{{ url('/data/nepaldata.js')}}"></script>
<!-- <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script> -->
<script src="{{ url('/data/dist/Control.Geocoder.js')}}"></script>
<script src="{{ url('/data/eswatini.js')}}"></script>
<script>

    /*===================================================
                      OSM  LAYER
===================================================*/
    //initial location
    var map = L.map('map').setView([9.1450,40.4897], 4);
    var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });
    osm.addTo(map);

    /*===================================================
                          MARKER
    ===================================================*/

    var singleMarker = L.marker([9.1450,40.4897]);
    singleMarker.addTo(map);

    /*===================================================
                         TILE LAYER
    ===================================================*/

    var CartoDB_DarkMatter = L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
        subdomains: 'abcd',
        maxZoom: 19
    });
    CartoDB_DarkMatter.addTo(map);

    // Google Map Layer

    googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
        maxZoom: 20,
        subdomains:['mt0','mt1','mt2','mt3']
    });
    googleStreets.addTo(map);

    // Satelite Layer
    googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}',{
        maxZoom: 20,
        subdomains:['mt0','mt1','mt2','mt3']
    });
    googleSat.addTo(map);

    var Stamen_Watercolor = L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/watercolor/{z}/{x}/{y}.{ext}', {
        attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        subdomains: 'abcd',
        minZoom: 1,
        maxZoom: 16,
        ext: 'jpg'
    });
    Stamen_Watercolor.addTo(map);


    /*===================================================
                          GEOJSON
    ===================================================*/

    var linedata = L.geoJSON().addTo(map);
    var pointdata = L.geoJSON().addTo(map);
    var polygondata = L.geoJSON().addTo(map);

    /*===================================================
                          LAYER CONTROL
    ===================================================*/

    var baseLayers = {
        "Satellite":googleSat,
        "Google Map":osm,
        "Water Color":Stamen_Watercolor,
        "OpenStreetMap": googleStreets,
    };

    var overlays = {
        "Marker": singleMarker,
        "PointData":pointdata,
        "LineData":linedata,
        "PolygonData":polygondata
    };

    L.control.layers(baseLayers, overlays).addTo(map);


    /*===================================================
                          SEARCH BUTTON
    ===================================================*/
    L.Control.geocoder().addTo(map);
    /*===================================================
                          CONFIRM BUTTON
    ===================================================*/
</script>
</section>

<div>
    <a class="btn-getstarted" href="{{ url('Agriculture2')}}">Confirm</a>
</div>


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
