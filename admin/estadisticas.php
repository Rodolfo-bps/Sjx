<?php
include("seccion/sesiones.php");


?>

<!-- Sidebar -->
<?php include("template/menu.php") ?>
<!-- End of Sidebar -->

<!-- Topbar -->
<?php include("template/header.php") ?>

<!-- End of Topbar -->

<?php

$sql2 = "SELECT * FROM reporteindice";
$rel = mysqli_query($mysqli, $sql2);

?>


<div class="container">
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <!-- Bar Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Echinocactus platyacanthus</h6>
                </div>
                <div class="card-body">
                    <div class="">

                        <canvas id="grafica"></canvas>
                        <script type="text/javascript" src="vendor/js/script.js"></script>
                    </div>
                    <hr>
                    Resultados de recolecta de informacion.
                </div>
            </div>


            <!-- tabla -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Echinocactus platyacanthus</h6>
                </div>
                <div class="card-body">
                    <div class="">

                        <table id="example" class="table table-striped table-bordered tabla" cellspacing="0" width="100%">



                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>localidad con Mayor Plantas</th>
                                    <th>Fecha de Registro</th>
                                    <th>localidad con Menor Plantas</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>localidad con Mayor Plantas</th>
                                    <th>Fecha de Registro</th>
                                    <th>localidad con Menor Plantas</th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php while ($row = $rel->fetch_assoc()) { ?>
                                    <tr>
                                        <td><?php echo $row['id_mayor_indice']; ?></td>
                                        <td><?php echo $row['mayor']; ?></td>
                                        <td><?php echo $row['fecha_reporte']; ?></td>
                                        <td><?php echo $row['menor']; ?></td>

                                        <td>
                                            <form method="post" action="seccion/controlPlantas.php">
                                                <input type="hidden" name="id_mayor_indice" id="id_mayor_indice" value="<?php echo $row['id_mayor_indice']; ?>" />
                                                <button class="btn btn-danger btn-circle" type="submit" name="btn_eliminar_reporte"><i class="bi bi-trash3"></i></button>
                                            </form>


                                        </td>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                    <hr>
                    Resultados de recolecta de informacion.
                </div>
            </div>
        </div>
        <!-- Pie Chart -->



        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Donut Chart</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <form action="seccion/controlPlantas.php" method="post">
                        <?php include("seccion/datos_grafica.php"); ?>
                        <label for="">Localidades con mayor plantas</label>
                        <?php foreach ($mayor as $r) { ?>
                            <input style="background: white;" type="text" readonly class="form-control" name="mayor" id="mayor" value="<?php echo $r; ?>">
                        <?php } ?>
                        <br>
                        <?php
                        $fechaActual = date('d-m-Y');

                        ?>
                        <input style="background: white;" type="text" class="form-control" name="fecha" id="fecha" value="<?= $fechaActual ?>">

                        <label for="">Localidades con menor plantas</label>
                        <textarea style="background: white;" type="text" readonly class="form-control" cols="30" rows="10" name="menor" id="menor"><?php foreach ($menor as $r) {
                                                                                                                                                        echo " " . $r . " ";
                                                                                                                                                    } ?></textarea>
                        <br>

                        <button type="submit" name="btn_reporte_planta" class="btn btn-primary pull-right">Crear Reporte</button>
                    </form>

                </div>
            </div>

        </div>

    </div>



</div>







<?php include("template/footer.php"); ?>