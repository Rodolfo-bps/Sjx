<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <h3>
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="principal.php">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="bi bi-clipboard2-data"></i>
                    </div>
                    <div class="sidebar-brand-text mx-1"><?= NAME_PAGE ?></div>
                </a>
            </h3>
            <!-- Topbar Navbar -->
            <ul class="navbar-nav ml-auto">

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $rol; ?></< /span>
                            <?php


                            $sql = ("SELECT imagen FROM usuarios WHERE id_usuario= '$id_usuario'");
                            $resultado = mysqli_query($mysqli, $sql);


                            while ($row = mysqli_fetch_array($resultado)) {
                                $imagen = $row[0];
                            }


                            ?>
                            <img class="img-profile rounded-circle" src="<?php echo "img/imagenesUsuarios/" . $imagen; ?>" width="50">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="perfilUsuario.php">
                            <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                            Perfil
                        </a>
                        <a class="dropdown-item" href="usuarios.php">
                            <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                            Ver Usuarios
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                            Ir a blog
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="seccion/logout.php" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>
        </nav>