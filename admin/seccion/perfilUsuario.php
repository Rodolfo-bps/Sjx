<?php 

if (isset($_SESSION['id_usuario'])) {
    $id = $_SESSION['id_usuario'];
    $r = mysqli_query($mysqli, "SELECT * FROM usuarios WHERE id_usuario = '$id' ");
    // verificamos existencia de registro
    if (mysqli_num_rows($r) == false) {
        exit("No se encontro un ID a editar: " . $id);
    }
    // guardamos datos de registro en variable y liberamos consulta
    $datosPerfil = mysqli_fetch_array($r);
    mysqli_free_result($r);
}
