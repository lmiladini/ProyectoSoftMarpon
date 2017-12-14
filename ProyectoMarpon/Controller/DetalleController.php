<?php
require_once (__DIR__ . '/../Modelo/Detalle.php');

if(!empty($_GET['action'])){
    DetalleController::main($_GET['action']);
}else{
    echo "";
}


/**
 * Created by PhpStorm.
 * User: Paula
 * Date: 19/11/2017
 * Time: 22:16
 */





class DetalleController
{
    /**
     * @param $action
     */
    static function main($action)
    {
        if ($action == "crear") {
            DetalleController::crear();
        } else if ($action == "editar") {
            DetalleController::editar();
        } else if($action == "select") {
                DetalleController::select();
        } else if ($action == "eliminar") {
            DetalleController::eliminar();
        } else if ($action == "buscarID") {
            DetalleController::buscarID();

        }
    }

    static public function crear()
    {

        try {

            $arrayDe = array();

            $arrayDe['Valor_Unitario']=$_POST['Valor_Unitario'];
            $arrayDe['Venta'] = $_POST['Venta'];
            $arrayDe['Producto'] = $_POST['Producto'];
            $arrayDe['Cantidad'] = $_POST['Cantidad'];
            $arrayDe['Total']= $_POST['Valor_Unitario'] * $_POST['Cantidad'];
            $Detalle = new Detalle($arrayDe);
            $Detalle->insertar();
            header("Location: ../Vista/Detalle.php?respuesta=1");
        } catch (Exception $e) {
      // var_dump($arrayDe);
          header("Location: ../Vista/Detalle.php?respuesta=0");

        }

    }






    static public function tdTabla($id){
        $arrarProducto = Producto::buscarForId($id);
        $htmlSelect ="<td>".$arrarProducto->getPrecio()."</td>";

        return $htmlSelect;
    }

    static public function editar()
    {
        try {


            $arrayDe = array();
            $arrayDe['Valor_Unitario']=$_POST['Valor_Unitario'];
            $arrayDe['Venta'] = $_POST['Venta'];
            $arrayDe['Producto'] = $_POST['Producto'];
            $arrayDe['Cantidad'] = $_POST['Cantidad'];
            $arrayDe['Total']= $_POST['Valor_Unitario'] * $_POST['Cantidad'];

            $Detalle = new Detalle($arrayDe);
            $Detalle->insertar();
            header("Location: ../Vista/listDetalle.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/listDetalle.php?respuesta=error");

        }
    }

    static public function buscarID($id)
    {
        try {
            return Producto::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../Vista/listDetalle.php?respuesta=error");
        }
    }

    public function buscarAll()
    {
        try {
            return Producto::getAll();
        } catch (Exception $e) {
            header("Location: ../Vista/listDetalle.php?respuesta=error");
        }
    }

    public function buscar($Query)
    {
        try {
            return Producto::buscar($Query);
        } catch (Exception $e) {
            header("Location: ../Vista/listDetalle.php?respuesta=error");
        }
    }






}

