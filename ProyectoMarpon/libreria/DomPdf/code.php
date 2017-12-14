<?php
error_reporting(0);
require "../../Modelo/Gastos.php";
require ("../../Controller/ProductoController.php");

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
            $id = $_GET["id"];
            $arrayGastos = Gastos::getAll();
            foreach ($arrayGastos as $Regrecep) {
            if ($Regrecep->getProducto() == $id) {
    ?>
    <?php
            $idProducto = $Regrecep->getProducto();
    $r = ProductoController::buscarID($idProducto);
    $nombre = $r->getNombre();
    ?>
    <h2 align="center">Gasto del producto <?php echo $nombre ?></h2>
    <table class="tabla-con-borde" >
        <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Documento</th>
            <th scope="col">Fecha</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Horas</th>
            <th scope="col">Valor_Hora</th>
            <th scope="col">Producto</th>
            <th scope="col">Total</th>
        </tr>
        </thead>
        <tbody>
        <?php
                $id = $_GET["id"];
                $arrayGastos = Gastos::getAll();
                foreach ($arrayGastos as $Regrecep) {
                    if ($Regrecep->getProducto() == $id) {
        ?>
        <tr>
            <?php
                            $idProducto = $Regrecep->getProducto();
            $r = ProductoController::buscarID($idProducto);
            $nombre = $r->getNombre();
            ?>
            <td><?php echo $Regrecep->getNombre(); ?></td>
            <td><?php echo $Regrecep->getApellido(); ?></td>
            <td><?php echo $Regrecep->getDocumento(); ?></td>
            <td><?php echo $Regrecep->getFecha(); ?></td>
            <td><?php echo $Regrecep->getDescripcion(); ?></td>
            <td><?php echo $Regrecep->getHoras(); ?></td>
            <td><?php echo $Regrecep->getValorHora(); ?></td>
            <td><?php echo $nombre ?></td>
            <td><?php echo $Regrecep->getTotal(); ?></td>
        </tr>
        <?php }
                } ?>
        </tbody>
    </table>
    <?php }
            } ?>
</section>
<!-- END JAVASCRIPTS -->
<script>
    jQuery(document).ready(function () {
        EditableTable.init();
    });
</script>


</body>
</html>