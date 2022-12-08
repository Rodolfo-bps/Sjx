<section id="registros" class="divider">
    <div class="container">
        <div class="content-center">
            <h2>Pricing built for <b>every business</b></h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui ea consequuntur, odit veniam mollitia
                aliquam reiciendis dignissimos, vitae sapiente neque, cum dolorum. Suscipit expedita obcaecati
                nesciunt error ut quidem autem.</p>
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