<?php
/**
 * Created by PhpStorm.
 * User: Paula
 * Date: 22/11/2017
 * Time: 9:42
 */
require_once (__DIR__.'/../Modelo/Ingresos.php');

if(!empty($_GET['action'])){
    IngresosController::main($_GET['action']);
}else{

}
class IngresosController
{
    static function main($action)
    {
        if ($action == "crear") {
            IngresosController::crear();
        } else if ($action == "editar") {
            IngresosController::editar();
        } else if ($action == "buscarID") {
            IngresosController::buscarID();


        }
    }

    static public function crear(){

        try {
            
            $arrayIngreso = array();

            $arrayIngreso ['Tipo_Materia'] = $_POST['Tipo_Materia'];
            $arrayIngreso ['Proveedor'] = $_POST['Proveedor'];
            $arrayIngreso ['Cantidad'] = $_POST['Cantidad'];
            $arrayIngreso ['Fecha'] = $_POST['Fecha'];
            $arrayIngreso ['Valor_Unitario'] = $_POST['Valor_Unitario'];

            $Ingresos= new Ingresos($arrayIngreso);
            $Ingresos->insertar();
           header("Location: ../Vista/GestionarIngresos.php?respuesta=correcto");
        } catch (Exception $e) {
             var_dump( $arrayIngreso);
            // header("Location: ../Vista/CreateIngresos.php?respuesta=error");
        }
    }
    static public function editar()
    {
        try {
            $arrayIngreso = array();

            $arrayIngreso ['Tipo_Materia'] = $_POST['Tipo_Materia'];
            $arrayIngreso ['Proveedor'] = $_POST['Proveedor'];
            $arrayIngreso ['Cantidad'] = $_POST['Cantidad'];
            $arrayIngreso ['Fecha'] = $_POST['Fecha'];
            $arrayIngreso ['Valor_Unitario'] = $_POST['Valor_Unitario'];
            $arrayIngreso ['idIngresos'] = $_POST['idIngresos'];
            $ingreso= new Ingresos($arrayIngreso);
            $ingreso->editar();
            header("Location: ../Vista/GestionarIngresos.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/editarIngresos.php?respuesta=error");
        }
    }
    static public function buscarID($id)
    {
        try {
            return Ingresos::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../Vista/GestionarIngresos.php?respuesta=error");
        }
    }

    public function buscarAll()
    {
        try {
            return Ingresos::getAll();
        } catch (Exception $e) {
            header("Location: ../Vista/GestionarIngresos.php?respuesta=error");
        }
    }

    public function buscar($Query)
    {
        try {
            return Ingresos::buscar($Query);
        } catch (Exception $e) {
            header("Location: ../Vista/GestionarIngresos.php?respuesta=error");
        }
    }
}