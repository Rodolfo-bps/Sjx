<?php

if ($tipo_usuario == 1) {
    $where = "";
} else if ($tipo_usuario = 2) {
    $where = "WHERE id_usuario = '$id_usuario'";
}
$sql2 = "SELECT * FROM usuarios $where";
$rel = mysqli_query($mysqli, $sql2);


?>



<div class="tabcontent">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class=" d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> Usuarios</h1>
            <?php

            if ($tipo_usuario == 1) {
            ?>
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" data-toggle="modal" data-target="#agregar"><i class="bi bi-person-plus">

                    </i> Agregar Nuevo Usuario</a>
            <?php
            }
            ?>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabla de Usuarios</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="table table-striped table-bordered tabla" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Usuario</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Correo</th>
                                <th>Rol</th>
                                <th>Imagen</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Usuario</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Correo</th>
                                <th>Rol</th>
                                <th>Imagen</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php while ($row = $rel->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $row['id_usuario']; ?></td>
                                    <td><?php echo $row['nombre_usuario']; ?></td>
                                    <td><?php echo $row['nombre']; ?></td>
                                    <td><?php echo $row['apellidos']; ?></td>
                                    <td><?php echo $row['correo']; ?></td>
                                    <td><?php echo $row['rol']; ?></td>
                                    <td>
                                        <img style="width: 80px;" src="<?= SERVERURL
                                                                            . "img/imagenesUsuarios/" . $row['imagen']; ?>" alt="">
                                    </td>

                                    <?php if ($id_usuario == $row['id_usuario']) { ?>
                                        <td>

                                            <form action="<?= SERVERURL ?>editarUsuario" method="post">
                                                <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $row['id_usuario']; ?> ">
                                                <button style="color: #fff;" class="btn btn-warning btn-circle" type="submit" name="btn_editar_perfil">
                                                    <i class="bi bi-pencil"></i></button>
                                            </form>

                                            <form action="<?= SERVERURL ?>perfilUsuario" method="post">
                                                <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $row['id_usuario']; ?> ">
                                                <button style="color: #fff;" class="btn btn-success btn-circle" type="submit" name="btn_editar_perfil">
                                                    <i class="bi bi-eye"></i></button>
                                            </form>

                                        </td>

                                    <?php } else { ?>
                                        <td>
                                            <form method="post" action="<?= SERVERURL ?>editarUsuario">
                                                <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $row['id_usuario']; ?>" />
                                                <button style="color: #fff;" class="btn btn-warning btn-circle" type="submit" name="btn_editar_perfil">
                                                    <i class="bi bi-pencil"></i></button>
                                            </form>
                                            <form method="post" action="<?= SERVERURL ?>seccion/controlUsuarios.php">
                                                <input type="hidden" name="id_usuario" id="id_usuario" value="<?php echo $row['id_usuario']; ?>" />
                                                <button class="btn btn-danger btn-circle" type="submit" name="btn_eliminar"><i class="bi bi-trash3"></i></button>
                                            </form>




                                        </td>
                                    <?php } ?>

                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <?php

                    include("config/conexion.php");
                    //saber numero de usuarios
                    $sqlUser = "SELECT * FROM usuarios";

                    if ($resulUser = mysqli_query($mysqli, $sqlUser)) {
                        $numUser = mysqli_num_rows($resulUser);
                    }

                    ?>

                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <h4>
                            Número de usuarios <span class="text-success"><strong><?= $numUser ?></strong></span>
                        </h4>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Agregar Usuarios-->
<div class="modal fade" id="agregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header ">
                <h5 class="modal-title">Agregar Usuario</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="<?= SERVERURL ?>seccion/controlUsuarios.php" 
                enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" 
                                placeholder="Nombre de Usuario">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="correo" name="correo" placeholder="Correo">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                                <?php $pass = "Sjx101"; ?>
                                <input type="password" class="form-control" id="password" name="password" value="<?= $pass ?>"
                                 placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10">
                                <select name="rol" id="rol" class="form-control" placeholder="Rol">
                                    <option value="Administrador Web">Administrador Web</option>
                                    <option value="Usuario Estandar">Usuario</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail3" class="col-smd-2 control-label">Imagen</label>

                            <div class="col-sm-10">
                                <img src="<?= $imagen ?>" alt="">
                                <input type="file" class="form-control" id="imagen" name="imagen">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal"> <i class="bi bi-x-circle-fill"></i> Cancelar</button>
                        <button type="submit" class="btn btn-primary" name="btn_guardar"><i class="bi bi-check2-circle"></i> Guardar</button>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>