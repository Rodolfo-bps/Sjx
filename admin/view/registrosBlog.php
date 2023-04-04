<?php

$sqlMapa = "SELECT * FROM blog";
$rel = mysqli_query($mysqli, $sqlMapa);



?>

<style>
    .rojo {
        color: red;
    }

    .verde {
        color: green;
    }
</style>
<div class="tabcontent">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <!-- Page Heading -->
        <div class=" d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="bi bi-geo-alt" style="font-size: 2rem;">
                </i> Blog</h1>
        </div>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Tabla de Plantas</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered tabla" style="font-size: 13px;" id="example" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Descripción </th>
                                <th>Seccion</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Descripción </th>
                                <th>Seccion</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php while ($row = $rel->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo substr($row['nombre_blog'], 0, 70); ?></td>
                                    <td><?php echo $row['seccion_blog']; ?></td>
                                    <td>
                                        <form method="post" action='http://localhost/sjx/admin/editarBlog'>
                                            <input type="hidden" name="id_blog" id="id_blog" value="<?php echo $row['id_blog']; ?>" />
                                            <button class="btn btn-warning btn-circle" type="submit" name="btn_eliminar"><i class="bi-arrow-repeat"></i></button>
                                        </form>
                                    </td>

                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>

                    <div class="row">
                        <?php
                        //saber numero de usuarios
                        $sqlUser = "SELECT * FROM blog";
                        if ($resulUser = mysqli_query($mysqli, $sqlUser)) {
                            $numUser = mysqli_num_rows($resulUser);
                        }
                        ?>
                        <div class="col-md-4">
                            <h4>
                                Número de blog <span class="text-success"><strong><?= $numUser ?></strong></span>
                            </h4>
                        </div>
                        <br><br>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>