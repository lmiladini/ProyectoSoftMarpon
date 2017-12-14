<?php
error_reporting(0);
require "../../Modelo/Gastos.php";
require ("../../Controller/ProductoController.php");
require "../../Modelo/Salidas.php";
require "../../Controller/TipoMateriaController.php";
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
            $arrayGastos = Gastos::getAll();
            foreach ($arrayGastos as $Regrecep){
            if($Regrecep->getProducto()==$id){

            ?>
            <?php
            $idProducto= $Regrecep->getProducto();
            $r = ProductoController::buscarID($idProducto);
            $nombre = $r->getNombre();
            ?>
                <h2 align="center">Gasto del producto <?php echo $nombre ?></h2>
                <h4 align="center">Gastos de Nomina</h4>
                <table class="tabla-con-borde" >
                <thead>
                <tr>
                    <th>Producto</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Documento</th>
                    <th>Fecha</th>
                    <th>Descripcion</th>
                    <th>Horas</th>
                    <th>Valor_Hora</th>
                    <th>Total</th>
                </tr>
                </thead>
                <tbody>

                <?php
                $id=$_GET["id"];
                $arrayGastos = Gastos::getAll();
                foreach ($arrayGastos as $Regrecep){
                    if($Regrecep->getProducto()==$id){

                        ?>
                        <?php
                        $idProducto= $Regrecep->getProducto();
                        $r = ProductoController::buscarID($idProducto);
                        $nombre = $r->getNombre();
                        ?>
                        <tr>
                        <td><?php echo $nombre ?></td>
                        <td><?php echo $Regrecep->getNombre(); ?></td>
                        <td><?php echo $Regrecep->getApellido(); ?></td>
                        <td><?php echo $Regrecep->getDocumento(); ?></td>
                        <td><?php echo $Regrecep->getFecha(); ?></td>
                        <td><?php echo $Regrecep->getDescripcion(); ?></td>
                        <td><?php echo $Regrecep->getHoras(); ?></td>
                        <td><?php echo $Regrecep->getValorHora(); ?></td>
                        <td><?php echo $Regrecep->getTotal(); ?></td>
                        <?php $tot = $tot + $Regrecep->getTotal(); ?>
                        </tr>
                    <?php }} ?>
                </tbody>
                </table>
            <?php }} ?>
        </section>
    <section id="main-content">
    <h4 align="center" >Gastos de Materia Prima</h4>
                <table class="tabla-con-borde" >
                    <thead>
                    <tr>

                        <th>Producto</th>
                        <th>Tipo_Materia</th>
                        <th>Cantidad</th>
                        <th>Fecha</th>
                        <th>Valor Unitario</th>
                        <th>Total</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $id=$_GET["id"];
                    $arrSalidas = Salidas ::getAll();
                    foreach ($arrSalidas as $list){
                        if($list->getProducto()==$id){

                            ?>

                            <tr>
                                <?php
                                $id = $list->getProducto();
                                $a = ProductoController::buscarID($id);
                                $nombre = $a->getNombre();
                                ?>
                                <?php
                                $id = $list->getTipoMateria();
                                $a = TipoMateriaController::buscarID($id);
                                $nombreMade = $a->getNombre();
                                $valorU = $a->getValor();
                                ?>
                                <td><?php echo $nombre ?></td>
                                <td><?php echo $nombreMade ?></td>
                                <td><?php echo $list->getCantidad(); ?></td>
                                <td><?php echo $list->getFecha(); ?></td>
                                <td><?php echo $valorU ?></td>
                                <td><?php $total = $valorU * $list->getCantidad(); echo $total; ?></td>
                                <?php $to = $to + $total; ?>
                            </tr>
                        <?php }}  ?>
                    </tbody>
                </table>

        </section>

    <h4>El valor del los gastos de Nomina es: <?php  echo $tot ?> </h4>
    <h4>El valor del los gastos de material es: <?php  echo $to ?></h4>
    <h4>El valor de los gastos totales del producto es: <?php  $tfinal = $tot + $to; echo $tfinal ?></h4>


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


