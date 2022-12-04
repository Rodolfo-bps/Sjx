<?php

include_once("../config/conexion.php");

//agregar
if (isset($_REQUEST['btn_guardar_categoria'])) {
    $nombre_categoria = $_POST['nombre_categoria'];
    $color_categoria = $_POST['color_categoria'];
    $fecha_creacion = $_POST['fecha_creacion'];

    //insertar
    $sql = "INSERT INTO categorias (id_categoria, nombre_categoria, color_categoria ,fecha_creacion) 
                VALUES (NULL, '$nombre_categoria', '$color_categoria', '$fecha_creacion');";
    $ejecutar = mysqli_query($mysqli, $sql);


    header("location: ../categorias.php");
}


if (isset($_REQUEST['btn_eliminar_categoria'])) {

    $id_categoria = $_POST['id_categoria'];

    $sql = ("DELETE FROM categorias WHERE id_categoria = '$id_categoria'");
    $ejecutar = mysqli_query($mysqli, $sql);

    header("location: ../categorias.php");
}


if (isset($_REQUEST['btn_actualizar'])) {
    //metodo post
    $id_planta = $_POST['id_planta'];
    $direccion = $_POST['direccion'];
    $localidad = $_POST['localidad'];
    $descripcion = $_POST['descripcion'];
    $estado = $_POST['estado'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];
    $imagen = $_FILES['imagen']['name'];

    $sqlUser = "UPDATE mapa SET direccion = '$direccion', localidad = '$localidad' ,descripcion = '$descripcion', estado = '$estado' , lat = '$lat', 
     lng = '$lng' WHERE id_planta = '$id_planta'";
    $ejecutar = mysqli_query($mysqli, $sqlUser);

    if ($imagen != "") {
        //no se repita la imagen
        $fecha = new DateTime();
        $nombreArchivo = $fecha->getTimestamp() . "_" . $_FILES['imagen']['name']; //para que no se repita
        //tratar imagen
        $imagen_temporal = $_FILES['imagen']['tmp_name'];
        move_uploaded_file($imagen_temporal, "../img/imagenesPlantas/" . $nombreArchivo);
        //borrar imagen
        $sqlImg = ("SELECT imagen FROM `mapa` WHERE id_planta = '$id_planta'");
        $imagenes = mysqli_query($mysqli, $sqlImg);

        $nombreImagen = [];

        while ($img = mysqli_fetch_array($imagenes)) {
            $nombreImagen[] = $img[0];
        }

        if (isset($nombreImagen[0])) {
            if (file_exists("../img/imagenesPlantas/" . $nombreImagen[0])) {
                unlink("../img/imagenesPlantas/" . $nombreImagen[0]);
            }
        }

        $sql = "UPDATE mapa SET imagen = '$nombreArchivo' WHERE id_planta = '$id_planta'";
        $ejecutar2 = mysqli_query($mysqli, $sql);
    }



    header("location: ../registrosPlantas.php");
}
