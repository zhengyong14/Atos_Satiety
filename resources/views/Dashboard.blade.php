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
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Source+Sans+Pro:ital,wght@0,300;0,400;0,600;0,700;1,300;1,400;1,600;1,700&display=swap"
        rel="stylesheet">

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
                    <li><a class="nav-link scrollto" href="{{ url('/AidAgencies')}}">Aid Agencies</a></li>
                    <li><a class="nav-link scrollto" href="{{ url('/Contact')}}">Contact</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle d-none"></i>
            </nav><!-- .navbar -->
        </div>

        <div class="container col-1"></div>

    </div>
</header><!-- End Header -->

<!-- SATELLITE IMAGE -->
<section class="satellite-image">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"/>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css"/>
    <style>
        #map {
            height: 100vh;
            width: 100%;
        }

        .info {
            padding: 6px 8px;
            font: 14px/16px Arial, Helvetica, sans-serif;
            background: white;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
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
<script src="{{ url('/data/line.js')}}"></script>
<script src="{{ url('/data/point.js')}}"></script>
<script src="{{ url('/data/polygon.js')}}"></script>
<script src="{{ url('/data/nepaldata.js')}}"></script>
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
<script src="{{ url('/data/eswatini.js')}}"></script>
<script>

    /*===================================================
                      OSM  LAYER
===================================================*/

    var map = L.map('map').setView([-26.49884,31.38004], 9);
    var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });
    osm.addTo(map);

    /*===================================================
                          MARKER
    ===================================================*/

    var singleMarker = L.marker([28.25255, 83.97669]);
    singleMarker.addTo(map);
    var popup = singleMarker.bindPopup('This is a popup')
    popup.addTo(map);

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

    googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });
    googleStreets.addTo(map);

    // Satelite Layer
    googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
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

    var linedata = L.geoJSON(lineJSON).addTo(map);
    var pointdata = L.geoJSON(pointJSON).addTo(map);
    var nepalData = L.geoJSON(nepaldataa).addTo(map);
    var polygondata = L.geoJSON(polygonJSON, {
        onEachFeature: function (feature, layer) {
            layer.bindPopup('<b>This is a </b>' + feature.properties.name)
        },
        style: {
            fillColor: 'red',
            fillOpacity: 1,
            color: 'green'
        }
    }).addTo(map);

    /*===================================================
                          LAYER CONTROL
    ===================================================*/

    var baseLayers = {
        "Satellite": googleSat,
        "Google Map": googleStreets,
        "Water Color": Stamen_Watercolor,
        "OpenStreetMap": osm,
    };

    var overlays = {
        "Marker": singleMarker,
        "PointData": pointdata,
        "LineData": linedata,
        "PolygonData": polygondata
    };

    L.control.layers(baseLayers, overlays).addTo(map);


    /*===================================================
                          SEARCH BUTTON
    ===================================================*/

    L.Control.geocoder().addTo(map);


    /*===================================================
                          Choropleth Map
    ===================================================*/

    L.geoJSON(statesData).addTo(map);


    function getColor(d) {
        return d > 5 ? '#800026' :
            d == 4 ? '#BD0026' :
                d == 3 ? '#E31A1C' :
                    d == 2 ? '#FC4E2A' :
                        d == 1 ? '#FD8D3C' :
                            '#FFEDA0';
    }

    function style(feature) {
        return {
            fillColor: getColor(feature.properties.density),
            weight: 2,
            opacity: 1,
            color: 'white',
            dashArray: '3',
            fillOpacity: 0.7
        };
    }

    L.geoJson(statesData, {style: style}).addTo(map);

    function highlightFeature(e) {
        var layer = e.target;

        layer.setStyle({
            weight: 5,
            color: '#666',
            dashArray: '',
            fillOpacity: 0.7
        });

        if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
            layer.bringToFront();
        }
        info.update(layer.feature.properties);
    }

    function resetHighlight(e) {
        geojson.resetStyle(e.target);
        info.update();
    }

    var geojson;
    // ... our listeners
    geojson = L.geoJson(statesData);

    function zoomToFeature(e) {
        map.fitBounds(e.target.getBounds());
    }

    function onEachFeature(feature, layer) {
        layer.on({
            mouseover: highlightFeature,
            mouseout: resetHighlight,
            click: zoomToFeature
        });
    }

    geojson = L.geoJson(statesData, {
        style: style,
        onEachFeature: onEachFeature
    }).addTo(map);

    var info = L.control();

    info.onAdd = function (map) {
        this._div = L.DomUtil.create('div', 'info'); // create a div with a class "info"
        this.update();
        return this._div;
    };

    // method that we will use to update the control based on feature properties passed
    info.update = function (props) {
        this._div.innerHTML = '<h4>Famine Population Density</h4>' + (props ?
            '<b>' + props.name + '</b><br />' + props.density + ' people / mi<sup>2</sup>'
            : 'Hover over a state');
    };

    info.addTo(map);

    var legend = L.control({position: 'bottomright'});

    legend.onAdd = function (map) {

        var div = L.DomUtil.create('div', 'info legend'),
            grades = [1, 2, 3, 4, 5],
            labels = [];

        // loop through our density intervals and generate a label with a colored square for each interval
        for (var i = 0; i < grades.length; i++) {
            div.innerHTML +=
                '<i style="background:' + getColor(grades[i] + 1) + '"></i> ' +
                grades[i] + (grades[i + 1] ? '&ndash;' + grades[i + 1] + '<br>' : '+');
        }

        return div;
    };

    legend.addTo(map);


</script>
</section>

<section class="services">
    <div class="d-flex justify-content-center">
        <h3>Our services</h3>
    </div>
    <div class="container-fluid d-flex col-5 align-items-center justify-content-between">
        <a class="btn-services" href="{{ url('/Dashboard')}}">Government</a>
        <a class="btn-services" href="{{ url('/Agriculture')}}">Farmer</a>
        <a class="btn-services" href="{{ url('/AidAgencies')}}">Aid Agencies</a>
    </div>
</section>

<section class="container-fluid align-items-center about">
    <h3>About</h3>
    <p>
        Satiety is a web-based famine alert system that incorporates image analysis technology and satellite imagery
        data, to
        analyze and monitor crop condition to detect and predict famine.
        The application's analytical results, such as soil moisture and climate, vegetation index, and simple forest
        condition
        prediction, can assist government or humanitarian agencies in delivering food supplies to places experiencing
        food
        shortages in a timely way.
    </p>
</section>

<section class="container-fluid align-items-center bgWithTextInFront">
    <div class="container col-8">

        <div>
            <h3>How Famine impacts the world</h3>
            <p>
                Around 811 million people are affected by famine, 1 in 8 people don’t get enough food to eat. One of the
                ways to solve
                the world's hunger issue is to detect famine before it happens. However, the current famine warning
                system (FEWS)
                collects most of the data locally and relies on expert judgment which requires a lot of effort and time.
                A more
                data-driven model is needed to improve the accuracy of the famine warning system.
            </p>
        </div>
    </div>

</section>

<section class="container-fluid productText ">

    <h1 class="productText">Product</h1>

    <div class="row container-fluid empty-space">
    </div>

    <div class="row container-fluid justify-content-start float-start">
        <img class="container col-5 float-end productImage" src="{{ url('/images/heatmapdemo.png')}}">

        <div class="container col-7 justify-content-end productText">
            <h3>Heatmap</h3>
            <p>
                A heat map (or heatmap) is a data visualization tool that depicts the magnitude of a phenomena as color
                in 2
                different dimensions. It helps to view a generalized version of the selected index and its intensity on
                the map that we are all used to.
            </p>
        </div>
    </div>

    <div class="row container-fluid empty-space">
    </div>

    <div class="row container-fluid justify-content-end float-end">
        <div class="container col-7 float-start">
            <h3>Data Visualization</h3>
            <p>
                Data Visualization will help to understand the different indexes and how they are changing over time.

                Data Visualization in this project is done using graphs, mainly using line graphs.
                These line graphs show the past changes of these indexes and also the prediction of how they will
                changed
                overtime
            </p>
        </div>
        <img class="container col-5 float-end productImage" src="{{ url('/images/personholdingplant.png')}}">
    </div>

</section>

<section class="container-fluid slogan text-center">
    <hr>
    <h1>Live Wise And Save Food.</h1>
    <hr>
</section>

<section class="container-fluid benefits">
    <div class=" container productText">
        <h3 class="text-center">Benefits</h3>
        <p class="text-center">
            There are actually multiple benefits to the users of this website, because the data visualization tools that
            are provided, help the user to make an informed decision about what they need to do
            next to save their crops.
        </p>
        <ul>
            <li class="first-li">Save Resources
                <ul>
                    <li class="second-li">
                        Tonnes of resources are saved when we can predict what might go wrong.
                        Due to this, farmers and Agriculture investors can analyze the data and decide what to do for
                        the next few months.
                        This helps in reducing resources that might have gone to waste otherwise due the poor condition
                        such as low water index and lower moisture, etc.

                    </li>
                </ul>
            </li>
            <li class="first-li">Monetary Gains
                <ul>
                    <li class="second-li">
                        As resources are saved, it becomes apparent that there will be monetary gains.
                        This is because as resources are saved, they are used towards the situations that leave the
                        least amount of damage to the crops.
                        This means that the farmers only using the said resources when it seems more appropriate,
                        resulting in better crops and therefore increased monetary gains
                    </li>
                </ul>
            </li>
        </ul>
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
                        We help government/humanitarian agency to deliver food supplies to areas with food shortages in
                        a timely manner. Early
                        warning helps aid agencies to plan early intervention that could minimise the impact of a famine
                        crisis and secure
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
