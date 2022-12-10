<?php

session_start();

if (!isset($_SESSION['id_usuario'])) {
    header("location: ../");
}

$rol = $_SESSION['rol'];
$id_usuario = $_SESSION["id_usuario"];
$tipo_usuario = $_SESSION["tipo_usuario"];
$nombre_usuario = $_SESSION['nombre_usuario'];
$nombre = $_SESSION['nombre'];


include_once("config.php");

$mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);


