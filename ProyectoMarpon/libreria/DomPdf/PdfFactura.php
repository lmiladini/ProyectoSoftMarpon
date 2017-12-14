<?php
error_reporting(0);
require "../../Modelo/Detalle.php";
require "../../Controller/ProductoController.php";
require "../../Modelo/Venta.php";
require "../../Controller/VentaController.php";
require "../../Controller/ClienteController.php";
?>

<?php ob_start();
$id = $_GET["id"];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="ThemeBucket">

    <title>Gastos</title>

</head>
<body>
<style>
    /* Definimos una clase para usar con tablas, y aplicamos bordes a
       los distintos elementos (tabla, encabezado, filas y columnas) */
    .tabla-con-borde,
    .tabla-con-borde th,
    .tabla-con-borde tr,
    .tabla-con-borde td {
        border: 1px solid;
        padding: 4px;
        border-collapse: collapse;
    }
    /* estilo para el título de la tabla */
    .tabla-con-borde caption {
        font-weight: bold;
    }

    /* definir fondo para encabezado y pie de tabla */
    .tabla-con-borde thead, .tabla-con-borde tfoot {
        background: #395870;
        background: linear-gradient(#49708f, #293f50);
        color: white;
    }
    /* resaltar una fila al pasar con el ratón */
    .tabla-con-borde tbody tr:hover {
        /* El modificador "important" se usa para forzar la especificidad
           sobre otras reglas */
        background-color: lightblue!important;
    }
    /* cambiar el color de fondo para filas impares en cuerpo de tabla */
    .tabla-con-borde tbody tr:nth-child(odd) {
        background-color: #eee;
    }
    /* para alinear a la derecha las cifras en celdas de tabla */
    .derecha {
        text-align: right;
    }

</style>
<section id="main-content">
<?php
$id=$_GET["id"];
$arrDe = Detalle ::getAll();
foreach ($arrDe as $Regrecep){
if($Regrecep->getVenta()==$id){
?>
    <?php
    $idVenta = $Regrecep->getVenta();
    $a = VentaController::buscarID($idVenta);
    $Conse = $a->getConsecutivo();
    $fec = $a->getFecha();
    $cl = $a ->getClientes();
    ?>

    <?php
    $id=$cl;
    $arrVenta = Venta ::getAll();
    foreach ($arrVenta  as $Regrecepa){
    if($Regrecepa->getClientes()==$id){
    ?>

    <?php
    $idCliente = $Regrecepa->getClientes();
    $g = ClienteController::buscarID($idCliente);
    $nombre = $g ->getNombre();
    $Ape = $g ->getApellido();
    $Doc = $g ->getDocumento();
    ?>
    <?php }} ?>
    <h4 align="center">Factura Numero: <?php echo $Conse ?></h4>
    <h4>Fecha: <?php echo $fec?></h4>
    <h4><b>Nombre: <?php echo $nombre ?></b> <b><?php echo $Ape?> </b> <b>Documento: <?php echo $Doc ?></b></h4>

<?php }} ?>
</section>
<section id="main-content">


        <table class="tabla-con-borde" >
        <thead>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Valor Unitario</th>
            <th>Valor Total</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $id=$_GET["id"];
        $arrDe = Detalle ::getAll();
        foreach ($arrDe as $Regrecep){
            if($Regrecep->getVenta()==$id){
                ?>
                <tr>
                    <?php
                    $idVenta = $Regrecep->getVenta();
                    $a = VentaController::buscarID($idVenta);
                    $nombreVen = $a->getConsecutivo();
                    ?>
                    <?php
                    $idProducto = $Regrecep->getProducto();
                    $r = ProductoController::buscarID($idProducto );
                    $nombrePro = $r->getNombre();
                    ?>
                    <td><?php echo $nombrePro ?></td>
                    <td><?php echo $Regrecep->getCantidad(); ?></td>
                    <td><?php echo $Regrecep->getValorUnitario(); ?></td>
                    <td><?php echo $Regrecep->getTotal(); ?></td>
                    <?php $t += $Regrecep->getTotal(); ?>
                </tr>
            <?php }} ?>
        </tbody>
    </table>

</section>

<h4>El valor a pagar es: <?php  echo $t ?></h4>
<!-- END JAVASCRIPTS -->
<script>
    jQuery(document).ready(function () {
        EditableTable.init();
    });
</script>


</body>
</html>
<?php

require_once 'autoload.inc.php';

use Dompdf\Dompdf;

$donpdf = new Dompdf;
$donpdf->loadHTML(ob_get_clean());
$donpdf->render();
/* header('Content-type: application/pdf');
 echo $dompdf->output(); */

$pdf = $donpdf->output();
$donpdf->stream();
$file_name = 'nombre.pdf';
$donpdf->stream(setPaper('A4', 'landscape'));

?>
