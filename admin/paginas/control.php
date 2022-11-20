<?php


//agregar
if (isset($_REQUEST['btn_guardar'])) {
    include("conexion.php");
    $direccion = $_POST['direccion'];
    $descripcion = $_POST['descripcion'];
    $imagen = $_FILES['imagen']['name'];
    $lat = $_POST['lat'];
    $lng = $_POST['lng'];

//no se repita la imagen
$fecha = new DateTime();
$imagen = $fecha->getTimestamp() . "_" . $_FILES['imagen']['name']; //para que no se repita
//tratar imagen
$imagen_temporal = $_FILES['imagen']['tmp_name'];
move_uploaded_file($imagen_temporal, "../imagenes/" . $imagen);

//insertar
$sql = "INSERT INTO `mapa` (`id_planta`, `direccion`, `descripcion`, `imagen`, `lat`, `lng`) VALUES (NULL, '$direccion', '$descripcion', '$imagen', '$lat', '$lng');";
$ejecutar = mysqli_query($db, $sql);

if($ejecutar){
    header("Location: plantasAgregar");
}else{
    echo "Hubo un error al guardar";
}
}
