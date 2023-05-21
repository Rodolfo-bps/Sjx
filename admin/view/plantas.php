
<?php include "seccion/plantas.php"; ?>




<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <div class="tabcontent">
            <!-- Begin Page Content -->
            <div class="container-fluid">
                <!-- Page Heading -->
                <div class=" d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800"><i class="bi bi-geo-alt" style="font-size: 2rem;"></i> Mapa</h1>
                </div>

                <!-- Content Row -->
                <div class="row">
                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Numero de Plantas</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $numPlant ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="bi bi-geo-alt fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-danger shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            Plantas Inactivas</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $numDanger ?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="bi bi-radioactive fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Content Row -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Mapa de Echinocactus platyacanthus</h6>
                    </div>
                    <div class="card-body">
                        <div id="map-container-google-2" class="z-depth-1-half map-container" style="height: 400px; width:100%;">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
    </div>
</div>



<!-- Agregar Usuarios-->
<div class="modal fade" id="agregarPlanta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Planta </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" action="controlPlantas.php" enctype="multipart/form-data">

                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="bi bi-signpost-fill"></i></div>
                        </div>
                        <input required type="text" class="form-control" name="direccion" placeholder="direccion">
                    </div>

                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="bi bi-list"></i></div>
                        </div>
                        <input required type="text" class="form-control" name="descripcion" placeholder="descripcion">
                    </div>

                    <div class="form-group has-feedback" bis_skin_checked="1">
                        <div class="btn btn-default btn-file" bis_skin_checked="1">
                            <i class="fas fa-paperclip"></i> Adjuntar Imagen de la planta
                            <input type="file" name="imagen">
                        </div>
                    </div>

                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="bi bi-geo-alt"></i></div>
                        </div>
                        <input required type="text" class="form-control" name="lat" placeholder="latitud">
                    </div>

                    <div class="input-group mb-2 mr-sm-2">
                        <div class="input-group-prepend">
                            <div class="input-group-text"><i class="bi bi-geo-alt"></i></div>
                        </div>
                        <input required type="text" class="form-control" name="lng" placeholder="Longitud">

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">cerrar</button>
                        <button type="submit" class="btn btn-primary" name="btn_guardar">guardar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
