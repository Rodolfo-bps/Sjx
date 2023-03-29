<?php

session_start();
require_once("config/conexion.php");
if (!isset($_SESSION['id_usuario'])) {
    header("location: index.php");
}
$rol = $_SESSION['rol'];
$id_usuario = $_SESSION["id_usuario"];
$tipo_usuario = $_SESSION["tipo_usuario"];
$nombre_usuario = $_SESSION['nombre_usuario'];
$nombre = $_SESSION['nombre'];
