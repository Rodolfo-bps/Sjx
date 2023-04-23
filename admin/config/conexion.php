<?php
date_default_timezone_set('America/Mexico_City');
$mysqli = @mysqli_connect("localhost", "root", "", "bsmapas");
if(!$mysqli) {
    exit("<div style='color: red; text-align:center; padding: 150px;'>Ha ocurrido un error al conectar a la base de datos:<br><br>".mysqli_connect_error()."</div>");
}

?>