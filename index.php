<?php
/*
$vistaPagina = true; // sirve para ocultar una pagina que no se debe de mostrar fuera del index
$nav_ver =  !empty($_GET["ver"]) ? $_GET["ver"] : '';

if(!empty($nav_ver)){
    $ruta = "paginas/".$nav_ver.".php";
    $permitidos = ['principal','miperfil'];
    if(file_exists($ruta) && in_array($nav_ver,$permitidos)) {
        require($ruta);
    }
    else { echo "no existe seccion ".$nav_ver; }
}
*/

include("admin/config/conexion.php");

include("paginas/grafica.php");
$sqlMapa = "SELECT * FROM mapa";
$rel = mysqli_query($mysqli, $sqlMapa);

$sqlBlog = "SELECT nombre_blog FROM blog";
$rel2 = mysqli_query($mysqli, $sqlBlog);

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

<?php
$resultados = array();
while ($row2 = $rel2->fetch_assoc()) {

    array_push($resultados, $row2);
}


include_once("template/header.php");

if (isset($_GET['paginas'])) {
    $views = explode("/", $_GET['paginas']);
    $view_file = 'paginas/' . $views[0] . '.php';
    if (file_exists($view_file)) {
        include_once $view_file;
    } else {
        http_response_code(404);
        echo '<h1 style="color:red;" class="alert alert-danger" role="alert">Error: Página no encontrada</h1>';
    }
} else {
}



include_once("template/footer.php");
?>
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
                    parseFloat(markerElem.getAttribute('lng')));
                const contentString =
                    '<div id="content" style="width: 300px; height: 300px; text-align: center; font-family: Arial, sans-serif; background-color: #f2f2f2; padding: 20px;">' +
                    '<p style="color: #495057; font-size: 18px;"><i class="fa fa-fw fa-map-marker"></i>' + direccion + '</p>' +
                    '<div style="margin-top: 20px;">' +
                    '<img alt="90" style="display: block; margin: 0 auto; max-width: 100%; box-shadow: 0px 4px 8px rgba(76, 175, 80, 0.3);" src="admin/img/imagenesPlantas/' + imagen + '">' +
                    '</div>' +
                    '<form action="planta.php" method="post" style="margin-top: 20px;">' +
                    '<input type="hidden" name="id_planta" value="' + id_planta + '">' +
                    '<input class="btn_planta" style="display: block; margin: 0 auto; background-color: #4CAF50; color: white; border: none; padding: 10px 20px; font-size: 16px; cursor: pointer; box-shadow: 0px 4px 8px rgba(76, 175, 80, 0.3);" type="submit" value="Ver más">' +
                    '</form>' +
                    '</div>';


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
    //AIzaSyDaOVTpren6ll6u11yVp4OMXe9e41Efsq0
    //AIzaSyBi_XXphyPu7eBBXEWbJYJNp79RkuJrEK4
    function doNothing() {}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDaOVTpren6ll6u11yVp4OMXe9e41Efsq0&callback=initMap" defer>
</script>

</body>

</html>