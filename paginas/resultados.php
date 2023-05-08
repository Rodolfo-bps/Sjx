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
<style>
    /* Estilos para los divs */
    .col-md-6 {
        background-color: #fff;
        box-shadow: 0px 2px 4px rgba(40, 167, 69, 0.3);
        border-radius: 5px;
        padding: 20px;
        margin-bottom: 20px;
    }

    /* Estilos para el campo "Localidad con menor registros" como lista */
    #localidad-menor-registros ul {
        list-style-type: square;
        padding-left: 20px;
        margin-top: 10px;
    }

    /* Estilos para los input dentro de los divs */
    .input-resultados {
        padding: 8px;
        border: 1px solid #28a745;
        border-radius: 5px;
        background-color: #fff;
        color: #28a745;
        transition: background-color 0.3s ease, color 0.3s ease, border-color 0.3s ease;
    }

    .input-resultados:hover {
        background-color: #28a745;
        color: #fff;
        border-color: #28a745;
    }

    .input-resultados:focus {
        outline: none;
        background-color: #28a745;
        color: #fff;
        border-color: #28a745;
    }

    .input-resultados:read-only {
        background-color: #fff;
        color: #28a745;
        border-color: #fff;
        cursor: default;
    }
</style>
<section id="resultados">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mt-4">
                <h3>Información recolectada del Municipio </h3>
                <p>
                    <?php echo $resultados[3]['nombre_blog']; ?>
                </p>
            </div>
            <div class="col-md-6 mt-4 input-resultados">
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
                                <ul class="localidad-menor-registros">
                                <?php foreach ($menor as $r) {
                                                                                                                                        echo $r;
                                                                                                                                    } ?>
                                </ul>
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