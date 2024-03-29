<?php
require ("seccion/categorias.php");
?>
<div class="container">
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Crear Categoría</h6>
                </div>
                <div class="card-body">
                    <div class="">
                        <form method="post" action="http://localhost/sjx/admin/seccion/controlCategorias.php" enctype="multipart/form-data">
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="bi bi-geo-alt"></i></div>
                                </div>
                                <input required type="text" class="form-control" id="nombre_categoria" name="nombre_categoria" placeholder="Nombre categoría">
                            </div>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="bi bi-geo-alt"></i></div>
                                </div>
                                <input required type="color" class="form-control" id="color_categoria" name="color_categoria" placeholder="Color">
                            </div>
                            <div class="input-group mb-2 mr-sm-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text"><i class="bi bi-geo-alt"></i></div>
                                </div>
                                <input required type="date" class="form-control" id="fecha_creacion" name="fecha_creacion" placeholder="Fecha">
                            </div>
                            <small>Agrega un color en Ingles</small>
                            <div class="input-group mb-2 mr-sm-2">
                            </div>
                            <div class="modal-footer">
                                <br>
                                <button type="submit" class="btn btn-primary" name="btn_guardar_categoria"><i class="bi bi-check2-circle"></i> Guardar</button>
                            </div>
                        </form>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
        <div class="col-xl-8 col-lg-7">
            <!-- Bar Chart -->
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Lista categorías</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered tabla" style="font-size: 13px;" id="example" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre categoría</th>
                                    <th>Color categoría </th>
                                    <th>Fecha de creación </th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Nombre categoría</th>
                                    <th>Color categoría </th>
                                    <th>Fecha de creación </th>
                                    <th>Acciones</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                <?php while ($row = $relCategorias->fetch_assoc()): ?>
                                    <tr>
                                        <td><?= $row['id_categoria'] ?></td>
                                        <td><?= $row['nombre_categoria'] ?></td>
                                        <td><?= $row['color_categoria'] ?></td>
                                        <td><?= $row['fecha_creacion'] ?></td>

                                        <td colspan="">
                                            <div class=" ">
                                                <form method="post" action="http://localhost/sjx/admin/editarCategorias">
                                                    <input type="hidden" name="id_categoria" id="id_categoria" value="<?= $row['id_categoria'] ?>" />
                                                    <button class="btn btn-warning btn-circle" type="submit" name="btn_eliminar_categoria"><i class="bi bi-arrow-repeat"></i></button>
                                                </form>

                                                <form method="post" action="http://localhost/sjx/admin/seccion/controlCategorias.php">
                                                    <input type="hidden" name="id_categoria" id="id_categoria" value="<?= $row['id_categoria'] ?>" />
                                                    <button class="btn btn-danger btn-circle" type="submit" name="btn_eliminar_categoria"><i class="bi bi-trash3"></i></button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                        <br>
                        <div class="row">
                            <?php
                        
                            ?>
                            <div class="col-md-12">
                                <h4>
                                    Numero de Categorias <span class="text-success"><strong><?= $numCategorias ?></strong></span>
                                </h4>
                            </div>
                            <br><br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pie Chart -->
    </div>
</div>