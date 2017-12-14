<?php
error_reporting(0);
include ("../Modelo/conexion.php");
$objBase= new  conexion();
$id =$_GET['id'];
$idVenta=$_GET['id'];
$query="DELETE FROM detalle WHERE idDetalle='$id'";
$re=$objBase->query($query);
if($re){
    header("location:GestionarVenta.php");
}else{
    echo"mal";

}
?>