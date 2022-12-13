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


    header("location: http://localhost/sjx/admin/categorias");
}


if (isset($_REQUEST['btn_eliminar_categoria'])) {

    $id_categoria = $_POST['id_categoria'];

    $sql = ("DELETE FROM categorias WHERE id_categoria = '$id_categoria'");
    $ejecutar = mysqli_query($mysqli, $sql);

    header("location: http://localhost/sjx/admin/categorias");
}


if (isset($_REQUEST['btn_actualizar_categoria'])) {
    //metodo post
    $id_categoria = $_POST['id_categoria'];
    $nombre_categoria = $_POST['nombre_categoria'];
    $color_categoria = $_POST['color_categoria'];
   
    $sqlUser = "UPDATE categorias SET nombre_categoria = '$nombre_categoria', color_categoria = '$color_categoria' WHERE id_categoria = '$id_categoria'";
    $ejecutar = mysqli_query($mysqli, $sqlUser);

    header("location: http://localhost/sjx/admin/categorias");
}
