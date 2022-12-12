<div class="tabcontent">
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Bienvenido <strong><?= $nombre_usuario . " " . $apellidos ?></strong></h1>
                    </div>

                    <?php

                    if ($password_bd == $pass_c) { ?>
                        <div class="alert alert-danger" role="alert">
                            Cambia tu contraseña
                        </div>

                    <?php } ?>



                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Numero de Usuarios</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $numUser ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <h2>
                                                <i class="bi bi-people fa-2x text-gray-300"></i>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

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
                                            <h2>
                                                <i class="bi bi-geo-alt fa-2x text-gray-300"></i>
                                            </h2>
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
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                                Plantas Inactivas</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $numDanger ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <h2>
                                                <i class="bi bi-radioactive fa-2x text-gray-300"></i>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Plantas Activas</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $sqlActive ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <h2>
                                                <i class="bi bi-bar-chart fa-2x text-gray-300"></i>
                                            </h2>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Content Row -->
                </div>
            </div>