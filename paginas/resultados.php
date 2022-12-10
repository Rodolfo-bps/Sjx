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



$localidades = ("SELECT * FROM reporteIndice LIMIT 1");
$rel = mysqli_query($mysqli, $localidades);
while ($row = $rel->fetch_assoc()) {





?>
    <section id="resultados">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mt-4">
                    <h3>Informacion recolectada de las <b>biznagas</b></h3>
                    <p>
                        Se debe ampliar el conocimiento de las cactáceas y demás plantas suculentas mediante diversas estrategias educativas dirigidas a los diferentes sectores de la población, realizando actividades orientadas a conservar el hábitat, fomentar la formación de jardines de cactáceas, concientizar a la sociedad mexicana sobre la importancia de la conservación de la riqueza de esta flora de Nuevo León y integrar archivos fotográficos y de localidades de las plantas en su hábitat. (Sánchez et al. 2010, pág. 3).
                    </p>
                </div>
                <div class="col-md-6 mt-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Localidad con mayor registros</label>

                                <input style="background: white; color: green;" type="text" readonly class="form-control" value="<?php echo $row['mayor']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Localidad con menor registros</label>


                                <strong>
                                    <input style="background: white; color: green;" type="text" readonly class="form-control" value="<?php echo $row['menor']; ?>">

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
                                <label for="">Registros en el ultimo dia</label>
                                <input style="background: white; color: green;" type="text" readonly class="form-control" id="" value="<?php echo $row['dia_ultimo']; ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Registros en el ultimo mes</label>
                                <input style="background: white; color: green;" type="text" readonly class="form-control" id="" value="<?php echo $row['mes_ultimo']; ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Registros en el ultimo anio</label>
                                <input style="background: white; color: green;" type="text" readonly class="form-control" id="" value="<?php echo $row['anio_ultimo']; ?>">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

<?php }
?>