<?php

include "seccion/editarPlanta.php";
?>
<div class="tabcontent">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class=" d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Actualizar Planta</h1>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
                <form class="form-horizontal" method="POST" action="<?= SERVERURL ?>seccion/controlPlantas.php" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <input type="text" style="background: #fff;" readonly class="form-control" id="id_planta" name="id_planta" value="<?= $datosPlanta['id_planta'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="direccion" name="direccion" value="<?= $datosPlanta['direccion'] ?>">
                        </div>

                        <div class="form-group">
                            <select name="localidad" id="localidad" class="form-control">
                                <option value="<?= $datosPlanta['localidad'] ?>"><?= $datosPlanta['localidad'] ?></option>
                                <option value="Barranca Salda">Barranca Salda</option>
                                <option value="Barrio San Pedro">Barrio San Pedro</option>
                                <option value="Cañada Estaca">Cañada Estaca</option>
                                <option value="Cañada San Miguel">Cañada San Miguel</option>
                                <option value="El Carrizal">El Carrizal</option>
                                <option value="El Cuajilote">El Cuajilote</option>
                                <option value="El Mosco">El Mosco</option>
                                <option value="Gabino Barreda">Gabino Barreda</option>
                                <option value="La Huertilla">La Huertilla</option>
                                <option value="San Jeronimo Primera Seccion">San Jeronimo Primera Seccion</option>
                                <option value="San Jeronimo Segunda Seccion">San Jeronimo Segunda Seccion</option>
                                <option value="San Pedro">San Pedro</option>
                                <option value="Santo Domingo Tonahuixtla">Santo Domingo Tonahuixtla</option>
                                <option value="Cañada Sandia">Cañada Sandia</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?= $datosPlanta['descripcion'] ?>">
                        </div>
                        <div class="form-group">
                            <select name="estado" id="estado" class="form-control">
                                <?php if ($datosPlanta['estado'] == "activo") : ?>
                                    <option value="activo">Activo</option>
                                    <option value="inactivo">Inactivo</option>
                                <?php else: ?>
                                    <option value="inactivo">Inactivo</option>
                                    <option value="activo">Activo</option>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="lat" name="lat" value="<?= $datosPlanta['lat'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="lng" name="lng" value="<?= $datosPlanta['lng'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="altura" name="altura" value="<?= $datosPlanta['altura'] ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="anchura" name="anchura" value="<?= $datosPlanta['anchura'] ?>">
                        </div>

                        <div class="form-group">
                            <label for="inputEmail3" class="col-smd-2 control-label">Imagen</label><br>
                            <img src="<?= SERVERURL . "img/imagenesPlantas/" . $datosPlanta['imagen'] ?>" alt="" height="70">

                            <label for="inputEmail3" class="col-smd-2 control-label"><?= $datosPlanta['imagen'] ?></label>/
                            <input type="file" class="form-control" id="imagen" name="imagen" value="<?= $datosPlanta['imagen'] ?>">
                        </div>
                        <div class="form-group">
                       
                            <select name="especie" id="especie" class="form-control">
                                <option value="<?= $datosPlanta['especie'] ?>"><?= $datosPlanta['especie'] ?></option>

                                <?php while ($row = $categorias->fetch_assoc()) {
                                    if ($datosPlanta['especie'] == $row['nombre_categoria']) {
                                ?>
                                    <?php
                                    } else { ?>
                                        <option value="<?php echo $row['nombre_categoria']; ?>">
                                            <?php echo $row['nombre_categoria']; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>

                    </div>

                    <div class="form-group">
                        <input type="text" hidden class="form-control" id="fecha_actualizacion" name="fecha_actualizacion" value="<?= $datosPlanta['fecha_actualizacion'] = date('Y-m-d'); ?>">

                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <a href="<?= SERVERURL . "registrosPlantas" ?>" class="btn btn-default">Regresar </a>
                        <button type="submit" class="btn btn-info pull-right" name="btn_actualizar">Actualizar</button>
                    </div>
                    <!-- /.box-footer -->
                </form>
            </div>
        </div>
    </div>
</div>