<?php 
// variable de formulario
$id_planta = !empty($_POST['id_planta']) ? $_POST['id_planta'] : 0;
// consultamos registro segun ID
$r = mysqli_query($mysqli, "SELECT * FROM mapa WHERE id_planta = '$id_planta' ");
// verificamos existencia de registro
if (mysqli_num_rows($r) == false) {
    exit("No se encontro un ID a editar: " . $id_planta);
}
// guardamos datos de registro en variable y liberamos consulta
$datosPlanta = mysqli_fetch_array($r);
mysqli_free_result($r);


$sqlCategorias = ("SELECT * FROM `categorias`");
$categorias = mysqli_query($mysqli, $sqlCategorias);
