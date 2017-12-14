<?php
/**
 * Created by PhpStorm.
 * User: Paula
 * Date: 28/11/2017
 * Time: 17:09
 */
require '../Modelo/conexion.php';
$objBase= new conexion();

print_r($_POST);
$in= $objBase->prepare('INSERT INTO detalle VALUES (NULL ,:Valor_Unitario,:Venta,:Producto,:Cantidad,:Total)');

$to= $_POST['Valor_Unitario'] * $_POST['Cantidad'];

$in->bindParam(':Valor_Unitario',$_POST['Valor_Unitario']);
$in->bindParam(':Venta',$_POST['Venta']);
$in->bindParam(':Producto',$_POST['Producto']);
$in->bindParam(':Cantidad',$_POST['Cantidad']);
$in->bindParam(':Total',$to);

$in->execute();

header('location:Segunda.php');
?>