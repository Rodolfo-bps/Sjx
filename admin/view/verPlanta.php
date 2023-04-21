<?php
$id_planta = $_GET['id_planta'];

$sql = "SELECT * FROM mapa WHERE id_planta = '$id_planta' ";
$update = mysqli_query($mysqli, $sql);

while ($row = $update->fetch_assoc()) {

    $idPlanta = $row['id_planta'];
    $localidad = $row['localidad'];
    $direccion = $row['direccion'];
    $descripcion = $row['descripcion'];
    $imagen = $row['imagen'];
    $estado = $row['estado'];
    $latitud = $row['lat'];
    $longitud = $row['lng'];
    $altura = $row['altura'];
    $anchura = $row['anchura'];
}

?>




<div class="tabcontent">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <div class=" d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Informacion de la biznaga</h1>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
                <form class="form-horizontal" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <input readonly type="text" readonly class="form-control" id="id_planta" name="id_planta" value="<?php echo $idPlanta ?>">
                        </div>
                        <div class="form-group">
                            <input readonly type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $direccion; ?>">
                        </div>
                        <div class="form-group">
                            <select readonly name="localidad" id="localidad" class="form-control">
                                <option value="<?php echo $localidad ?>"><?php echo $localidad ?></option>
                               
                            </select>
                        </div>
                        <div class="form-group">
                            <input readonly type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $descripcion; ?>">
                        </div>
                        <div class="form-group">
                            <select readonly name="estado" id="estado" class="form-control">
                                <?php if ($estado == "activo") { ?>
                                    <option value="activo">Activo</option>
                                    <option value="inactivo">Inactivo</option>
                                <?php } else { ?>
                                    <option value="inactivo">Inactivo</option>
                                    <option value="activo">Activo</option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input readonly type="text" class="form-control" id="lat" name="lat" value="<?php echo $latitud; ?>">
                        </div>
                        <div class="form-group">
                            <input readonly type="text" class="form-control" id="lng" name="lng" value="<?php echo $longitud; ?>">
                        </div>
                        <div class="form-group">
                            <input readonly type="text" class="form-control" id="altura" name="altura" value="<?php echo $altura; ?>">
                        </div>
                        <div class="form-group">
                            <input readonly type="text" class="form-control" id="anchura" name="anchura" value="<?php echo $anchura; ?>">
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-smd-2 control-label">Imagen</label><br>
                            <img src="<?= SERVERURL."img/imagenesPlantas/".$imagen ?>" width="50%" height="50%">
                            <?= SERVERURL. "Imagen:  ".$imagen; ?>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>
</div>


