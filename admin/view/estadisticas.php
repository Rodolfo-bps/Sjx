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
                        <script type="text/javascript" src="<?= SERVERURL ?>vendor/js/script.js"></script>
                    </div>
                    <hr>
                    Resultados de recolecta de información.
                </div>
            </div>
            <!-- tabla -->
        </div>
        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Crear Reporte</h6>
                </div>
                <!-- Card Body -->
                <?php include("seccion/datos_grafica.php") ?>

                <div class="card-body">
                    <form action="http://localhost/sjx/admin/seccion/controlPlantas.php" method="post">
                        <?php include("seccion/datos_grafica.php"); ?>
                        <label for="">Localidades con mayor plantas</label>
                        <?php foreach ($mayor as $r): ?>
                            <input style="background: white;" type="text" readonly class="form-control" name="mayor" id="mayor" value="<?php echo $r; ?>">
                        <?php endforeach; ?>
                        <br>

                        <?php
                        $fechaActual = date('Y-m-d');
                        ?>
                        <input style="background: white;" type="hidden" class="form-control" name="fecha" id="fecha" value="<?= $fechaActual ?>">

                        <label for="">Localidades con menor plantas</label>
                        <textarea style="background: white;" type="text" readonly class="form-control" cols="30" rows="10" name="menor" id="menor"><?php foreach ($menor as $r) {
                                                                                                                                                        echo " " . $r . " ";
                                                                                                                                                    } ?></textarea>
                        <br>

                        <label for="">Registros en los últimos 7 días</label>
                        <input style="background: white;" type="text" readonly class="form-control" name="dia_ultimo" id="dia_ultimo" value="<?php echo $sqlDias; ?>">
                        <br>

                        <label for="">Registros en el último mes</label>
                        <input style="background: white;" type="text" readonly class="form-control" name="mes_ultimo" id="mes_ultimo" value="<?php echo $sqlMeses; ?>">
                        <br>

                        <label for="">Registros en el último año</label>
                        <input style="background: white;" type="text" readonly class="form-control" name="anio_ultimo" id="anio_ultimo" value="<?php echo $sqlAnio; ?>">
                        <br>

                        <button type="submit" name="btn_reporte_planta" class="btn btn-primary pull-right">Crear Reporte</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$sql2 = "SELECT * FROM reporteindice";
$rel = mysqli_query($mysqli, $sql2);
?>
<div class="container">
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-12 col-lg-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Tabla de Reportes</h6>
                </div>
                <div class="card-body">
                    <div class="">
                        <table id="example" class="table table-striped table-bordered tabla" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Mayor Plantas</th>
                                    <th>Fecha de Registro</th>
                                    <th>Menor Plantas</th>
                                    <th>Último día</th>
                                    <th>Último mes</th>
                                    <th>Último anio</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Mayor Plantas</th>
                                    <th>Fecha de Registro</th>
                                    <th>Menor Plantas</th>
                                    <th>Último día</th>
                                    <th>Último mes</th>
                                    <th>Último anio</th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php while ($row = $rel->fetch_assoc()): ?>
                                    <tr>
                                        <td><?= $row['id_mayor_indice'] ?></td>
                                        <td><?= $row['mayor'] ?></td>
                                        <td><?= $row['fecha_reporte'] ?></td>
                                        <td><?= $row['menor'] ?></td>
                                        <td><?= $row['dia_ultimo'] ?></td>
                                        <td><?= $row['mes_ultimo'] ?></td>
                                        <td><?= $row['anio_ultimo'] ?></td>
                                        <td>
                                            <form method="post" action="http://localhost/sjx/admin/seccion/controlPlantas.php">
                                                <input type="hidden" name="id_mayor_indice" id="id_mayor_indice" value="<?php echo $row['id_mayor_indice']; ?>" />
                                                <button class="btn btn-danger btn-circle" type="submit" name="btn_eliminar_reporte"><i class="bi bi-trash3"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>

                            </tbody>
                        </table>
                    </div>
                    <hr>
                    Resultados de recolecta de informacion.
                </div>
            </div>

        </div>
    </div>
</div>