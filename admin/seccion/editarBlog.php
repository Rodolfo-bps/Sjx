<?php


// EDITAR BLOG
// variable de formulario
$id_blog = !empty($_POST['id_blog']) ? $_POST['id_blog'] : 0;
// consultamos registro segun ID
$r = mysqli_query($mysqli, "SELECT * FROM blog WHERE id_blog = '$id_blog' ");
// verificamos existencia de registro
if(mysqli_num_rows($r)==false) {  exit("No se encontro un ID a editar: ".$id_blog); }
// guardamos datos de registro en variable y liberamos consulta
$datos = mysqli_fetch_array($r); mysqli_free_result($r);


