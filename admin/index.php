<?php
session_start();
require_once("config/conexion.php");
if ($_POST) {

    $nombre_usuario = $_POST['nombre_usuario'];
    $password = $_POST['password'];

    $sql = "SELECT id_usuario, nombre_usuario, nombre, password, rol, tipo_usuario FROM usuarios WHERE nombre_usuario = '$nombre_usuario'";
    $resultado = $mysqli->query($sql);

    // Si hay usuario o no
    $num = $resultado->num_rows;
    if ($num > 0) {
        // Traer usuario de la base de datos
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
            $_SESSION['inicio_sesion_exitoso'] = true;
        } else {
            $error = "Usuario/Password incorrectos";
        }
    } else {
        $error = "El usuario no existe";
    }
}

?>


<!DOCTYPE html>
<html lang="es">
<style>
    body {
        background-image: url('img/imagenesPlantas/planta.jpg');
        /* Reemplaza con la URL de tu imagen */
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;
    }

    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .card {
        width: 400px;
        /* Ajusta el ancho del formulario según tu preferencia */
        background-color: rgba(255, 255, 255, 0.8);
        /* Cambia el valor de la transparencia (0.8) según tus preferencias */
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        /* Agrega una sombra suave al formulario */
    }

    .card-body {
        padding: 40px;
        /* Añade espacio interno alrededor del formulario */
    }

    .input-group-text {
        background-color: transparent;
        /* Hace transparente el fondo del icono del input */
        border: none;
        /* Elimina el borde del icono del input */
        color: #555;
        /* Cambia el color del icono del input */
    }

    .form-control {
        border-radius: 8px;
    }

    .btn {
        border-radius: 8px;
        padding: 10px 20px;
        font-weight: bold;
    }

    .btn-primary {
        background-color: #007bff;
        /* Cambia el color de fondo del botón primario */
        border-color: #007bff;
        /* Cambia el color del borde del botón primario */
        color: #fff;
        /* Cambia el color del texto del botón primario */
    }

    .btn-primary:hover {
        background-color: #0069d9;
        /* Cambia el color de fondo al pasar el ratón por encima del botón primario */
        border-color: #0062cc;
        /* Cambia el color del borde al pasar el ratón por encima del botón primario */
    }

    .btn-danger {
        background-color: #dc3545;
        /* Cambia el color de fondo del botón de peligro */
        border-color: #dc3545;
        /* Cambia el color del borde del botón de peligro */
        color: #fff;
        /* Cambia el color del texto del botón de peligro */
    }

    .btn-danger:hover {
        background-color: #c82333;
        /* Cambia el color de fondo al pasar el ratón por encima del botón de peligro */
        border-color: #bd2130;
        /* Cambia el color del borde al pasar el ratón por encima del botón de peligro */
    }

    .h4 {
        color: #333;
        /* Cambia el color del título del formulario */
        font-weight: bold;
        margin-bottom: 30px;
        /* Añade espacio inferior al título del formulario */
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

<body>

    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5" style="border-radius: 18px;">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">

                                <?php if (isset($error)) : ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $error; ?>
                                    </div>
                                <?php endif; ?>


                                <div class="p-5" style="text-align: center; ">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Iniciar Sesión</h1>
                                    </div>
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
                                            <a href="../index.php" style="border-radius: 18px; " type="button" class="btn btn-danger pull-left">Atras</a>
                                            <button style="border-radius: 18px;;" type="submit" class="btn btn-primary" name="btn_guardar">Iniciar Sesion</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <script>
        // Función para reproducir el sonido de bienvenida
        function reproducirSonido() {
            var audio = new Audio('img/correcto.mp3'); // Reemplaza 'ruta_del_archivo_de_sonido' por la ruta real del archivo de sonido
            audio.play();
        }

        // Función para mostrar la animación de bienvenida y redireccionar al usuario
        function mostrarAnimacionBienvenida() {
            // Mostrar animación de bienvenida
            document.getElementById('bienvenida').style.display = 'block';

            // Reproducir sonido de bienvenida
            reproducirSonido();

            // Redireccionar al usuario después de 5 segundos (5000 milisegundos)
            setTimeout(function() {
                window.location.href = 'ruta_de_redireccion'; // Reemplaza 'ruta_de_redireccion' por la ruta real de la página de destino
            }, 5000); // Cambia el tiempo de espera según tus necesidades
        }
    </script>

    <div id="bienvenida" style="display: none;">
        <h2>Bienvenido, <?php echo $_SESSION['nombre_usuario']; ?>!</h2>
    </div>

    <?php if (isset($_SESSION['id_usuario'])) : ?>
        <script>
            // Ejecutar la función de animación de bienvenida si el inicio de sesión fue exitoso
            mostrarAnimacionBienvenida();
        </script>
    <?php endif; ?>








    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>