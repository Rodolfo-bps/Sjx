<?php include "seccion/editarUsuario.php"; ?>

<div class="tabcontent">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class=" d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"> Actualizar Usuario</h1>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
                <form class="form-horizontal" method="POST" action="<?= SERVERURL ?>seccion/controlUsuarios.php" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-row">

                            <div class="col-md-6 mb-3">
                                <input type="text" readonly style="background: #fff;" class="form-control" id="id_usuario" name="id_usuario" value="<?= $datosUsuario['id_usuario'] ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" readonly style="background: #fff;" class="form-control" id="id_sesion" name="id_sesion" value="<?= $id_usuario ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" value="<?= $datosUsuario['nombre_usuario'] ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?= $datosUsuario['nombre'] ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?= $datosUsuario['apellidos'] ?>">
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="email" class="form-control" id="correo" name="correo" value="<?= $datosUsuario['correo'] ?>">
                            </div>
                            <?php

                            if ($id_usuario == $datosUsuario['id_usuario']): ?>
                                <div class="col-md-6 mb-3">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Escribe tu Password">
                                </div>

                                <div class="col-md-6 mb-3">
                                    <input type="password" class="form-control" id="passwordNew" name="passwordNew" placeholder="Escribe tu nuevo Password">
                                </div>

                            <?php endif; ?>


                            <div class="col-md-6 mb-3">
                                <label for="inputEmail3" class="col-smd-2 control-label">Imagen <br>
                                    <small>Solo se aceptan archivos .png y .jpg</small></label><br>
                                <img src="<?= SERVERURL . "img/imagenesUsuarios/" . $datosUsuario['imagen'] ?>" alt="" height="70">
                                <input type="file" class="form-control" id="imagen" name="imagen" value="<?= $datosUsuario['imagen'] ?>">
                            </div>

                        </div>

                        <div class="modal-footer">
                            <?php
                            if ($id_usuario == $datosUsuario['id_usuario']):
                            ?>
                                <a href="<?= SERVERURL . "perfilUsuario" ?>" type="buttom" class="btn btn-danger pull-left" data-dismiss="modal"><i class="bi bi-x-circle-fill"></i> Cancelar</a>
                            <?php else : ?>
                                <a href="<?= SERVERURL . "usuarios" ?>" type="buttom" class="btn btn-danger pull-left" data-dismiss="modal"><i class="bi bi-x-circle-fill"></i> Cancelar</a>
                            <?php endif; ?>
                            <button type="submit" class="btn btn-primary" name="btn_actualizar"><i class="bi bi-check2-circle"></i> Actualizar</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>