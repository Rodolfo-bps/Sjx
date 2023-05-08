<br>



<?php
include("admin/config/conexion.php");

$sqlImage = ("SELECT * FROM mapa");
$resultadoImg = mysqli_query($mysqli, $sqlImage);

//numero fotos de la base de datos
$numPlant = mysqli_num_rows($resultadoImg);

$imagenes_x_pagina = 3;
$pagina = isset($_POST['pagina']) ? $_POST['pagina'] : 1;
$iniciar = ($pagina - 1) * $imagenes_x_pagina;

$sql = "SELECT * FROM mapa LIMIT $iniciar, $imagenes_x_pagina";
$resultado = mysqli_query($mysqli, $sql);

$sql_total = "SELECT COUNT(*) as total FROM mapa";
$resultado_total = mysqli_query($mysqli, $sql_total);
$fila_total = mysqli_fetch_assoc($resultado_total);
$total_imagenes = $fila_total['total'];
$paginas = ceil($total_imagenes / $imagenes_x_pagina);
?>

<style>
  #paginated-list .card {
    width: 90%;
    margin-bottom: 1rem;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(40, 167, 69, 0.2);
    transition: transform 0.3s ease;
  }

  #paginated-list .card:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 6px rgba(40, 167, 69, 0.3);
  }

  #paginated-list .card img {
    width: 100%;
    height: auto;
    object-fit: cover;
    border-radius: 10px 10px 0 0;
  }

  #paginated-list .card-body {
    padding: 1.25rem;
  }

  #paginated-list .card-text {
    margin-bottom: 0.5rem;
  }

  #paginated-list .btn {
    background-color: rgba(40, 167, 69, 0.7);
    border-color: rgba(40, 167, 69, 0.7);
    color: #ffffff;
    transition: background-color 0.3s ease;
    border-radius: 5px;
    padding: 5px 10px;
  }

  #paginated-list .btn:hover {
    background-color: rgba(40, 167, 69, 1);
    border-color: rgba(40, 167, 69, 1);
    transform: scale(1.05);

  }

  /*botones de paginacion */

  .pagination .page-item {
    display: inline-block;
    margin-right: 10px;
  }

  .pagination .page-link {
    background-color: #ffffff;
    color: rgba(40, 167, 69, 1);
    border: 2px solid rgba(40, 167, 69, 1);
    border-radius: 10px;
    padding: 8px 12px;
    font-size: 16px;
    transition: background-color 0.3s ease;
  }

  .pagination .page-link:hover {
    background-color: rgba(40, 167, 69, 1);
    color: #ffffff;
  }

  .pagination .page-item.disabled .page-link {
    opacity: 0.5;
    pointer-events: none;
  }

  .pagination .page-item.active .page-link {
    background-color: rgba(40, 167, 69, 1);
    border-color: rgba(40, 167, 69, 1);
    color: #ffffff;
    transform: scale(1.05);
  }
</style>
<section id="portfolio">
  <div class="container-fluid">


    <div class="row">
      <!-- Area Chart -->
      <div class="col-xl-12 col-lg-11">

        <div class="card shadow mb-4">
          <div class="album py-5 bg-light">
            <div class="container">
              <h3 class="text-center">Biznagas del Municipio de <b>San Jeronimo Xayacatlan</b></h3><br>
              <h5><strong style="color:green"> Numero de plantas:</strong> <strong style="color:red"><?= $numPlant ?></strong></h5>

              <div class="row">
                <div class="container mt-5">
                  <div class="row">
                    <?php while ($fila = mysqli_fetch_assoc($resultado)) { ?>

                      <div class="col-md-4" id="paginated-list">
                        <div class="card mb-4 shadow-sm">
                          <img src="admin/img/imagenesPlantas/<?= $fila['imagen'] ?>" width="100%" height="225">
                          <div class="card-body">
                            <p class="card-text"><?= $fila['descripcion'] ?></p>
                            <div class="d-flex justify-content-between align-items-center">
                              <div class="btn-group">
                                <form action="planta" method="post">
                                  <input type="hidden" name="id_planta" id="id_planta" value="<?= $fila["id_planta"] ?>">
                                  <input type="submit" target="_blank" class="btn btn-sm btn-outline-secondary" value="Ver mas">
                                </form>
                              </div>
                              <small class="text-muted">9 mins</small>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php } ?>



                    <div class="col-md-12">
                      <nav aria-label="Paginación">
                        <ul class="pagination justify-content-center mt-4 ">
                          <li class="page-item <?php echo ($pagina <= 1) ? 'disabled' : ''; ?>">
                            <form method="post">
                              <input type="hidden" name="pagina" value="<?php echo $pagina - 1; ?>">
                              <button type="submit" class="page-link">Anterior</button>
                            </form>
                          </li>
                          <?php
                          $inicio = ($pagina <= 3) ? 1 : $pagina - 2;
                          $fin = ($paginas - $pagina >= 2) ? $pagina + 2 : $paginas;
                          for ($i = $inicio; $i <= $fin; $i++) {
                          ?>
                            <li class="page-item <?php echo ($pagina == $i) ? 'active' : ''; ?>">
                              <form method="post">
                                <input type="hidden" name="pagina" value="<?php echo $i; ?>">
                                <button type="submit" class="page-link"><?php echo $i; ?></button>
                              </form>
                            </li>
                          <?php } ?>
                          <li class="page-item <?php echo ($pagina >= $paginas) ? 'disabled' : ''; ?>">
                            <form method="post">
                              <input type="hidden" name="pagina" value="<?php echo $pagina + 1; ?>">
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
            <div class="text-center mt-4">
            </div>
          </div>
</section>