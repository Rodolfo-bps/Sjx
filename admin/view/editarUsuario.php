<?php




if (isset($_REQUEST['btn_editar_perfil'])) {

    $id = $_POST['id_usuario'];

    $updateSQL = "SELECT * FROM usuarios WHERE id_usuario = '$id' ";
    $update = mysqli_query($mysqli, $updateSQL);
    
    while ($row = mysqli_fetch_array($update)) {
    
        $idUser = $row[0];
        $nombre_usuario = $row[1];
        $nombre = $row[2];
        $apellidos = $row[3];
        $correo = $row[4];
        $img = $row[8];
    }
    
}

?>




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
                <form class="form-horizontal" method="POST" action="<?=SERVERURL?>seccion/controlUsuarios.php" enctype="multipart/form-data">
                    <div class="box-body">
                        <div class="form-group">
                            <input type="text" readonly class="form-control" id="id_usuario" name="id_usuario" value="<?php echo $idUser ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" value="<?php echo $nombre_usuario; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $apellidos; ?>">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $correo; ?>">
                        </div>
                        <?php

                        if ($id_usuario == $idUser) { ?>

                            <div class="form-group">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Escribe tu Password">
                            </div>

                            <div class="form-group">
                                <input type="password" class="form-control" id="passwordNew" name="passwordNew" placeholder="Escribe tu nuevo Password">
                            </div>

                        <?php  } ?>


                        <div class="form-group">
                            <label for="inputEmail3" class="col-smd-2 control-label">Imagen <br> <small>Solo se aceptan archivos .png y .jpg</small></label><br>

                            <img src="<?= SERVERURL."img/imagenesUsuarios/" . $img ?>" alt="" height="70">
                            <input type="file" class="form-control" id="imagen" name="imagen" value="<?php echo $img; ?>">
                        </div>

                    </div>

                    <div class="modal-footer">
                        <a href="usuarios.php" type="buttom" class="btn btn-danger pull-left" data-dismiss="modal"><i class="bi bi-x-circle-fill"></i> Cancelar</a>
                        <button type="submit" class="btn btn-primary" name="btn_actualizar"><i class="bi bi-check2-circle"></i> Actualizar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

