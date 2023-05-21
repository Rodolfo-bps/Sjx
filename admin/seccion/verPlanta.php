<?php

$id_planta = $_GET['id_planta'];

$sql = "SELECT * FROM mapa WHERE id_planta = '$id_planta' ";
$update = mysqli_query($mysqli, $sql);

while ($row = $update->fetch_assoc()) {

    $idPlanta = $row['id_planta'];
    $localidad = $row['localidad'];
    $direccion = $row['direccion'];
    $descripcion = $row['descripcion'];
    $imagen = $row['imagen'];
    $estado = $row['estado'];
    $latitud = $row['lat'];
    $longitud = $row['lng'];
    $altura = $row['altura'];
    $anchura = $row['anchura'];
}
