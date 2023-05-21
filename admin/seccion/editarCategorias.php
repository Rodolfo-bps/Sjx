<?php 

//EDITAR CATEGORIAS
// variable de formulario
$id_categoria = !empty($_POST['id_categoria']) ? $_POST['id_categoria'] : 0;
// consultamos registro segun ID
$r = mysqli_query($mysqli, "SELECT * FROM categorias WHERE id_categoria = '$id_categoria' ");
// verificamos existencia de registro
if (mysqli_num_rows($r) == false) {
    exit("No se encontro un ID a editar: " . $id_categoria);
}
// guardamos datos de registro en variable y liberamos consulta
$datosEditar = mysqli_fetch_array($r);
mysqli_free_result($r);
