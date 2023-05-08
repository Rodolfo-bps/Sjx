<?php

/*
$vistaPagina =  !empty($vistaPagina) ? true : false;
if($vistaPagina==false) { 
    header('location: ../index.php');
    exit("No se tiene permitido el acceso a esta pagina..."); 
}

*/

?>

<style>
    .box-gallery {
        transition: all 0.3s ease;
        box-shadow: 0 0 10px rgba(40, 167, 69, 0.3);
        /* Sombra de éxito en verde */
    }

    .box-gallery:hover {
        transform: scale(1.1);
        box-shadow: 0 0 10px rgba(40, 167, 69, 0.5);
        /* Sombra de éxito en verde con mayor intensidad al pasar el ratón */
    }

    .box-gallery:focus {
        transform: scale(1.2);
        box-shadow: 0 0 10px rgba(40, 167, 69, 0.7);
        /* Sombra de éxito en verde con mayor intensidad al seleccionar */
        outline: none;
    }

    /*codigo de boto */
    .btn-gallery {
        transition: all 0.3s ease !important;
        box-shadow: 0 0 10px rgba(40, 167, 69, 0.3) !important;
        /* Sombra de éxito en verde */
    }

    .btn-gallery:hover {
        transform: scale(1.1) !important;
        box-shadow: 0 0 10px rgba(40, 167, 69, 0.5) !important;
        /* Sombra de éxito en verde con mayor intensidad al pasar el ratón */
    }

    .btn-gallery:focus {
        transform: scale(1.2) !important;
        box-shadow: 0 0 10px rgba(40, 167, 69, 0.7) !important;
        /* Sombra de éxito en verde con mayor intensidad al seleccionar */
        outline: none;
    }

    .btn-gallery {
        display: inline-block;
        padding: 10px 20px;
        background-color: #000;
        /* Color de fondo primario */
        color: #fff;
        /* Color del texto */
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s ease, color 0.3s ease;
    }

    .btn-gallery:hover {
        background-color: #000;
        /* Color de fondo primario con mayor intensidad al pasar el ratón */
        color: #fff;
        /* Color del texto */
    }

    .btn-gallery:focus {
        outline: none;
    }
</style>
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

                <div class="col-md-4 box-gallery">
                    <div class="member-container ">
                        <div class="member-details">
                            <h5><?php echo $proyecto['descripcion']; ?></h5>
                            <span><?php echo $proyecto['direccion']; ?></span>
                            <form action="planta" method="post">
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
                <a href="album" target="_blank" class="btn btn-primary btn-gallery">Ver más</a>
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>
</section>