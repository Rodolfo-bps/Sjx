<?php include("seccion/sesiones.php"); ?>

<!-- Sidebar -->
<?php include("template/menu.php") ?>
<!-- End of Sidebar -->

<!-- Topbar -->
<?php include("template/header.php") ?>
<!-- End of Topbar -->

<?php


$sqlPlant = "SELECT * FROM mapa";
if ($sqlPlant = mysqli_query($mysqli, $sqlPlant)) {
    $numPlant = mysqli_num_rows($sqlPlant);
}

$estado = "inactivo";

$sqlDanger = "SELECT estado FROM mapa WHERE estado = '$estado'";
if ($sqlDanger = mysqli_query($mysqli, $sqlDanger)) {
    $numDanger = mysqli_num_rows($sqlDanger);
}







?>




<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <div class="tabcontent">
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class=" d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800"><i class="bi bi-geo-alt" style="font-size: 2rem;"></i> Galeria</h1>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <div class="album ">
                            <div class="container">
                                <div class="row">
                                    <?php
                                    include("config/conexion.php");

                                    $sqlImage = ("SELECT * FROM mapa");
                                    $resultadoImg = mysqli_query($mysqli, $sqlImage);

                                    //numero fotos de la base de datos
                                    $numPlant = mysqli_num_rows($resultadoImg);

                                    //num de botones
                                    $imagenes_x_pagina = 3;

                                    $paginas = $numPlant / $imagenes_x_pagina;

                                    //decimal a entero
                                    $paginas = ceil($paginas);

                                    /*============================ */
                                    if (!$_GET) {
                                        header("location:galeria.php?pagina=1");
                                    }

                                    if ($_GET["pagina"] > $paginas || $_GET["pagina"] <= 0) {
                                        header("location:galeria.php?pagina=1");
                                    }

                                    // determinar los numero de paginacion

                                    $iniciar = ($_GET['pagina'] - 1) * $imagenes_x_pagina;
                                    $sqlImg = ("SELECT * FROM mapa LIMIT $iniciar, $imagenes_x_pagina");
                                    $resultado = mysqli_query($mysqli, $sqlImg);

                                    //$resultado_img = $resultado->fetch_all(); 

                                    ?>

                                    <?php foreach ($resultado as $proyecto) { ?>
                                        <div class="col-md-4" id="paginated-list">
                                            <div class="card mb-4 shadow-sm">
                                                <img src="img/imagenesPlantas/<?php echo $proyecto['imagen'] ?>" width="100%" height="225">
                                                <div class="card-body">
                                                    <p class="card-text"><?php echo $proyecto['descripcion']; ?></p>

                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="btn-group">
                                                           
                                                            <a href="verPlanta.php?id_planta=<?php echo $proyecto['id_planta']; ?> " target="_blank" class="btn btn-sm btn-outline-secondary ">Ver mas</a>

                                                        </div><br>
                                                        <small class="text-muted">9 mins</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4">
                                            </div>
                                            <div class="col-md-4">
                                                <nav aria-label="Page navigation example">
                                                    <ul class="pagination justify-content-center">
                                                        <li class="page-item <?php echo $_GET['pagina'] <= 1 ? 'disabled' : ''; ?> "><a class="page-link" href="galeria.php?pagina=<?php echo $_GET['pagina'] - 1; ?>">Anterior</a></li>
                                                        <?php for ($i = 0; $i < $paginas; $i++) { ?>
                                                            <li class="page-item <?php echo $_GET['pagina'] == $i + 1  ? 'active' : ''; ?>"><a class="page-link" href="galeria.php?pagina=<?php echo $i + 1; ?>"><?php echo $i + 1; ?></a></li>
                                                        <?php } ?>
                                                        <li class="page-item <?php echo $_GET['pagina'] >= $paginas ? 'disabled' : ''; ?> "><a class="page-link" href="galeria.php?pagina=<?php echo $_GET['pagina'] + 1; ?>">Siguiente</a></li>
                                                    </ul>
                                                </nav>
                                            </div>
                                            <div class="col-md-4">
                                            </div>
                                        </div>
                                    </div>




                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
</div>



<?php include("template/footer.php"); ?>