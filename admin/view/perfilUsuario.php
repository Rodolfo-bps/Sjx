<?php

if (isset($_SESSION['id_usuario'])) {
    $sql = ("SELECT * FROM usuarios WHERE id_usuario='$id_usuario' ");
    $resultado = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($resultado)) {
        $id = $row[0];
        $nombre_usuario = $row[1];
        $nombre = $row[2];
        $apellidos = $row[3];
        $correo = $row[4];
        $password = $row[5];
        $rol = $row[6];
        $tipo_usuario = $row[7];
        $imagen = $row[8];
    }
}




?>

<div class="tabcontent">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Mi Perfil </h1>
        <div class="row">
            <div class="col-lg-12">
                <!-- Circle Buttons -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Datos del Usuario</h6>
                    </div>
                    <div class="card-body">
                        <form class="needs-validation" novalidate>
                            <div class="col-md-3 mb-">
                                <img src="<?= SERVERURL . "img/imagenesUsuarios/" . $imagen ?>" alt="" width="50%" height="50%">
                            </div><br>
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Usuario</label>
                                    <input type="text" readonly class="form-control" id="nombre_usuario" name="nombre_usuario" 
                                    value="<?= $nombre_usuario ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Nombre</label>
                                    <input type="text" readonly class="form-control" id="nombre" id="nombre" value="<?= $nombre ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom01">Apellidos</label>
                                    <input type="text" readonly class="form-control" id="apellidos" name="apellidos" value="<?= $apellidos ?>">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Correo</label>
                                    <input type="email" readonly class="form-control" id="correo" name="correo" value="<?= $correo ?>">

                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom02">Rol</label>
                                    <input type="text" readonly class="form-control" id="rol" name="rol" value="<?= $rol ?>">
                                </div>
                            </div>


                        </form>
                        <form action="<?=SERVERURL?>editarUsuario" method="post">
                            <input type="hidden" id="id_usuario" name="id_usuario" value="<?php echo $id; ?> ">
                            <button class="btn btn-primary" type="submit" name="btn_editar_perfil">Editar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Main Content -->
</div>