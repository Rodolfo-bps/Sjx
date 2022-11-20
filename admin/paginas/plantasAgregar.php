<?php
include "conexion.php";

if (isset($_REQUEST['btn_eliminar'])) {

    $id = $_POST['id'];
    //borrar imagen
    $sql2 = ("SELECT imagen FROM `mapa` WHERE id_planta = '$id'");
    $imagenes = mysqli_query($conexion, $sql2);

    $nombreImagen = [];

    while ($imagen = mysqli_fetch_array($imagenes)) {
        if (isset($imagen)) {
            $nombreImagen[] = $imagen[0];
            if (file_exists("imagenes/" . $nombreImagen[0])) {
                unlink("imagenes/" . $nombreImagen[0]);
                $sql = ("DELETE FROM mapa WHERE id_planta = '$id'");
                $ejecutar = mysqli_query($conexion, $sql);
            } else {
                echo "Ocurrio un error";
            }
        }
    }
}

$sql = "SELECT * FROM mapa";
$ejecutar = mysqli_query($conexion, $sql);

?>
<div class="content-wrapper" style="min-height: 717px;">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h3 style="color: #495057"><i class="fa fa-fw fa-map-marker"></i><b>Plantas</b></h3>
                    <h5>Lista de Plantas</h5>
                    <small>En este modulo podras agregar nuevas ubicaciones de plantas</small>
                    <button type="button" class="btn" data-toggle="modal" data-target="#modal-crear-usuarios" style="color: #fff; background-color: #556ee6; border-color: #556ee6; float: right; margin-left: 12px;">
                        <i class="fa fa-fw fa-user-plus"> </i> Nueva Planta
                    </button>
                    <a href="reportes" type="button" class="btn btn-info" style="float: right;">
                        <i class="fa fa-fw fa-file-pdf-o"> </i> Generar Reporte
                    </a>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="myTable" class="table table-bordered table-striped" style="font-family:sans-serif;">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>direccion</th>
                                    <th>descripcion</th>
                                    <th>imagen</th>
                                    <th>Latitud</th>
                                    <th>Longitud</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($fila = mysqli_fetch_array($ejecutar)) { ?>
                                    <tr>
                                        <th><?php echo $fila[0]; ?></th>
                                        <th><?php echo $fila[1]; ?></th>
                                        <th><?php echo $fila[2]; ?></th>
                                        <th><?php echo $fila[3]; ?></th>
                                        <!--   <img src="imagenes/<?php /*echo $fila[3];*/ ?>" alt="" width="100">-->
                                        <th><?php echo $fila[4]; ?></th>
                                        <th><?php echo $fila[5]; ?></th>
                                        <th>
                                            <form method="post">
                                                <input type="hidden" name="id" value="<?php echo $fila[0]; ?>" />
                                                <button type="submit" name="btn_eliminar">Eliminar</button>
                                            </form>
                                        </th>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>direccion</th>
                                    <th>descripcion</th>
                                    <th>imagen</th>
                                    <th>Latitud</th>
                                    <th>Longitud</th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>




</div>


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

                //agregar
                if (isset($_REQUEST['btn_guardar'])) {
                    include("conexion.php");
                    $direccion = $_POST['direccion'];
                    $descripcion = $_POST['descripcion'];
                    $imagen = $_FILES['imagen']['name'];
                    $lat = $_POST['lat'];
                    $lng = $_POST['lng'];

                    //no se repita la imagen
                    $fecha = new DateTime();
                    $imagen = $fecha->getTimestamp() . "_" . $_FILES['imagen']['name']; //para que no se repita
                    //tratar imagen
                    $imagen_temporal = $_FILES['imagen']['tmp_name'];
                    move_uploaded_file($imagen_temporal, "imagenes/" . $imagen);

                    //insertar
                    $sql = "INSERT INTO `mapa` (`id_planta`, `direccion`, `descripcion`, `imagen`, `lat`, `lng`) VALUES (NULL, '$direccion', '$descripcion', '$imagen', '$lat', '$lng');";
                    $ejecutar = mysqli_query($conexion, $sql);

                    header("location: plantasAgregar");
                }
                ?>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>