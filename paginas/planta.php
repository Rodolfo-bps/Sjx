<?php
/*
$vistaPagina =  !empty($vistaPagina) ? true : false;
if($vistaPagina==false) { 
    header('location: ../index.php');
    exit("No se tiene permitido el acceso a esta pagina..."); 
}
*/
include("admin/config/conexion.php");


// variable de formulario
$id_planta = !empty($_POST['id_planta']) ? $_POST['id_planta'] : 0;
// consultamos registro segun ID
$r = mysqli_query($mysqli, "SELECT * FROM mapa WHERE id_planta = '$id_planta' ");
// verificamos existencia de registro
if (mysqli_num_rows($r) == false) {
    exit("No se encontro un ID a editar: " . $id_planta);
}
// guardamos datos de registro en variable y liberamos consulta
$resultado = mysqli_fetch_array($r);
mysqli_free_result($r);



?>


<section class="bg-light">
    <div class="container">
        <div class="row">
                <div class="col-md-4">
                    <br><br><br><br><br>
                    <img style="box-shadow: 12px 14px 22px -16px rgba(0,0,0.6);" src="admin/img/imagenesPlantas/<?= $resultado['imagen'] ?>" class="img-thumbnail" alt="" width="100%">
                </div>
                <div class="col-md-8">
                    <br><br><br>
                    <h3>Planta ID <?php echo $resultado["id_planta"] ?></h3>


                    <form class="row g-3" style="background: #fff; padding: 12px; box-shadow: 12px 14px 22px -16px rgba(0,0,0.6);">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Latitud</label>
                            <strong>
                                <input type="text" style="color:green; background: white; border-radius:8px; border: none; border-bottom: 1px solid gray ; color: green;" readonly class="form-control" value="<?= $resultado["lat"] ?>" id="inputEmail4">
                            </strong>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Longitud</label>
                            <strong>
                                <input type="text" style="color:green; background: white; border-radius:8px; border: none; border-bottom: 1px solid gray ; color: green;" readonly class="form-control" value="<?= $resultado["lng"] ?>">
                            </strong>
                        </div>
                        <div class="col-12">
                            <label for="inputAddress" class="form-label">Direccion</label>
                            <strong>
                                <input type="text" style="color:green; background: white; border-radius:8px; border: none; border-bottom: 1px solid gray ; color: green;" readonly class="form-control" value="<?= $resultado["direccion"] ?>">
                            </strong>
                        </div>
                        <div class="col-12">
                            <label for="inputAddress2" class="form-label">Descripcion</label>
                            <strong>
                                <input type="text" style="color:green; background: white; border-radius:8px; border: none; border-bottom: 1px solid gray ; color: green;" readonly class="form-control" value="<?=$resultado["descripcion"] ?>">
                            </strong>
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Altura</label>
                            <strong>
                                <input type="text" style="color:green; background: white; border-radius:8px; border: none; border-bottom: 1px solid gray ; color: green;" readonly class="form-control" value="<?= $resultado["altura"] ?>" id="inputEmail4">
                            </strong>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Anchura</label>
                            <strong>
                                <input type="text" style="color:green; background: white; border-radius:8px; border: none; border-bottom: 1px solid gray ; color: green;" readonly class="form-control" value="<?= $resultado["anchura"] ?>">
                            </strong>
                        </div>
                        <div class="col-md-6">
                            <label for="inputCity" class="form-label">Estado</label>
                            <strong>
                                <input style="color:green; background: white;border-radius:8px; border: none; border-bottom: 1px solid gray ; color: green;" type="text" readonly class="form-control" value="<?= $resultado['estado'] ?>">
                            </strong>
                        </div>

                        <br><br>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-4"><br>
                            <a href="galeria" style="box-shadow: 12px 14px 22px -16px rgba(0,0,0.6);" class="btn btn-danger">Regresar</a>
                        </div>
                    </form>
                    <br><br><br><br>
                </div>


        </div>
    </div>
</section>

