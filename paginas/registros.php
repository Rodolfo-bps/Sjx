

<section id="registros" class="divider">
    <div class="container">
        <div class="content-center">
            <h2>Registros de <b>biznagas</b></h2>
            <p><?php echo $resultados[3]['nombre_blog']; ?></p>
        </div>
        <div class="row">
            <div class="pricing-container">
                <table class="table table-bordered tabla" style="font-size: 13px;" id="myTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Dirección</th>
                            <th>Localidad</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th>Latitud</th>
                            <th>Longitud</th>
                            <th>Altura</th>
                            <th>Anchura</th>
                            <th>Especie</th>
                            <th>Fecha de registro</th>
                            <th>Fecha de actualización </th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Dirección</th>
                            <th>Localidad</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th>Latitud</th>
                            <th>Longitud</th>
                            <th>Altura</th>
                            <th>Anchura</th>
                            <th>Especie</th>
                            <th>Fecha de registro</th>
                            <th>Fecha de actualización </th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php while ($row = $rel->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $row['direccion']; ?></td>
                                <td><?php echo $row['localidad']; ?></td>
                                <td><?php echo $row['descripcion']; ?></td>
                                <td>
                                    <p class="btn btn-sm 
                                    <?php echo $row['estado'] == 'activo' ? 'btn-success' : 'btn-danger'; ?>">
                                        <?php echo $row['estado']; ?></p>
                                </td>
                                <td><?php echo $row['lat']; ?></td>
                                <td><?php echo $row['lng']; ?></td>
                                <td><?php echo $row['altura']; ?></td>
                                <td><?php echo $row['anchura']; ?></td>
                                <td><?php echo $row['especie']; ?></td>
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