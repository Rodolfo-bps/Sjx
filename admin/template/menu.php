<?php
include_once("config/config.php");
include_once("seccion/sesiones.php");


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= NAME_PAGE  ?></title>



    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
    <!-- Custom fonts for this template-->
    <link href="<?= SERVERURL  ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="<?= SERVERURL ?>vendor/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom styles for this page -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <!--Iconos-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="<?= SERVERURL ?>vendor/datatables/datatables.min.css" />
    <!--datables estilo bootstrap 4 CSS-->
    <link rel="stylesheet" type="text/css" href="<?= SERVERURL ?>vendor/datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="<?= SERVERURL ?>vendor/main.css">

    <!--font awesome con CDN-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">


</head>
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">


            <li class="nav-item">
                <a class="sidebar-brand d-flex align-items-center justify-content-center" href="principal.php">
                    <div class="sidebar-brand-icon rotate-n-15">
                        <i class="bi bi-clipboard2-data"></i>
                    </div>
                    <div class="sidebar-brand-text mx-1"><?= NAME_PAGE ?></div>
                </a>
            </li>
            <br>


            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?= SERVERURL  ?>principal/">
                    <i class="bi bi-house-door"></i>
                    <span>Incio</span>
                </a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Configuración
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="bi bi-people"></i>
                    <span>Usuarios</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Usuarios:</h6>
                        <a class="collapse-item" class="collapse-item" href="<?= SERVERURL  ?>perfilUsuario/">Mi perfil</a>
                        <?php if ($tipo_usuario == 1) { ?>

                            <a class="collapse-item" class="collapse-item" href="<?= SERVERURL  ?>usuarios/">Usuarios</a>
                        <?php } ?>

                    </div>
                </div>
            </li>
            <!-- Nav Item - Charts -->
            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Datos de biznaga
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Biznaga</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Biznaga:</h6>
                        <a class="collapse-item" href="<?= SERVERURL  ?>plantas/">Mapa de Biznaga</a>
                        <a class="collapse-item" href="<?= SERVERURL  ?>registrosPlantas/">Registros</a>
                        <a class="collapse-item" href="<?= SERVERURL  ?>estadisticas/">Estadísticas </a>
                        <!--<a class="collapse-item" href="galeria?pagina=1">Galeria</a>-->
                        <?php if ($tipo_usuario == 1) { ?>
                            <a class="collapse-item" href="<?= SERVERURL  ?>categorias/">Categorías</a>
                        <?php } ?>

                    </div>
                </div>
            </li>

            <hr class="sidebar-divider my-0">

            <li class="nav-item ">
                <a class="nav-link" href="seccion/logout.php">
                    <i class="bi bi-box-arrow-right"></i>
                    <span>Cerrar Sesión</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>