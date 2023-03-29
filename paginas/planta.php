<?php
include("admin/config/conexion.php");
if (isset($_POST)) {
    $id_planta =  $_POST["id_planta"];
    $sql =  ("SELECT * FROM mapa WHERE id_planta = '$id_planta'");
    $resultado = mysqli_query($mysqli, $sql);
}

?>


<section class="bg-light">
    <div class="container">
        <div class="row">
            <?php foreach ($resultado as $plantaInf) { ?>
                <div class="col-md-4">
                    <br><br><br><br><br>
                    <img src="admin/img/imagenesPlantas/<?php echo $plantaInf['imagen'] ?>" 
                    class="img-thumbnail" alt="" width="100%">
                </div>
                <div class="col-md-8">
                    <br><br><br>
                    <h3>Planta ID <?php echo $plantaInf["id_planta"] ?></h3>


                    <form class="row g-3" style="background: #fff; padding: 12px;">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Latitud</label>
                            <input type="text" readonly class="form-control" 
                            value="<?php echo $plantaInf["lat"] ?>" id="inputEmail4">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Longitud</label>
                            <input type="text" readonly class="form-control" 
                            value="<?php echo $plantaInf["lng"] ?>">
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Direccion</label>
                            <input type="text" readonly class="form-control" 
                            value="<?php echo $plantaInf["direccion"] ?>">
                        </div>
                        <div class="col-12">
                            <label for="inputAddress2" class="form-label">Descripcion</label>
                            <input type="text" readonly class="form-control" 
                            value="<?php echo $plantaInf["descripcion"] ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="inputCity" class="form-label">Estado</label>
                            <strong>
                                <input style="color:green;" type="text" readonly 
                                class="form-control" value="Activo">
                            </strong>
                        </div>
                        <div class="col-md-6">
                            <label for="inputCity" class="form-label">Fecha</label>
                            <input type="date" readonly class="form-control">
                        </div>
                        <br><br>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4"><br>
                            <a href="index.php" class="btn btn-danger">Regresar</a>
                        </div>
                    </form>
                    <br><br><br><br>
                </div>
            <?php } ?>


        </div>
    </div>
</section>