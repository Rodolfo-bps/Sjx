<section id="team" class="bgLightGrey">
    <div class="container">
        <div class="content-center">
            <h2>Biznagas del Municipio de <b>San Jerónimo Xayacatlán</b></h2>
            <p><?php echo $resultados[2]['nombre_blog']; ?></p>
        </div>
        <div class="row">
            <?php
            $sqlImage = ("SELECT * FROM mapa LIMIT 6");
            $resultadoImg = mysqli_query($mysqli, $sqlImage);
            foreach ($resultadoImg as $proyecto) { ?>

                <div class="col-md-4">
                    <div class="member-container">
                        <div class="member-details">
                            <h5><?php echo $proyecto['descripcion']; ?></h5>
                            <span><?php echo $proyecto['direccion']; ?></span>
                            <form action="planta.php" method="post">
                                <input type="hidden" name="id_planta" id="id_planta" value="<?php echo $proyecto["id_planta"]; ?>">
                                <input type="submit" target="_blank" class="btn btn-sm btn-success" style="opacity: 0.7;" value="Ver más">
                            </form>
                            <br>
                        </div>
                        <img src="admin/img/imagenesPlantas/<?php echo $proyecto['imagen'] ?>" width="100%" height="225" class="img-fluid" alt="member 1">
                    </div>
                </div>
            <?php } ?>

            <div class="col-md-4">
            </div>
            <div class="col-md-4 text-center">
                <br><br>
                <a href="album.php" target="_blank" class="btn btn-primary">Ver más</a>
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>
</section>