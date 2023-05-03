<?php
session_start();
require_once("config/conexion.php");
if ($_POST) {

    $nombre_usuario = $_POST['nombre_usuario'];
    $password = $_POST['password'];

    $sql = ("SELECT id_usuario, nombre_usuario, nombre, 
    password, rol, tipo_usuario FROM usuarios WHERE nombre_usuario 
    = '$nombre_usuario'");
    $resultado = $mysqli->query($sql);


    //si hay usuario o no
    $num = $resultado->num_rows;
    if ($num > 0) {
        //traer usuario de post y de la bd
        $row = $resultado->fetch_assoc();
        $password_bd = $row["password"];
        $pass_c = sha1($password);

        if ($password_bd == $pass_c) {
            $_SESSION['id_usuario'] = $row['id_usuario'];
            $_SESSION['nombre_usuario'] = $row['nombre_usuario'];
            $_SESSION['tipo_usuario'] = $row['tipo_usuario'];
            $_SESSION['rol'] = $row['rol'];
            $_SESSION['nombre'] = $row['nombre'];


            header("location: principal.php");
        } else {
            $error = "Usuario/Password no existen";
        }
    } else {
        echo "<script>alert('No existe usuario')</script>";
    }
}

?>


<!DOCTYPE html>
<html lang="es">

<style>
    .error {
        color: #FF0000;
    }
</style>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Custom fonts for this template-->
    <!-- Custom styles for this template-->
    <!-- Custom styles for this page -->
    <!-- <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">-->
    <!--DATATABLES GITHUB-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!--Iconos-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body style="background: #eee;">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-7 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5" style="border-radius: 18px;">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg-12">
                                <div class="p-5" style="text-align: center; ">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Iniciar Sesión</h1>
                                    </div>
                                    <span class=""></span>
                                    <form class="user" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                                        <div class="input-group mb-2 mr-sm-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="bi bi-person"></i></div>
                                            </div>
                                            <input type="text" class="form-control form-control-user" id="nombre_usuario" name="nombre_usuario" aria-describedby="emailHelp" placeholder="Usuario">

                                        </div>
                                        <div class="input-group mb-2 mr-sm-2">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="bi bi-lock"></i></div>
                                            </div>
                                            <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                        </div>


                                        <div class="modal-footer">
                                            <a href="../index.php" style="border-radius: 18px; " 
                                            type="button" class="btn btn-danger pull-left">Atras</a>
                                            <button style="border-radius: 18px;;" type="submit" 
                                            class="btn btn-primary" name="btn_guardar">Iniciar Sesion</button>
                                        </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>