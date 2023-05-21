<?php 

if (isset($_REQUEST['btn_editar_perfil'])) {
    // variable de formulario
    $id = !empty($_POST['id_usuario']) ? $_POST['id_usuario'] : 0;
    $r = mysqli_query($mysqli, "SELECT * FROM usuarios WHERE id_usuario = '$id' ");
    // verificamos existencia de registro
    if (mysqli_num_rows($r) == false) {
        exit("No se encontro un ID a editar: " . $id);
    }
    // guardamos datos de registro en variable y liberamos consulta
    $datosUsuario = mysqli_fetch_array($r);
    mysqli_free_result($r);
}
