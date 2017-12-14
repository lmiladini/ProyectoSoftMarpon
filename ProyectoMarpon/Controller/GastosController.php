<?php

/**
 * Created by PhpStorm.
 * User: johana
 * Date: 20/11/2017
 * Time: 14:29
 */
require_once (__DIR__.'/../Modelo/Gastos.php');
if(!empty($_GET['action'])){
    GastosController::main($_GET['action']);
}else{
    echo "";
}
class GastosController
{
    static function main($action)
    {
        if ($action == "crear") {
            GastosController::crear();
        } else if ($action == "editar") {
            GastosController::editar();
        }else if ($action == "buscarID") {
            GastosController::buscarID();

        }
    }
    static public function crear (){

            try {

            $arrayGastos = array();
            $arrayGastos['idGastos'] = $_POST['idGastos'];
            $arrayGastos['Nombre'] = $_POST['Nombre'];
            $arrayGastos['Apellido'] = $_POST['Apellido'];
            $arrayGastos['Documento'] = $_POST['Documento'];
            $arrayGastos['Fecha'] = $_POST['Fecha'];
            $arrayGastos['Descripcion'] = $_POST['Descripcion'];
            $arrayGastos['Horas'] = $_POST['Horas'];
            $arrayGastos['Valor_Hora'] = $_POST['Valor_Hora'];
            $arrayGastos['Producto'] = $_POST['Producto'];
            $arrayGastos['Total'] = $_POST['Valor_Hora'] * $_POST['Horas'] ;

            $Gastos = new Gastos ($arrayGastos);
            $Gastos->insertar();
            header("Location: ../Vista/GestionarGastos.php?respuesta=correcto");
        } catch (Exception $e) {
            var_dump($e);
            //header("Location: ../vista/createEmpleados.php?respuesta=error");
        }
    }
    static public function buscarID ($id){
        try {
            return  Gastos::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../Vista/GestionarGastos.php?respuesta=correcto");
        }
    }
    public function buscarAll (){
        try {
            return Gastos::getAll();
        } catch (Exception $e) {
            header("Location: ../Vista/GestionarGastos.php?respuesta=correcto");
        }
    }

    public function buscar ($Query){
        try {
            return Gastos::buscar($Query);
        } catch (Exception $e) {
            header("Location: ../Vista/GestionarGastos.php?respuesta=correcto");
        }
    }
    static public function editar (){
        try {
            $arrayGastos = array();
            $arrayGastos['Nombre'] = $_POST['Nombre'];
            $arrayGastos['Apellido'] = $_POST['Apellido'];
            $arrayGastos['Documento'] = $_POST['Documento'];
            $arrayGastos['Fecha'] = $_POST['Fecha'];
            $arrayGastos['Descripcion'] = $_POST['Descripcion'];
            $arrayGastos['Horas'] = $_POST['Horas'];
            $arrayGastos['Valor_Hora'] = $_POST['Valor_Hora'];
            $arrayGastos['Producto'] = $_POST['Producto'];
            $arrayGastos['Total'] = $_POST['Horas'] * $_POST['Valor_Hora'];
            $arrayGastos['idGastos'] = $_POST['idGastos'];
            $Gastos = new Gastos ($arrayGastos);
            var_dump($arrayGastos);
            $Gastos->editar();
            echo "Edito";
            header("Location: ../Vista/GestionarGastos.php?respuesta=correcto");

        } catch (Exception $e) {
            header("Location: ../Vista/GestionarGastos.php?respuesta=error");
        }
    }

}