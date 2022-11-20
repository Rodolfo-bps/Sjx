<?php
ob_start();

include('conexion.php');

$sql = "SELECT * FROM mapa";
$ejecutar = mysqli_query($conexion, $sql);
?>

    <h2 style="text-align: center;">Reportes Soriana</h2>
    <h5 style="text-align: center;">Una dos tres</h5>
    <br>
    <br>
    <label for="">Nombre</label>
    <input type="text">
    <br><br>
    <table id="customers" style="color: #fff;">

        <thead>
            <tr>
                <th>ID</th>
                <th>direccion</th>
                <th>descripcion</th>
                <th>imagen</th>
                <th>Latitud</th>
                <th>Longitud</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($fila = mysqli_fetch_array($ejecutar)) { ?>
                <tr>
                    <th><?php echo $fila[0]; ?></th>
                    <th><?php echo $fila[1]; ?></th>
                    <th><?php echo $fila[2]; ?></th>
                    <th><?php echo $fila[3]; ?></th>
                    <!--   <img src="imagenes/<?php /*echo $fila[3];*/ ?>" alt="" width="100">-->
                    <th><?php echo $fila[4]; ?></th>
                    <th><?php echo $fila[5]; ?></th>
                </tr>
            <?php } ?>
        </tbody>

    </table>

<?php
$html = ob_get_clean();
echo $html; 

require_once 'libreria/dompdf/autoload.inc.php';

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled' => true));
$dompdf->setOptions($options);

$dompdf->loadHtml($html);

$dompdf->setPaper('letter');

$dompdf->render();

$dompdf->stream("archivo_.pdf", array("Attachment" => false));

?>