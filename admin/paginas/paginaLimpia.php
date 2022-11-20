<?php
include "conexion.php";

$sql = "SELECT * FROM mapa";

if ($result = mysqli_query($conexion, $sql)) {
    // Return the number of rows in result set
    $rowcount = mysqli_num_rows($result);
    // Display result
    //printf("Total rows in this table :  %d\n", $rowcount);
}
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Numeros
            <small>Plantas</small>

        </h1>

    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-fw fa-map-marker"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Numero de Plantas</span>
                        <span class="info-box-number"><?php echo $rowcount; ?><small><a href="plantasAgregar">Ver todas</a></small></span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-fw fa-users"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Numero de usuarios</span>
                        <span class="info-box-number">41,410</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-fw fa-bar-chart"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Graficas</span>
                        <span class="info-box-number">760</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-yellow"><i class="ion ion-ios-people-outline"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">New Members</span>
                        <span class="info-box-number">2,000</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Mapa de San Jeronimo Xayacatlan</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <div id="map-container-google-2" class="z-depth-1-half map-container" style="height: 400px; width:100%;">
                        </div>

                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
</div>

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->


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
        downloadUrl('http://localhost/sjx/xml.php', function(data) {
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
                
                    '<h3 style="color: #495057"><i class="fa fa-fw fa-map-marker"></i>' + direccion + '</h3>' +
                   
                    '<div>' +
                    "<p><b>" + descripcion + "</b>" + "</p>" +
                    "<img alt='100'  class='rounded mx-auto d-block' src='imagenes/" + imagen + "' >" + "<br><br>" +
                    '<button type="button" class="btn" data-toggle="modal" data-target="#modal-crear-usuarios" style="color: #fff; background-color: #556ee6; border-color: #556ee6;"><i class="fa fa-fw fa-user-plus"> </i>Ver mas</button>" '+
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






<!--=====================================
Modal Crear usuarios
======================================-->
<div class="modal modal-default fade" id="modal-crear-usuarios">
    <div class="modal-dialog">
        <div class="modal-content" style="padding: 20px;">
            <div class="modal-header">
                <h4 style="color: #495057; text-align: center;"><i class="fa fa-fw fa-map-marker"></i>Agregar Nueva Planta</h4>
            </div>
            <form method="post" enctype="multipart/form-data">

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input required type="text" class="form-control" name="direccion" placeholder="direccion">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input required type="text" class="form-control" name="descripcion" placeholder="descripcion">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="form-group has-feedback" bis_skin_checked="1">
                    <div class="btn btn-default btn-file" bis_skin_checked="1">
                        <i class="fas fa-paperclip"></i> Adjuntar Imagen de perfil
                        <input type="file" name="imagen">
                    </div>
                    <img class="previsualizarImgPerfil img-fluid py-2" width='200' height='200'>
                    <p class="help-block small"> Dimensiones: 480px * 382px | Peso Max. 2MB | Formato: JPG o PNG</p>
                </div>
                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input required type="text" class="form-control" name="lat" placeholder="latitud">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback" bis_skin_checked="1">
                    <input required type="text" class="form-control" name="lng" placeholder="Longitud">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">cerrar</button>
                    <button type="submit" class="btn btn-primary" name="btn_guardar">guardar</button>
                </div>

                <?php




                ?>


            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>