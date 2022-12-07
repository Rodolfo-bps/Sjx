<?php
include("admin/config/conexion.php");

$sqlMapa = "SELECT * FROM mapa";
$rel = mysqli_query($mysqli, $sqlMapa);


?>
<?php include_once("template/head.php"); ?>
<style>
    .tabla {
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }

    .tabla td,
    .tabla th {
        border: 0px solid #ddd;
        padding: 8px;
    }

    .tabla tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .tabla tr:hover {
        background-color: #ddd;
    }

    .tabla th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: left;
        background-color: #000;
        color: white;
    }
</style>
<?php include_once("template/header.php"); ?>

    

<!--Mapa-->
<?php include_once("paginas/mapa.php"); ?>


<!--GALERIA-->
<?php include_once("paginas/galeria.php"); ?>


<!--TABLA DE RESULTADOS-->
<?php include_once("paginas/resultados.php"); ?>


<!--PENDIENTE-->
<section id="testimonial" class="divider">
    <div class="container">
        <div class="content-center">
            <h2>A few words from <b>our clients…</b></h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui ea consequuntur, odit veniam mollitia
                aliquam reiciendis dignissimos, vitae sapiente neque, cum dolorum.</p>
        </div>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="carousel-container">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui ea consequuntur, odit
                            veniam mollitia aliquam reiciendis dignissimos, vitae sapiente neque, cum dolorum.
                        </p>
                        <div class="rating">
                            <ul class="list-inline">
                                <li class="list-inline-item"><i class="icon ion-md-star"></i></li>
                                <li class="list-inline-item"><i class="icon ion-md-star"></i></li>
                                <li class="list-inline-item"><i class="icon ion-md-star"></i></li>
                                <li class="list-inline-item"><i class="icon ion-md-star"></i></li>
                                <li class="list-inline-item"><i class="icon ion-md-star"></i></li>
                            </ul>
                        </div>
                        <div class="testimonial-user">
                            <div class="row">
                                <div class="col-md-3 col-3">
                                    <img src="assets/images/member-01.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="col-md-9 col-9">
                                    <h6>Marissa Mayer</h6>
                                    <span>Yahoo CEO</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-container">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui ea consequuntur, odit
                            veniam mollitia aliquam reiciendis dignissimos, vitae sapiente neque, cum dolorum.</p>
                        <div class="rating">
                            <ul class="list-inline">
                                <li class="list-inline-item"><i class="icon ion-md-star"></i></li>
                                <li class="list-inline-item"><i class="icon ion-md-star"></i></li>
                                <li class="list-inline-item"><i class="icon ion-md-star"></i></li>
                                <li class="list-inline-item"><i class="icon ion-md-star"></i></li>
                                <li class="list-inline-item"><i class="icon ion-md-star"></i></li>
                            </ul>
                        </div>
                        <div class="testimonial-user">
                            <div class="row">
                                <div class="col-md-3 col-3">
                                    <img src="assets/images/member-02.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="col-md-9 col-9">
                                    <h6>Marry Barra</h6>
                                    <span>General Motors CEO</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="carousel-container">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui ea consequuntur, odit
                            veniam mollitia aliquam reiciendis dignissimos, vitae sapiente neque, cum dolorum.</p>
                        <div class="rating">
                            <ul class="list-inline">
                                <li class="list-inline-item"><i class="icon ion-md-star"></i></li>
                                <li class="list-inline-item"><i class="icon ion-md-star"></i></li>
                                <li class="list-inline-item"><i class="icon ion-md-star"></i></li>
                                <li class="list-inline-item"><i class="icon ion-md-star"></i></li>
                                <li class="list-inline-item"><i class="icon ion-md-star"></i></li>
                            </ul>
                        </div>
                        <div class="testimonial-user">
                            <div class="row">
                                <div class="col-md-3 col-3">
                                    <img src="assets/images/member-03.jpg" class="img-fluid" alt="">
                                </div>
                                <div class="col-md-9 col-9">
                                    <h6>Elon Musk</h6>
                                    <span>Tesla CEO</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <div class="control-button">
                    <img src="assets/images/arrow-borderless-left.svg" class="img-fluid">
                </div>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <div class="control-button">
                    <img src="assets/images/arrow-borderless-right.svg" class="img-fluid">
                </div>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</section>

<!--DATOS ESTADISTICOS-->
<?php include_once("paginas/datos.php"); ?>

<?php include_once("template/footer.php"); ?>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="assets/js/jquery.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/vanilla-datatables@latest/dist/vanilla-dataTables.min.js" type="text/javascript"></script>

<script>
    var myTable = document.querySelector("#myTable");
    var dataTable = new DataTable(myTable);
</script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
    window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')
</script>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function(b, o, i, l, e, r) {
        b.GoogleAnalyticsObject = l;
        b[l] || (b[l] =
            function() {
                (b[l].q = b[l].q || []).push(arguments)
            });
        b[l].l = +new Date;
        e = o.createElement(i);
        r = o.getElementsByTagName(i)[0];
        e.src = '//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e, r)
    }(window, document, 'script', 'ga'));
    ga('create', 'UA-XXXXX-X', 'auto');
    ga('send', 'pageview');
</script>
<script>
    var customLabel = {
        restaurant: {
            label: 'R'
        },
        bar: {
            label: 'B'
        }
    };

    function initMap() {
        var map = new google.maps.Map(document.getElementById('map-container-google-2'), {
            center: new google.maps.LatLng(18.217500519058405, -97.92094397486888),
            zoom: 14,
            heading: 90,
            tilt: 45
        });

        var infoWindow = new google.maps.InfoWindow;
        downloadUrl('http://localhost/sjx3/admin/xml.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
                var id_planta = markerElem.getAttribute('id_planta');
                var direccion = markerElem.getAttribute('direccion');
                var descripcion = markerElem.getAttribute('descripcion');
                var imagen = markerElem.getAttribute('imagen');

                var point = new google.maps.LatLng(
                    parseFloat(markerElem.getAttribute('lat')),
                    parseFloat(markerElem.getAttribute('lng')));
                const contentString =
                    '<div id="content" style="width: 300px;height: 300px; text-align:center;">' +

                    '<p style="color: #495057; font-size: 22px;"><i class="fa fa-fw fa-map-marker"></i>' + direccion + '</p>' +

                    '<div>' +
                    "<img alt='90'  class='rounded mx-auto d-block' src='admin/img/imagenesPlantas/" + imagen + "' >" + "<br>" +
                    "<form action='planta.php' method='post'>" +
                    "<input type='hidden' name='id_planta' value='" + id_planta + "'>" +
                    "<input class='btn_planta'  type='submit' value='Ver mas'>" +
                    "</form>" +
                    "</div>" +
                    "</div>";

                //const image = "img/soldadoss.png";
                //  var icon = customLabel[codigo] || {};



                var marker = new google.maps.Marker({
                    map: map,
                    position: point,
                    //icon: image
                });
                marker.addListener('click', function() {
                    infoWindow.setContent(contentString);
                    infoWindow.open(map, marker);
                });
            });
        });

        // Una matriz con las coordenadas de los límites de Bucaramanga, extraídas manualmente de la base de datos GADM


    }

    function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;
        request.onreadystatechange = function() {
            if (request.readyState == 4) {
                request.onreadystatechange = doNothing;
                callback(request, request.status);
            }
        };
        request.open('GET', url, true);
        request.send(null);
    }

    function doNothing() {}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBi_XXphyPu7eBBXEWbJYJNp79RkuJrEK4&callback=initMap" defer>
</script>
</body>

</html>