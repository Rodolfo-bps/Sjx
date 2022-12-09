<?php


$localidades = ("SELECT * FROM reporteIndice LIMIT 1");
$rel = mysqli_query($mysqli, $localidades);
while ($row = $rel->fetch_assoc()) {

  
    
    
    
?>
    <section id="resultados">
        <div class="container">
            <div class="row">
                <div class="col-md-6 mt-4">
                    <h3>Ready to accelerate your project? <b>just let us know.</b></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Qui ea consequuntur, odit veniam
                        mollitia aliquam reiciendis dignissimos, vitae sapiente neque, cum dolorum.
                        contact@smartagency.com</p>
                </div>
                <div class="col-md-6 mt-4">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Localidad con mayor registros</label>

                                <input type="text" class="form-control"value="<?php echo $row['mayor']; ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Localidad con menor registros</label>


                                <strong>
                                    <input style="background: white; color: green;" type="text" readonly class="form-control" value="<?php echo $row['menor']; ?>">

                                </strong>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Plantas Activas</label>
                                <input type="text" class="form-control" id="" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Plantas Inactivas</label>
                                <input type="text" class="form-control" id="" placeholder="Last name">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Registros en el ultimo dia</label>
                                <input type="email" class="form-control" id=""  value="<?php echo $row['dia_ultimo']; ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Registros en el ultimo mes</label>
                                <input type="text" class="form-control" id="" value="<?php echo $row['mes_ultimo']; ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Registros en el ultimo anio</label>
                                <input type="number" class="form-control" id="" value="<?php echo $row['anio_ultimo']; ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <a href="" class="btn btn-primary full-width">Contact sales</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php }
?>