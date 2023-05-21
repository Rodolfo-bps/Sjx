<?php 

$sqlPlant = "SELECT * FROM mapa";
if ($sqlPlant = mysqli_query($mysqli, $sqlPlant)) {
    $numPlant = mysqli_num_rows($sqlPlant);
}
$estado = "inactivo";
$sqlDanger = "SELECT estado FROM mapa WHERE estado = '$estado'";
if ($sqlDanger = mysqli_query($mysqli, $sqlDanger)) {
    $numDanger = mysqli_num_rows($sqlDanger);
}
