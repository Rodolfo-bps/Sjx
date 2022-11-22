<?php
include_once("../config/conexion.php");


//insertar datos
if (isset($_REQUEST['btn_guardar'])) {
    //metodo post
    $nombre_usuario = $_POST['nombre_usuario'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $password = sha1($_POST['password']);
    $rol = $_POST['rol'];
    $imagen = $_FILES['imagen']['tmp_name'];


    //no se repita la imagen
    $fecha = new DateTime();
    $imagen = $fecha->getTimestamp() . "_" . $_FILES['imagen']['name']; //para que no se repita
    //tratar imagen
    $imagen_temporal = $_FILES['imagen']['tmp_name'];

    move_uploaded_file($imagen_temporal, "../img/imagenesUsuarios/" . $imagen);

    $tipo_usuario;

    if ($rol == "Administrador Web") {
        $tipo_usuario = 1;
    } elseif ($rol == "Usuario Estandar") {
        $tipo_usuario = 2;
    }

    $sql = "INSERT INTO usuarios (nombre_usuario, nombre, apellidos, correo, password,rol, tipo_usuario, imagen) 
    VALUES ('$nombre_usuario', '$nombre','$apellidos','$correo','$password','$rol', '$tipo_usuario' ,'$imagen')";
    $ejecutar = mysqli_query($mysqli, $sql);

    //si se ejecuta de manera eficiente
    if ($ejecutar) {
        header("Location: ../usuarios.php");
    }
}



//btn eliminar datos
if (isset($_REQUEST['btn_eliminar'])) {

    //metodo post
    $id_usuario = $_POST['id_usuario'];


    //borrar imagen
    $borrarSQL = ("SELECT imagen FROM `usuarios` WHERE id_usuario = '$id_usuario'");
    $imagenes = mysqli_query($mysqli, $borrarSQL);

    $nombreImagen = [];

    while ($imagen = mysqli_fetch_array($imagenes)) {
        if (isset($imagen)) {
            $nombreImagen[] = $imagen[0];
            if (file_exists("../img/imagenesUsuarios/" . $nombreImagen[0])) {
                unlink("../img/imagenesUsuarios/" . $nombreImagen[0]);
                $sql = ("DELETE FROM usuarios WHERE id_usuario = '$id_usuario'");
                $ejecutar = mysqli_query($mysqli, $sql);
                if ($ejecutar) {
                    header("location: ../usuarios.php");
                } else {
                    echo "Error en la consulta";
                }
            } else {
                echo "Ocurrio un error";
            }
        }
    }
}


if (isset($_REQUEST['btn_actualizar'])) {
    //metodo post
    $id_usuario = $_POST['id_usuario'];
    $nombre_usuario = $_POST['nombre_usuario'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $password =  $_POST['password'];
    $passwordNew = sha1($_POST['passwordNew']);
    $rol = $_POST['rol'];
    $imagen = $_FILES['imagen']['name'];


    $sqlPass =  ("SELECT password FROM usuarios WHERE id_usuario = '$id_usuario'");
    $resultadoPass = mysqli_query($mysqli, $sqlPass);

    $row = $resultadoPass->fetch_assoc();
    $password_bd = $row["password"];
    $pass_c = sha1($password);

    if ($password_bd == $pass_c) {
        $sqlUser = "UPDATE usuarios SET nombre_usuario = '$nombre_usuario', nombre = '$nombre', apellidos = '$apellidos', 
     correo = '$correo', password = '$passwordNew' WHERE id_usuario = '$id_usuario'";
        $ejecutar = mysqli_query($mysqli, $sqlUser);
    } else {
        header("location: ../perfilUsuario.php");
    }

    if ($imagen != "") {
        //no se repita la imagen
        $fecha = new DateTime();
        $nombreArchivo = $fecha->getTimestamp() . "_" . $_FILES['imagen']['name']; //para que no se repita
        //tratar imagen
        $imagen_temporal = $_FILES['imagen']['tmp_name'];
        move_uploaded_file($imagen_temporal, "../img/imagenesUsuarios/" . $nombreArchivo);
        //borrar imagen
        $sqlImg = ("SELECT imagen FROM `usuarios` WHERE id_usuario = '$id_usuario'");
        $imagenes = mysqli_query($mysqli, $sqlImg);

        $nombreImagen = [];

        while ($img = mysqli_fetch_array($imagenes)) {
            $nombreImagen[] = $img[0];
        }


        if (isset($nombreImagen[0])) {
            if (file_exists("../img/imagenesUsuarios/" . $nombreImagen[0])) {
                unlink("../img/imagenesUsuarios/" . $nombreImagen[0]);
                $sql = "UPDATE usuarios SET imagen = '$nombreArchivo' WHERE id_usuario = '$id_usuario'";
                $ejecutar2 = mysqli_query($mysqli, $sql);
            }
        }
    }


    if ($id_usuario == 1) {
        header("location: usuarios.php");
    } else {
        header("location: perfilUsuario.php");
    }

    echo $nombre_usuario;
}
