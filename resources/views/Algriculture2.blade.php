<!DOCTYPE html>
<html lang="en">
<head>
    <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery.canvasjs.stock.min.js"></script>
    <!-- NDVI -->
    <script type="text/javascript">
        var dataNDVI = [];
        var dataM = [];
        var dataNDWI = [];
        var dataSeriesNDVI = {type: "spline"};
        var dataSeriesM = {type: "spline"};
        var dataSeriesNDWI = {type: "spline"};
        var dataPointsNDVI = [];
        var dataPointsNDWI = [];
        var dataPointsM = [];
        // code for future implementation, because current date set will only available for 2018
        // var today = new Date();
        // var start_date = today.getFullYear() + '-' + (today.getMonth()+1) + '-' + today.getDate();
        var start_date = new Date("2018-01-01");
        start_date = start_date.getFullYear() + '-' + (start_date.getMonth() + 1) + '-' + start_date.getDate();
        var end_date = new Date("2018-10-31");
        end_date = end_date.getFullYear() + '-' + (end_date.getMonth() + 1) + '-' + end_date.getDate();

        $(function () {
            $.ajax({
                url: "/api/famines",
                method: "GET",
                data: {
                    area: 'Manzini',
                    start_date: start_date,
                    end_date: end_date
                },
                success: function (data) {
                    let famineData = data.data;
                    famineData.forEach(function (data) {
                        var date = data.acquisition_timestamp;
                        var dateArray1 = date.split("-");
                        var dateArray2 = dateArray1[2].split(" ");
                        dataPointsNDVI.push({
                            x: new Date(dateArray1[0], dateArray1[1], dateArray2[0]),
                            y: data.NDVI_AGG
                        });
                        dataPointsNDWI.push({
                            x: new Date(dateArray1[0], dateArray1[1], dateArray2[0]),
                            y: data.NDWI_AGG
                        });
                        dataPointsM.push({x: new Date(dateArray1[0], dateArray1[1], dateArray2[0]), y: data.MOIST_AGG});
                    })
                    console.log(dataPointsM);
                    dataSeriesNDVI.dataPoints = dataPointsNDVI;
                    dataSeriesM.dataPoints = dataPointsM;
                    dataSeriesNDWI.dataPoints = dataPointsNDWI;
                    dataM.push(dataSeriesM);
                    dataNDVI.push(dataSeriesNDVI);
                    dataNDWI.push(dataSeriesNDWI);
                    loadNDVI(dataNDVI)
                    loadM(dataM)
                    loadNDWI(dataNDWI)
                }
            })
        });


        function runNDVI() {
            var dataNDVI = [];
            var dataSeriesNDVI = {type: "spline"};
            var dataPoints = [];
            console.log(document.getElementById("AreaNDVI").value);

            $.ajax({
                url: "/api/famines",
                method: "GET",
                data: {
                    area: document.getElementById("AreaNDVI").value,
                    start_date: start_date,
                    end_date: end_date
                },
                success: function (data) {
                    let famineData = data.data;
                    famineData.forEach(function (data) {
                        var date = data.acquisition_timestamp;
                        var dateArray1 = date.split("-");
                        var dateArray2 = dateArray1[2].split(" ");
                        dataPoints.push({
                            x: new Date(dateArray1[0], dateArray1[1], dateArray2[0]),
                            y: data.NDVI_AGG
                        });
                    })
                    dataSeriesNDVI.dataPoints = dataPoints;
                    dataNDVI.push(dataSeriesNDVI);
                    loadNDVI(dataNDVI)
                }
            })
        }

        function loadNDVI(dataNDVI) {
            var stockChartOptions = {
                title: {
                    text: "NDVI_AGG"
                },
                animationEnabled: true,
                exportEnabled: true,
                charts: [{
                    axisX: {
                        crosshair: {
                            enabled: true,
                            snapToDataPoint: true

                        }
                    },
                    axisY: {
                        crosshair: {
                            enabled: true,
                            //snapToDataPoint: true
                        },

                    },
                    data: dataNDVI
                }],
                rangeSelector: {
                    inputFields: {
                        startValue: new Date(2018, 06, 01),
                        endValue: new Date(2018, 10, 31)
                    },
                },
                buttons: [{
                    label: "June 2018",
                    range: 1,
                    rangeType: "month"
                }, {
                    label: "October 2018",
                    range: 2,
                    rangeType: "month"
                }, {
                    label: "All",
                    rangeType: "all"
                }]
            }
            $("#chartContainerNDVI").CanvasJSStockChart(stockChartOptions);
        }


    </script>


    </script>
    <!-- NDWI -->
    <script type="text/javascript">
        function runNDWI() {
            var dataNDWI = [];
            var dataSeriesNDWI = {type: "spline"};
            var dataPointsNDWI = [];

            $.ajax({
                url: "/api/famines",
                method: "GET",
                data: {
                    area: document.getElementById("AreaNDWI").value,
                    start_date: start_date,
                    end_date: end_date
                },
                success: function (data) {
                    let famineData = data.data;
                    famineData.forEach(function (data) {
                        var date = data.acquisition_timestamp;
                        var dateArray1 = date.split("-");
                        var dateArray2 = dateArray1[2].split(" ");
                        dataPointsNDWI.push({
                            x: new Date(dateArray1[0], dateArray1[1], dateArray2[0]),
                            y: data.NDWI_AGG
                        });
                    })
                    dataSeriesNDWI.dataPoints = dataPointsNDWI;
                    dataNDWI.push(dataSeriesNDVI);
                    loadNDWI(dataNDWI)
                }
            })
        }

        function loadNDWI(dataNDWI) {
            var stockChartOptions1 = {
                title: {
                    text: "NDWI_AGG"
                },
                animationEnabled: true,
                exportEnabled: true,
                charts: [{
                    axisX: {
                        crosshair: {
                            enabled: true,
                            snapToDataPoint: true

                        }
                    },
                    axisY: {
                        crosshair: {
                            enabled: true,
                            //snapToDataPoint: true
                        },

                    },
                    data: dataNDWI
                }],
                rangeSelector: {
                    inputFields: {
                        startValue: new Date(2018, 06, 01),
                        endValue: new Date(2018, 10, 31)
                    },
                }
            }
            $("#chartContainerNDWI").CanvasJSStockChart(stockChartOptions1);
        }


    </script>


    </script>

    <!-- MOIST -->
    <script type="text/javascript">
        function runM() {
            var dataM = [];
            var dataSeriesM = {type: "spline"};
            var dataPoints = [];


            $.ajax({
                url: "/api/famines",
                method: "GET",
                data: {
                    area: document.getElementById("AreaM").value,
                    start_date: start_date,
                    end_date: end_date
                },
                success: function (data) {
                    let famineData = data.data;
                    famineData.forEach(function (data) {
                        var date = data.acquisition_timestamp;
                        var dateArray1 = date.split("-");
                        var dateArray2 = dateArray1[2].split(" ");
                        dataPoints.push({
                            x: new Date(dateArray1[0], dateArray1[1], dateArray2[0]),
                            y: data.MOIST_AGG
                        });
                    })
                    dataSeriesM.dataPoints = dataPoints;
                    dataM.push(dataSeriesM);
                    loadM(dataM)
                }
            })
        }

        function loadM(dataM) {
            var stockChartOptions = {
                title: {
                    text: "MOIST_AGG"
                },
                animationEnabled: true,
                exportEnabled: true,
                charts: [{
                    axisX: {
                        crosshair: {
                            enabled: true,
                            snapToDataPoint: true

                        }
                    },
                    axisY: {
                        crosshair: {
                            enabled: true,
                            //snapToDataPoint: true
                        },

                    },
                    data: dataM
                }],
                rangeSelector: {
                    inputFields: {
                        startValue: new Date(2018, 06, 01),
                        endValue: new Date(2018, 10, 30)
                    },
                }
            }
            $("#chartContainerM").CanvasJSStockChart(stockChartOptions);
        }


    </script>


    </script>


</head>
<head>

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Satiety- Agriculture</title>
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
            <a href="{{ url('/Dashboard')}}" class="logo d-flex align-items-center scrollto me-auto me-lg-0">
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

<section class="satellite-image">

</section>
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
{{--<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>--}}
<script src="{{ url('/data/dist/Control.Geocoder.js')}}"></script>
<script src="{{ url('/data/eswatini.js')}}"></script>
<script>

    /*===================================================
                      OSM  LAYER
===================================================*/

    var map = L.map('map').setView([-26.49884, 31.38004], 9);
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
        this._div.innerHTML = '<h4>US Population Density</h4>' + (props ?
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

<!-- BUTTON DESIGN -->
<!-- <div><td><a href="#about" class="btn-details">NDVI</a></td>
    <td><a href="#about" class="btn-details">NDWI</a></td>
    <td><a href="#about" class="btn-details">MOIST</a></td></div> -->


<!-- NDVI -->

<select id="AreaNDVI" onchange="runNDVI()">  <!--Call run() function-->
    <option value="Manzini">Manzini</option>
    <option value="Shiselweni">Shiselweni</option>
    <option value="Lubombo">Lubombo</option>
    <option value="Lubombo">Hhohho</option>
</select><br><br>

<div id="chartContainerNDVI" style="height: 450px; width: 100%;"></div>

<!-- NDWI -->
<select id="AreaNDWI" onchange="runNDWI()">  <!--Call run() function-->
    <option value="Manzini">Manzini</option>
    <option value="Shiselweni">Shiselweni</option>
    <option value="Lubombo">Lubombo</option>
    <option value="Lubombo">Hhohho</option>
</select><br><br>

<div id="chartContainerNDWI" style="height: 450px; width: 100%;"></div>

<!-- MOIST -->
<select id="AreaM" onchange="runM()">  <!--Call run() function-->
    <option value="Manzini">Manzini</option>
    <option value="Shiselweni">Shiselweni</option>
    <option value="Lubombo">Lubombo</option>
    <option value="Lubombo">Hhohho</option>
</select><br><br>

<div id="chartContainerM" style="height: 450px; width: 100%;"></div>


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
