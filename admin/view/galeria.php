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

                                    $sqlImage = ("SELECT * FROM mapa");
                                    $resultadoImg = mysqli_query($mysqli, $sqlImage);

                                    //numero fotos de la base de datos
                                    $numPlant = mysqli_num_rows($resultadoImg);

                                    //num de botones
                                    $imagenes_x_pagina = 3;
                                    $paginas = ceil($numPlant / $imagenes_x_pagina);

                                    /*============================ */
                                    if (!$_POST) {
                                        header("location:galeria.php?pagina=1");
                                    }

                                    if ($_POST["pagina"] > $paginas || $_POST["pagina"] <= 0) {
                                        header("location:galeria.php?pagina=1");
                                    }

                                    // determinar los numero de paginacion
                                    $iniciar = ($_POST['pagina'] - 1) * $imagenes_x_pagina;
                                    $sqlImg = ("SELECT * FROM mapa LIMIT $iniciar, $imagenes_x_pagina");
                                    $resultado = mysqli_query($mysqli, $sqlImg);
                                    ?>


                                    <?php foreach ($resultado as $proyecto) { ?>
                                        <div class="col-md-4" id="paginated-list">
                                            <div class="card mb-4 shadow-sm">
                                                <img src="admin/img/imagenesPlantas/<?php echo $proyecto['imagen'] ?>" width="100%" height="225">
                                                <div class="card-body">
                                                    <p class="card-text"><?php echo $proyecto['descripcion']; ?></p>

                                                    <div class="d-flex justify-content-between align-items-center">
                                                        <div class="btn-group">
                                                            <form action="planta.php" method="post">
                                                                <input type="hidden" name="id_planta" id="id_planta" value="<?php echo $proyecto["id_planta"]; ?>">
                                                                <input type="submit" target="_blank" class="btn btn-sm btn-outline-secondary" value="Ver mas">
                                                            </form>
                                                        </div>
                                                        <small class="text-muted">9 mins</small>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>


                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-4"></div>
                                            <div class="col-md-4">
                                                <nav aria-label="Page navigation example">
                                                    <ul class="pagination justify-content-center">
                                                        <li class="page-item <?php echo $_POST['pagina'] <= 1 ? 'disabled' : ''; ?>">
                                                            <form method="post" action="album.php">
                                                                <input type="hidden" name="pagina" value="<?php echo $_POST['pagina'] - 1; ?>">
                                                                <button type="submit" class="page-link">Anterior</button>
                                                            </form>
                                                        </li>
                                                        <?php
                                                        $inicio = max(1, $_POST['pagina'] - 2);
                                                        $fin = min($inicio + 4, $paginas);
                                                        for ($i = $inicio; $i <= $fin; $i++) { ?>
                                                            <li class="page-item <?php echo $_POST['pagina'] == $i ? 'active' : ''; ?>">
                                                                <form method="post" action="album.php">
                                                                    <input type="hidden" name="pagina" value="<?php echo $i; ?>">
                                                                    <button type="submit" class="page-link"><?php echo $i; ?></button>
                                                                </form>
                                                            </li>
                                                        <?php } ?>
                                                        <li class="page-item <?php echo $_POST['pagina'] >= $paginas ? 'disabled' : ''; ?>">
                                                            <form method="post" action="album.php">
                                                                <input type="hidden" name="pagina" value="<?php echo $_POST['pagina'] + 1; ?>">
                                                                <button type="submit" class="page-link">Siguiente</button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </nav>
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