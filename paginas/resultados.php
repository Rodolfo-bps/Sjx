<?php


$estado = "inactivo";
$sqlDanger = "SELECT estado FROM mapa WHERE estado = '$estado'";
if ($sqlDanger = mysqli_query($mysqli, $sqlDanger)) {
    $numDanger = mysqli_num_rows($sqlDanger);
}
$estd = "activo";
$sqlActive = "SELECT estado FROM mapa WHERE estado = '$estd'";
if ($sqlActive = mysqli_query($mysqli, $sqlActive)) {
    $sqlActive = mysqli_num_rows($sqlActive);
}






?>
<section id="resultados">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-4">
                <h3>Información recolectada del Municipio </h3>
                <p>
                    <?php echo $resultados[3]['nombre_blog']; ?>
                </p>
            </div>
            <div class="col-md-6 mt-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Localidad con mayor registros</label>
                            <?php foreach ($mayor as $r) { ?>
                                <input style="background: white; color: green;" type="text" readonly class="form-control" value="<?php echo $r; ?>">
                                <?php ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Localidad con menor registros</label>
                            <strong>
                                <ul></ul>
                                <input style="background: white; color: green;" type="text" readonly class="form-control" value="<?php foreach ($menor as $r) {
                                                                                                                                        echo $r;
                                                                                                                                    } ?>">
                            </strong>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Plantas Activas</label>
                            <input style="background: white; color: green;" type="text" readonly class="form-control" id="" value="<?php echo $sqlActive; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Plantas Inactivas</label>
                            <input style="background: white; color: green;" type="text" readonly class="form-control" id="" value="<?php echo $numDanger; ?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Registros en los últimos 7 días</label>
                            <input style="background: white; color: green;" type="text" readonly class="form-control" id="" value="<?= $sqlDias ?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Registros en el último mes</label>
                            <input style="background: white; color: green;" type="text" readonly class="form-control" id="" value="<?= $sqlMeses  ?>">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Registros en el último año</label>
                            <input style="background: white; color: green;" type="text" readonly class="form-control" id="" value="<?= $sqlAnio  ?>">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<?php }
?>