<?php
require "seccion/editarBlog.php";
?>
<div class="tabcontent">
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class=" d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Actualizar Blog Numero <?=$datos['id_blog'];?></h1>
        </div>

        <!-- DataTales Example -->
        <div class="card shadow col-md-3">
        </div>
        <div class="card shadow col-md-9">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
                <form class="form-horizontal" method="POST" action="seccion/controlBlog.php" accept-charset="utf8">
                    <div class="box-body">
                        <input type="hidden" class="form-control" id="id_blog" name="id_blog" value="<?= $datos['id_blog'] ?>">
                        <div class="form-group">
                            <textarea name="nombre_blog" class="form-control" id="nombre_blog" cols="30" rows="10"><?= $datos['nombre_blog'] ?></textarea>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <a href="<?= SERVERURL . "registrosBlog" ?>" class="btn btn-default">Regresar </a>
                            <button type="submit" class="btn btn-info pull-right" name="btn_actualizar_blog">Actualizar</button>
                        </div>
                        <!-- /.box-footer -->
                </form>
            </div>
        </div>
        <div class="card shadow col-md-3">
        </div>
    </div>
</div>
<br><br><br><br><br>