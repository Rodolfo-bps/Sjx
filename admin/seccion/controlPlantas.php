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
    $categoria = $_POST['categoria'];

    //no se repita la imagen
    $fecha = new DateTime();
    $imagen = $fecha->getTimestamp() . "_" . $_FILES['imagen']['name']; //para que no se repita
    //tratar imagen
    $imagen_temporal = $_FILES['imagen']['tmp_name'];
    move_uploaded_file($imagen_temporal, "../img/imagenesPlantas/" . $imagen);

    //insertar
    $sql = "INSERT INTO mapa (id_planta, direccion, localidad ,descripcion, imagen, estado ,lat, lng, categoria) 
                VALUES (NULL, '$direccion', '$localidad', '$descripcion', '$imagen', '$estado' , '$lat', '$lng', '$categoria');";
    $ejecutar = mysqli_query($mysqli, $sql);

    header("location: http://localhost/sjx/admin/registrosPlantas");

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

    header("location: http://localhost/sjx/admin/registrosPlantas");
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
    $categoria = $_POST['categoria'];
    $fecha_actualizacion = $_POST['fecha_actualizacion'];
    $imagen = $_FILES['imagen']['name'];

    $fecha_baja = date('Y-m-d');

    if ($estado == 'inactivo') {
        $sqlUser = "UPDATE mapa SET fecha_baja = '$fecha_baja' WHERE id_planta = '$id_planta'";
        $ejecutar = mysqli_query($mysqli, $sqlUser);
    }

    $sqlUser = "UPDATE mapa SET direccion = '$direccion', localidad = '$localidad' ,descripcion = '$descripcion', estado = '$estado' , lat = '$lat', 
     lng = '$lng', categoria = '$categoria', fecha_actualizacion = '$fecha_actualizacion' WHERE id_planta = '$id_planta'";
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



    header("location: http://localhost/sjx/admin/registrosPlantas");
}


//reporte de grafica de mayor indice
//agregar
if (isset($_REQUEST['btn_reporte_planta'])) {
    $mayor = $_POST['mayor'];
    $fecha = $_POST['fecha'];
    $menor = $_POST['menor'];
    $dia_ultimo = $_POST['dia_ultimo'];
    $mes_ultimo = $_POST['mes_ultimo'];
    $anio_ultimo = $_POST['anio_ultimo'];
    //insertar
    $sql = "INSERT INTO reporteIndice (id_mayor_indice, mayor, fecha_reporte ,menor, dia_ultimo, mes_ultimo, anio_ultimo) 
                VALUES (NULL, '$mayor', '$fecha', '$menor', '$dia_ultimo', '$mes_ultimo', '$anio_ultimo');";
    $ejecutar = mysqli_query($mysqli, $sql);


    header("location: http://localhost/sjx/admin/estadisticas");
}


if (isset($_REQUEST['btn_eliminar_reporte'])) {

    $id_mayor_indice = $_POST['id_mayor_indice'];

    $sql = ("DELETE FROM reporteIndice WHERE id_mayor_indice = '$id_mayor_indice'");
    $ejecutar = mysqli_query($mysqli, $sql);


    header("location: http://localhost/sjx/admin/estadisticas");
}



//DAR DE BAJA A PLANTAS

if (isset($_REQUEST['btn_guardar_estado'])) {
    $fecha_baja = $_POST['fecha_baja'];
    $fecha_actualizacion = $_POST['fecha_actualizacion'];
    $estado = $_POST['estado'];

    $sqlUser = "UPDATE mapa SET fecha_baja = '$fecha_baja', fecha_actualizacion = '$fecha_actualizacion' ,estado = '$estado' WHERE id_planta = '$id_planta'";
    $ejecutar = mysqli_query($mysqli, $sqlUser);


    header("location: http://localhost/sjx/admin/estadisticas");
}
