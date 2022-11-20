//insertar
if ($_POST) {
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


    //no volver a insertar
    header("Location: plantasAgregar.php");
}

if ($_GET) {
    $id_planta = $_GET['borrar'];

    //borrar imagen
    $imagen = ("SELECT imagen FROM `mapa` WHERE id_planta = " . $id_planta);
    $ejecutar = mysqli_query($db, $imagen);
    
    unlink("../imagenes/" . $imagen[0]['imagen']);


    $sql = "DELETE FROM mapa WHERE `mapa`.`id_planta` = " . $id_planta;
    $ejecutar = mysqli_query($db, $sql);
}

//leer

$sql = "SELECT * FROM `mapa`";
$ejecutar = mysqli_query($db, $sql);

