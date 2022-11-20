<?php

include_once("../config/conexion.php");

//agregar
if (isset($_REQUEST['btn_guardar'])) {
    $direccion = $_POST['direccion'];
    $localidad = $_POST['localidad'];
    $descripcion = $_POST['descripcion'];
    $imagen = $_FILES['imagen']['name'];
    $estado = $_POST['estado'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];

    //no se repita la imagen
    $fecha = new DateTime();
    $imagen = $fecha->getTimestamp() . "_" . $_FILES['imagen']['name']; //para que no se repita
    //tratar imagen
    $imagen_temporal = $_FILES['imagen']['tmp_name'];
    move_uploaded_file($imagen_temporal, "../img/imagenesPlantas/" . $imagen);

    //insertar
    $sql = "INSERT INTO mapa (id_planta, direccion, localidad ,descripcion, imagen, estado ,lat, lng) 
                VALUES (NULL, '$direccion', '$localidad', '$descripcion', '$imagen', '$estado' , '$lat', '$lng');";
    $ejecutar = mysqli_query($mysqli, $sql);


    header("location: ../registrosPlantas.php");
}


if (isset($_REQUEST['btn_eliminar'])) {

    $id_planta = $_POST['id_planta'];
    //borrar imagen
    $sql2 = ("SELECT imagen FROM `mapa` WHERE id_planta = '$id_planta'");
    $imagenes = mysqli_query($mysqli, $sql2);

    $nombreImagen = [];

    while ($imagen = mysqli_fetch_array($imagenes)) {
        if (isset($imagen)) {
            $nombreImagen[] = $imagen[0];
            if (file_exists("../img/imagenesPlantas/" . $nombreImagen[0])) {
                unlink("../img/imagenesPlantas/" . $nombreImagen[0]);
                $sql = ("DELETE FROM mapa WHERE id_planta = '$id_planta'");
                $ejecutar = mysqli_query($mysqli, $sql);
            } else {
                echo "Ocurrio un error";
            }
        }
    }

    header("location: ../registrosPlantas.php");
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


//reporte de grafica de mayor indice
//agregar
if (isset($_REQUEST['btn_reporte_planta'])) {
    $mayor = $_POST['mayor'];
    $fecha = $_POST['fecha'];
    $menor = $_POST['menor'];

    //insertar
    $sql = "INSERT INTO reporteIndice (id_mayor_indice, mayor, fecha_reporte ,menor) 
                VALUES (NULL, '$mayor', '$fecha', '$menor');";
    $ejecutar = mysqli_query($mysqli, $sql);


    header("location: ../estadisticas.php");
}


if (isset($_REQUEST['btn_eliminar_reporte'])) {

    $id_mayor_indice = $_POST['id_mayor_indice'];

    $sql = ("DELETE FROM reporteIndice WHERE id_mayor_indice = '$id_mayor_indice'");
    $ejecutar = mysqli_query($mysqli, $sql);


    header("location: ../estadisticas.php");
}