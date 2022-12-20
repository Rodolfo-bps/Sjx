<?php


$localidades = ("SELECT * FROM mapa");
$rel = mysqli_query($mysqli, $localidades);

// Valores con PHP. Estos podrían venir de una base de datos o de cualquier lugar del servidor
$etiquetas =
    [
        "Barranca Salada", "Barrio San Pedro", "Canada Estaca", "Cañada San Miguel", "El Carrizal",
        "El Cuajilote", "El Mosco", "Gabino Barreda", "La Huertilla", "San Jeronimo Primera Seccion",
        "San Jeronimo Segunda Seccion",  "Santo Domingo Tonahuixtla", "Canada Sandia"
    ];

$localidad = [];
$localidadDic = [];

///////////////////////
$bSalada = 0;
$bsPedro = 0;
$cEstaca = 0;
$csMiguel = 0;
$eCarrizal = 0;
$eCuajilote = 0;
$eMosco = 0;
$gBarreda = 0;
$lHuertilla = 0;
$sjPrimera = 0;
$sjSegunda = 0;
$sPedro = 0;
$sdTona = 0;
$cSandia = 0;

while ($row = $rel->fetch_assoc()) {
    $localidad = $row['localidad'];
    if ($localidad == $etiquetas[0]) {
        $bSalada += 1;
    } else if ($localidad == $etiquetas[1]) {
        $bsPedro += 1;
    } else if ($localidad == $etiquetas[2]) {
        $cEstaca += 1;
    } else if ($localidad == $etiquetas[3]) {
        $csMiguel += 1;
    } else if ($localidad == $etiquetas[4]) {
        $eCarrizal += 1;
    } else if ($localidad == $etiquetas[5]) {
        $eCuajilote += 1;
    } else if ($localidad == $etiquetas[6]) {
        $eMosco += 1;
    } else if ($localidad == $etiquetas[7]) {
        $gBarreda += 1;
    } else if ($localidad == $etiquetas[8]) {
        $lHuertilla += 1;
    } else if ($localidad == $etiquetas[9]) {
        $sjPrimera += 1;
    } else if ($localidad == $etiquetas[10]) {
        $sjSegunda += 1;
    
    } else if ($localidad == $etiquetas[11]) {
        $sdTona += 1;
    } else if ($localidad == $etiquetas[12]) {
        $cSandia += 1;
    }
}

$datosVentas = [$bSalada, $bsPedro, $cEstaca, $csMiguel, $eCarrizal, $eCuajilote, $eMosco, $gBarreda, $lHuertilla, $sjPrimera, $sjSegunda,  $sdTona, $cSandia];

$valores =
    [
        "Barranca Salada" => $bSalada, "Barrio San Pedro" => $bsPedro, "Canada Estaca" => $cEstaca, "Canada San Miguel" => $csMiguel, "El Carrizal" => $eCarrizal,
        "El Cuajilote" => $eCuajilote, "El Mosco" => $eMosco, "Gabino Barreda" =>  $gBarreda, "La Huertilla" => $lHuertilla, "San Jeronimo Primera Seccion" => $sjPrimera,
        "San Jeronimo Segunda Seccion" => $sjSegunda,  "Santo Domingo Tonahuixtla" => $sdTona, "Canada Sandia" => $cSandia
    ];

$maxPlantas = max($valores);
$minPlantas = min($valores);

$mayor = [];
$menor = [];

foreach ($valores as $valor => $key) {
    if ($key == $maxPlantas) {
        $mayorV = ($valor . " : " . $key);
        $mayor[] = $mayorV;
    } else if ($key == $minPlantas) {
        $menorV = ($valor . " : " . $key);
        $menor[] = $menorV;
    }
}

//obtener dia, mes y anio

$fecha = date("y-m-d");

//obtener los ultimos 7 dias
$dia = date('Y-m-d', strtotime($fecha . '- 7 days'));
$sqlDias = ("SELECT fecha_registro FROM mapa WHERE fecha_registro BETWEEN '$dia' AND '$fecha'");
if ($sqlDias = mysqli_query($mysqli, $sqlDias)) {
    $sqlDias = mysqli_num_rows($sqlDias);
}

//obtener los del mes
$mes = date('Y-m-d', strtotime($fecha . '- 1 month'));
$sqlMeses = ("SELECT fecha_registro FROM mapa WHERE fecha_registro BETWEEN '$mes' AND '$fecha'");
if ($sqlMeses = mysqli_query($mysqli, $sqlMeses)) {
    $sqlMeses = mysqli_num_rows($sqlMeses);
}


//obtener los del anio
$anio = date('Y-m-d', strtotime($fecha . '- 1 year'));

$sqlAnio = ("SELECT fecha_registro FROM mapa WHERE fecha_registro BETWEEN '$anio' AND '$fecha'");
if ($sqlAnio = mysqli_query($mysqli, $sqlAnio)) {
    $sqlAnio = mysqli_num_rows($sqlAnio);
}

//obtener los del anio
$sqlNumero = ("SELECT * FROM mapa");
if ($sqlNumero = mysqli_query($mysqli, $sqlNumero)) {
    $sqlNumero = mysqli_num_rows($sqlNumero);
}

$etiquetas = ["Ultimos 7 dias", "Ultimo Mes", "Ultimo Anio"];
$datosYmd = [$sqlDias, $sqlMeses, $sqlAnio];
