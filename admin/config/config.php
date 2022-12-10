<?php


session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("location: ../index.php");
}

$rol = $_SESSION['rol'];
$id_usuario = $_SESSION["id_usuario"];
$tipo_usuario = $_SESSION["tipo_usuario"];
$nombre_usuario = $_SESSION['nombre_usuario'];
$nombre = $_SESSION['nombre'];


//Conexion
define("DB_SERVER", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "bsmapas");

define("NAME_PAGE", "SJX");


?>