<section id="team" class="bgLightGrey">
    <div class="container">
        <div class="content-center">
            <h2>Keep calm, you're in a <b>good company</b></h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui ea consequuntur, odit veniam mollitia
                aliquam reiciendis dignissimos, vitae sapiente neque, cum dolorum. Suscipit expedita obcaecati
                nesciunt error ut quidem autem.</p>
        </div>
        <div class="row">
            <?php



            $sqlImage = ("SELECT * FROM mapa LIMIT 6");
            $resultadoImg = mysqli_query($mysqli, $sqlImage);

            ?>
            <?php foreach ($resultadoImg as $proyecto) { ?>

                <div class="col-md-4">
                    <div class="member-container">
                        <div class="member-details">
                            <h5><?php echo $proyecto['descripcion']; ?></h5>
                            <span><?php echo $proyecto['direccion']; ?></span>
                            <ul class="list-inline">
                                <li class="list-inline-item"><a href="#"><img src="assets/images/instagram.svg" class="img-fluid"></a>
                                </li>
                                <li class="list-inline-item"><a href="#"><img src="assets/images/twitter.svg" class="img-fluid"></a></li>
                                <li class="list-inline-item"><a href="#"><img src="assets/images/youtube.svg" class="img-fluid"></a></li>
                                <li class="list-inline-item"><a href="#"><img src="assets/images/dribbble.svg" class="img-fluid"></a></li>
                                <li class="list-inline-item"><a href="#"><img src="assets/images/facebook.svg" class="img-fluid"></a></li>
                            </ul>
                        </div>
                        <img src="admin/img/imagenesPlantas/<?php echo $proyecto['imagen'] ?>" width="100%" height="225" class="img-fluid" alt="member 1">
                    </div>
                </div>
            <?php } ?>

            <div class="col-md-4">
            </div>
            <div class="col-md-4 text-center">
                <br><br>
                <a href="album.php" class="btn btn-primary">Ver mas</a>
            </div>
            <div class="col-md-4">
            </div>
        </div>
    </div>
</section>