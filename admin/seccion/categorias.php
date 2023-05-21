<?php

$sql = "SELECT * FROM categorias";
$relCategorias = mysqli_query($mysqli, $sql);
$numCategorias = mysqli_num_rows($relCategorias);

//====================================
$sql = "SELECT * FROM mapa";
$registrosPlantas = mysqli_query($mysqli, $sql);
$numPlantas = mysqli_num_rows($registrosPlantas);


//===============================
$sql = "SELECT * FROM blog";
$rel = mysqli_query($mysqli, $sql);
$numBlog = mysqli_num_rows($rel);


//===============
//USUARIOS.PHP
if ($tipo_usuario == 1) {
    $where = "";
} else if ($tipo_usuario = 2) {
    $where = "WHERE id_usuario = '$id_usuario'";
}

$sql2 = "SELECT * FROM usuarios $where";
$resultadoUsuarios = mysqli_query($mysqli, $sql2);
$numUser = mysqli_num_rows($resultadoUsuarios);
