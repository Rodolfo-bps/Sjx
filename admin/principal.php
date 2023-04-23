<?php

include("seccion/sesiones.php");
include("config/config.php");
//saber numero de usuarios
$sqlUser = "SELECT * FROM usuarios";
if ($resulUser = mysqli_query($mysqli, $sqlUser)) {
    $numUser = mysqli_num_rows($resulUser);
}

$sqlPlant = "SELECT * FROM mapa";
if ($sqlPlant = mysqli_query($mysqli, $sqlPlant)) {
    $numPlant = mysqli_num_rows($sqlPlant);
}

$estado = "inactivo";

$sqlDanger = "SELECT estado FROM mapa WHERE estado = '$estado'";
if ($sqlDanger = mysqli_query($mysqli, $sqlDanger)) {
    $numDanger = mysqli_num_rows($sqlDanger);
}

$estd = "activo";

$sqlActive = "SELECT estado FROM mapa WHERE estado = '$estd'";
if ($sqlActive = mysqli_query($mysqli, $sqlActive)) {
    $sqlActive = mysqli_num_rows($sqlActive);
}






$sql = "SELECT nombre, apellidos FROM usuarios WHERE id_usuario = '$id_usuario' ";
$usuario = mysqli_query($mysqli, $sql);

while ($row = $usuario->fetch_assoc()) {

    $nombre_usuario = $row['nombre'];
    $apellidos = $row["apellidos"];
}


$pass = "Sjx101";

$pass_c = sha1($pass);

$sqlPass = ("SELECT password FROM usuarios WHERE id_usuario='$id_usuario'");
$resultado = $mysqli->query($sqlPass);

//si hay usuario o no
$num = $resultado->num_rows;
//traer usuario de post y de la bd
$row = $resultado->fetch_assoc();
$password_bd = $row["password"];





?>



<!-- Sidebar -->
<?php include("template/menu.php") ?>
<!-- End of Sidebar -->
<!-- Topbar -->
<?php include("template/header.php") ?>
<!-- End of Topbar -->


<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <?php
        if (isset($_GET['view'])) {
            $views = explode("/", $_GET['view']);
            $view_file = 'view/' . $views[0] . '.php';
            if (file_exists($view_file)) {
                include $view_file;
            } else {
                http_response_code(404);
                echo '<div class="alert alert-danger" role="alert">Error: Página no encontrada</div>';
            }
        } else {
            
        }
        ?>
    </div>
    <!-- /.container-fluid -->
</div>













<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
</script>
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
        downloadUrl('http://localhost/sjx/admin/xml.php', function(data) {
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
                    '<div class="border-form-mapa"  style="margin: 0px; padding: 0px; width: 300px;height: 300px; text-align:center; ">' +

                    '<p style="color: #495057; font-size: 22px;"><i class="fa fa-fw fa-map-marker"></i> <strong>' + direccion + '</strong></p>' +
                    '<hr>' +
                    "<img alt='90' style='border: 3px solid #556ee6; border-radius: 8px; box-shadow: 12px 14px 22px -16px rgba(0,0,0.6);' width='300' class='rounded mx-auto d-block' src='http://localhost/sjx/admin/img/imagenesPlantas/" + imagen + "' >" + "<br>" +
                    '<hr>' +
                    "<form  action='http://localhost/sjx/admin/editarPlanta' method='post'>" +
                    "<input type='hidden' name='id_planta' value='" + id_planta + "'>" +
                    "<input class='btn_planta' style='border: none; border-radius: 12px; font-size: 18px;padding: 12px 12px; width: 80%;color: #fff; background-color: #556ee6; border-color: #556ee6; box-shadow: 12px 14px 22px -16px rgba(0,0,0.6);'  type='submit' value='Ver mas'>" +
                    "</form>" +
                    '<br><br>' +
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
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDaOVTpren6ll6u11yVp4OMXe9e41Efsq0&callback=initMap" defer>
</script>


<?php include("template/footer.php"); ?>