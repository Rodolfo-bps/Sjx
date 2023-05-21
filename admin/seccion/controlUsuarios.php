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

    $sql = "INSERT INTO usuarios (nombre_usuario, nombre, apellidos, correo, 
    password,rol, tipo_usuario, imagen) 
    VALUES ('$nombre_usuario', '$nombre','$apellidos','$correo','$password',
    '$rol', '$tipo_usuario' ,'$imagen')";
    $ejecutar = mysqli_query($mysqli, $sql);

    //si se ejecuta de manera eficiente
    if ($ejecutar) {
        header("Location: http://localhost/sjx/admin/usuarios");
    }
}



//btn eliminar datos
if (isset($_REQUEST['btn_eliminar'])) {
    //metodo post
    $id = $_POST['id_usuario'];
    //borrar imagen
    $borrarSQL = ("SELECT imagen FROM `usuarios` WHERE id_usuario = '$id'");
    $imagenes = mysqli_query($mysqli, $borrarSQL);
    $nombreImagen = [];

    while ($imagen = mysqli_fetch_array($imagenes)) {
        if (isset($imagen)) {
            $nombreImagen[] = $imagen[0];
            if (file_exists("../img/imagenesUsuarios/" . $nombreImagen[0])) {
                unlink("../img/imagenesUsuarios/" . $nombreImagen[0]);
                $sql = ("DELETE FROM usuarios WHERE id_usuario = '$id'");
                $ejecutar = mysqli_query($mysqli, $sql);
                if ($ejecutar) {
                    if ($id_usuario)
                        header("location: http://localhost/sjx/admin/usuarios");
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
    $id = $_POST['id_usuario'];
    $id_sesion = $_POST['id_sesion'];
    $nombre_usuario = $_POST['nombre_usuario'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $correo = $_POST['correo'];
    $password =  $_POST['password'];
    $passwordNew = sha1($_POST['passwordNew']);
    $rol = $_POST['rol'];
    $imagen = $_FILES['imagen']['name'];

    $sqlUser = "UPDATE usuarios SET nombre_usuario = '$nombre_usuario', nombre = 
    '$nombre', apellidos = '$apellidos', 
    correo = '$correo' WHERE id_usuario = '$id'";
    $ejecutar = mysqli_query($mysqli, $sqlUser);

    if ($imagen != "") {
        //no se repita la imagen
        $fecha = new DateTime();
        $nombreArchivo = $fecha->getTimestamp() . "_" . $_FILES['imagen']['name']; //para que no se repita
        //tratar imagen
        $imagen_temporal = $_FILES['imagen']['tmp_name'];
        move_uploaded_file($imagen_temporal, "../img/imagenesUsuarios/" . $nombreArchivo);
        //borrar imagen
        $sqlImg = ("SELECT imagen FROM `usuarios` WHERE id_usuario = '$id'");
        $imagenes = mysqli_query($mysqli, $sqlImg);

        $nombreImagen = [];

        while ($img = mysqli_fetch_array($imagenes)) {
            $nombreImagen[] = $img[0];
        }


        if (isset($nombreImagen[0])) {
            if (file_exists("../img/imagenesUsuarios/" . $nombreImagen[0])) {
                unlink("../img/imagenesUsuarios/" . $nombreImagen[0]);
                $sql = "UPDATE usuarios SET imagen = '$nombreArchivo' WHERE 
                id_usuario = '$id'";
                $ejecutar2 = mysqli_query($mysqli, $sql);
            }
        }
    }


    $sqlPass =  ("SELECT password FROM usuarios WHERE id_usuario = '$id'");
    $resultadoPass = mysqli_query($mysqli, $sqlPass);

    $row = $resultadoPass->fetch_assoc();
    $password_bd = $row["password"];
    $pass_c = sha1($password);

    if ($password_bd == $pass_c) {
        $sqlUser = "UPDATE usuarios password = '$passwordNew' WHERE id_usuario = '$id'";
        $ejecutar = mysqli_query($mysqli, $sqlUser);
        header("location: logout.php");
    }
    if ($id_sesion == $id) {
        header("location: http://localhost/sjx/admin/perfilUsuario");
    } else {
        header("location: http://localhost/sjx/admin/usuarios");
    }
}
