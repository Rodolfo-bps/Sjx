<?php
require("config/conexion.php");

function parseToXML($htmlStr)
{
  $xmlStr = str_replace('<', '&lt;', $htmlStr);
  $xmlStr = str_replace('>', '&gt;', $xmlStr);
  $xmlStr = str_replace('"', '&quot;', $xmlStr);
  $xmlStr = str_replace("'", '&#39;', $xmlStr);
  $xmlStr = str_replace("&", '&amp;', $xmlStr);
  return $xmlStr;
}


$query = "SELECT * FROM mapa;";
$result = mysqli_query($mysqli, $query);
if (!$result) {
  die('Invalidproyecto query: ' . mysqli_error());
}

header("Content-type: text/xml");


echo "<?xml version='1.0' ?>";
echo '<markers>';
$ind = 0;

while ($row = @mysqli_fetch_assoc($result)) {

  echo '<marker ';
  echo 'id_planta="' . $row['id_planta'] . '" ';
  echo 'direccion="' . $row['direccion'] . '" ';
  echo 'descripcion="' . parseToXML($row['descripcion']) . '" ';
  echo 'imagen="' . $row['imagen'] . '" ';
  echo 'lat="' . $row['lat'] . '" ';
  echo 'lng="' . $row['lng'] . '" ';
  echo '/>';
  $ind = $ind + 1;
}


echo '</markers>';

