<?php 

//saber numero de usuarios
$sqlUser = "SELECT * FROM usuarios";
if ($resulUser = mysqli_query($mysqli, $sqlUser)) {
    $numUser = mysqli_num_rows($resulUser);
}

$sqlPlant = "SELECT * FROM mapa";
if ($sqlPlant = mysqli_query($mysqli, $sqlPlant)) {
    $numPlant = mysqli_num_rows($sqlPlant);
}

$estado = "inactivo";

$sqlDanger = "SELECT estado FROM mapa WHERE estado = '$estado'";
if ($sqlDanger = mysqli_query($mysqli, $sqlDanger)) {
    $numDanger = mysqli_num_rows($sqlDanger);
}

$estd = "activo";

$sqlActive = "SELECT estado FROM mapa WHERE estado = '$estd'";
if ($sqlActive = mysqli_query($mysqli, $sqlActive)) {
    $sqlActive = mysqli_num_rows($sqlActive);
}

$sql = "SELECT nombre, apellidos FROM usuarios WHERE id_usuario = '$id_usuario' ";
$usuario = mysqli_query($mysqli, $sql);

while ($row = $usuario->fetch_assoc()) {

    $nombre_usuario = $row['nombre'];
    $apellidos = $row["apellidos"];
}


$pass = "Sjx101";

$pass_c = sha1($pass);

$sqlPass = ("SELECT password FROM usuarios WHERE id_usuario='$id_usuario'");
$resultado = $mysqli->query($sqlPass);

//si hay usuario o no
$num = $resultado->num_rows;
//traer usuario de post y de la bd
$row = $resultado->fetch_assoc();
$password_bd = $row["password"];
