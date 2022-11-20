<?php include("seccion/sesiones.php"); ?>

<!-- Sidebar -->
<?php include("template/menu.php") ?>
<!-- End of Sidebar -->

<!-- Topbar -->
<?php include("template/header.php") ?>
<!-- End of Topbar -->

<?php


$sqlPlant = "SELECT * FROM mapa";
if ($sqlPlant = mysqli_query($mysqli, $sqlPlant)) {
    $numPlant = mysqli_num_rows($sqlPlant);
}

$estado = "inactivo";

$sqlDanger = "SELECT estado FROM mapa WHERE estado = '$estado'";
if ($sqlDanger = mysqli_query($mysqli, $sqlDanger)) {
    $numDanger = mysqli_num_rows($sqlDanger);
}







?>




<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <div class="tabcontent">
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class=" d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800"><i class="bi bi-geo-alt" style="font-size: 2rem;"></i> Mapa</h1>
                    <a href="registroPlantas.phh" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="bi bi-geo-alt"></i> Agregar Nuevo Usuario</a>
                </div>

                <!-- Content Row -->
                <div class="row">
                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Numero de Plantas</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $numPlant ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="bi bi-geo-alt fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-danger shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Plantas Inactivas</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $numDanger ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="bi bi-radioactive fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content Row -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Mapa de Echinocactus platyacanthus</h6>
                    </div>
                    <div class="card-body">
                        <div id="map-container-google-2" class="z-depth-1-half map-container" style="height: 400px; width:100%;">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
</div>

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
                    parseFloat(markerElem.getAttribute('lng')),
                );
                const contentString =
                    '<div id="content" style="width: 300px;height: 300px; text-align:center;">' +

                    '<p style="color: #495057; font-size: 22px;"><i class="fa fa-fw fa-map-marker"></i>' + direccion + '</p>' +

                    '<div>' +
                    "<img alt='90'  class='rounded mx-auto d-block' src='img/imagenesPlantas/" + imagen + "' >" + "<br>" +
                    '<button id="boton1" value="cilck" type="button" style="color: #fff; background-color: #556ee6; border-color: #556ee6;">Ver mas</button>" ' +
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

<!-- Agregar Usuarios-->
<div class="modal fade" id="agregarPlanta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Planta </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="controlPlantas.php" enctype="multipart/form-data">

                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="bi bi-signpost-fill"></i></div>
                        </div>
                        <input required type="text" class="form-control" name="direccion" placeholder="direccion">
                    </div>

                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="bi bi-list"></i></div>
                        </div>
                        <input required type="text" class="form-control" name="descripcion" placeholder="descripcion">
                    </div>

                    <div class="form-group has-feedback" bis_skin_checked="1">
                        <div class="btn btn-default btn-file" bis_skin_checked="1">
                            <i class="fas fa-paperclip"></i> Adjuntar Imagen de la planta
                            <input type="file" name="imagen">
                        </div>
                    </div>

                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="bi bi-geo-alt"></i></div>
                        </div>
                        <input required type="text" class="form-control" name="lat" placeholder="latitud">
                    </div>

                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="bi bi-geo-alt"></i></div>
                        </div>
                        <input required type="text" class="form-control" name="lng" placeholder="Longitud">

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">cerrar</button>
                        <button type="submit" class="btn btn-primary" name="btn_guardar">guardar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

<?php include("template/footer.php"); ?>