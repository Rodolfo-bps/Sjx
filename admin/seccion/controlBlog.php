<?php

include_once("../config/conexion.php");


if (isset($_REQUEST['btn_actualizar_blog'])) {
    //metodo post
    $id_blog = $_POST['id_blog'];
    $nombre_blog = $_POST['nombre_blog'];

    $sqlUser = "UPDATE blog SET nombre_blog = '$nombre_blog' WHERE id_blog = '$id_blog'";
    $ejecutar = mysqli_query($mysqli, $sqlUser);

    header("location: http://localhost/sjx/admin/registrosBlog");
}
