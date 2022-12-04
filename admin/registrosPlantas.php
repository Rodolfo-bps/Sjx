<?php
include("seccion/sesiones.php");

$sqlMapa = "SELECT * FROM mapa";
$rel = mysqli_query($mysqli, $sqlMapa);



?>

<!-- Sidebar -->
<?php include("template/menu.php") ?>
<!-- End of Sidebar -->

<!-- Topbar -->
<?php include("template/header.php") ?>
<!-- End of Topbar -->
<style>
    .rojo {
        color: red;
    }

    .verde {
        color: green;
    }
</style>
<div class="tabcontent">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <!-- Page Heading -->
        <div class=" d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="bi bi-geo-alt" style="font-size: 2rem;"></i> Plantas</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#agregarPlanta"><i class="bi bi-geo-alt"></i> Agregar Planta</a>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabla de Plantas</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered tabla" style="font-size: 13px;" id="example" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Dirección</th>
                                <th>Localidad</th>
                                <th>Descripcion</th>
                                <th>Estado</th>
                                <th>Latitud</th>
                                <th>Longitud</th>
                                <th>Categoria</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Dirección</th>
                                <th>Localidad</th>
                                <th>Descripcion</th>
                                <th>Estado</th>
                                <th>Latitud</th>
                                <th>Longitud</th>
                                <th>Categoria</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php while ($row = $rel->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $row['direccion']; ?></td>
                                    <td><?php echo $row['localidad']; ?></td>
                                    <td><?php echo $row['descripcion']; ?></td>
                                    <td>
                                        <a href="verPlanta.php?id_planta=<?php echo $row['id_planta']; ?> " target="_blank" class="btn btn-sm   <?php echo $row['estado'] == 'activo' ? 'btn-success' : 'btn-danger'; ?>"><?php echo $row['estado']; ?></a>
                                    </td>
                                    <td><?php echo $row['lat']; ?></td>
                                    <td><?php echo $row['lng']; ?></td>

                                    <td>
                                        <p class="btn btn-sm" ><?php echo $row['categoria']; ?></p>

                                    </td>
                                    <td>
                                        <div class="btn-group btn-group-toggle">
                                            <a href="editarPlanta.php?id_planta=<?php echo $row['id_planta']; ?> " class="btn btn-warning btn-circle">
                                                <i class="bi bi-arrow-repeat"></i>
                                            </a>

                                            <form method="post" action="seccion/controlPlantas.php">
                                                <input type="hidden" name="id_planta" id="id_planta" value="<?php echo $row['id_planta']; ?>" />
                                                <button class="btn btn-danger btn-circle" type="submit" name="btn_eliminar"><i class="bi bi-trash3"></i></button>
                                            </form>
                                        </div>


                                    </td>

                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>

                    <div class="row">
                        <?php

                        //saber numero de usuarios
                        $sqlUser = "SELECT * FROM mapa";

                        if ($resulUser = mysqli_query($mysqli, $sqlUser)) {
                            $numUser = mysqli_num_rows($resulUser);
                        }

                        ?>

                        <div class="col-md-4">
                            <h4>
                                Numero de plantas <span class="text-success"><strong><?= $numUser ?></strong></span>
                            </h4>




                        </div>
                        <br><br>



                    </div>

                </div>
            </div>
        </div>
    </div>
</div>






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
                <form method="post" action="seccion/controlPlantas.php" enctype="multipart/form-data">
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="bi bi-geo-alt"></i></div>
                        </div>
                        <input required type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección">
                    </div>
                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="bi bi-geo-alt"></i></div>
                        </div>
                        <select required name="localidad" id="localidad" class="form-control">
                            <option value="Barranca Salada">Barranca Salda</option>
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

                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="bi bi-list"></i></div>
                        </div>
                        <input required type="text" class="form-control" id="descripcion" name="descripcion" placeholder="Descripción">
                    </div>

                    <div class="form-group has-feedback" bis_skin_checked="1">
                        <div class="btn btn-default btn-file" bis_skin_checked="1">
                            <i class="fas fa-paperclip"></i> Adjuntar Imagen de la planta
                            <input required type="file" id="imagen" name="imagen">
                        </div>
                    </div>

                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="bi bi-geo-alt"></i></div>
                        </div>
                        <select required name="estado" id="estado" class="form-control">
                            <option value="activo">Activo</option>
                            <option value="inactivo">Inactivo</option>
                        </select>
                    </div>

                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="bi bi-geo-alt"></i></div>
                        </div>
                        <input required type="text" class="form-control" id="lat" name="lat" placeholder="Latitud">
                    </div>

                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="bi bi-geo-alt"></i></div>
                        </div>
                        <input required type="text" class="form-control" id="lng" name="lng" placeholder="Longitud">

                    </div>

                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="bi bi-geo-alt"></i></div>
                        </div>
                        <?php

                        $sqlCategorias = ("SELECT * FROM `categorias`");
                        $categorias = mysqli_query($mysqli, $sqlCategorias);

                        ?>
                        <select required name="categoria" id="categoria" class="form-control">
                            <?php while ($row = $categorias->fetch_assoc()) { ?>

                                <option value="<?php echo $row['nombre_categoria']; ?>"><?php echo $row['nombre_categoria']; ?></option>
                            <?php } ?>

                        </select>


                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"><i class="bi bi-x-circle-fill"></i> Cancelar</button>
                        <button type="submit" class="btn btn-primary" name="btn_guardar"><i class="bi bi-check2-circle"></i> Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include("template/footer.php"); ?>