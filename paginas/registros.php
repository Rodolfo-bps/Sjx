<section id="registros" class="divider">
    <div class="container">
        <div class="content-center">
            <h2>Registros de las <b>biznagas</b></h2>
            <p>Aunque el acitrón es delicioso, su consumo está prohibido en México, pues las biznagas, plantas de donde se obtiene la pulpa para este alimento se encuentran en peligro de extinción.</p>
        </div>
        <div class="row">
            <div class="pricing-container">
                <table class="table table-bordered tabla" style="font-size: 13px;" id="myTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Dirección</th>
                            <th>Localidad</th>
                            <th>Descripcion</th>
                            <th>Estado</th>
                            <th>Latitud</th>
                            <th>Longitud</th>
                            <th>Categoria</th>
                            <th>Fecha de Registro</th>
                            <th>Fecha de Actualizacion</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Dirección</th>
                            <th>Localidad</th>
                            <th>Descripcion</th>
                            <th>Estado</th>
                            <th>Latitud</th>
                            <th>Longitud</th>
                            <th>Categoria</th>
                            <th>Fecha de Registro</th>
                            <th>Fecha de Actualizacion</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php while ($row = $rel->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row['direccion']; ?></td>
                                <td><?php echo $row['localidad']; ?></td>
                                <td><?php echo $row['descripcion']; ?></td>
                                <td>
                                    <p class="btn btn-sm <?php echo $row['estado'] == 'activo' ? 'btn-success' : 'btn-danger'; ?>"><?php echo $row['estado']; ?></p>
                                </td>
                                <td><?php echo $row['lat']; ?></td>
                                <td><?php echo $row['lng']; ?></td>
                                <td><?php echo $row['categoria']; ?></td>
                                <td><?php echo $row['fecha_registro']; ?></td>
                                <td><?php echo $row['fecha_actualizacion']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</section>