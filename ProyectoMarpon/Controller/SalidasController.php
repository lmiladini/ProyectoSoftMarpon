<?php
/**
 * Created by PhpStorm.
 * User: Paula
 * Date: 22/11/2017
 * Time: 9:42
 */
require_once (__DIR__.'/../Modelo/Salidas.php');

if(!empty($_GET['action'])){
    SalidasController::main($_GET['action']);
}else{

}
class SalidasController
{
    static function main($action)
    {
        if ($action == "crear") {
            SalidasController::crear();
        } else if ($action == "editar") {
            SalidasController::editar();
        } else if ($action == "buscarID") {
            SalidasController::buscarID();


        }
    }

    static public function crear(){

        try {
            $arraySalida = array();
$tip = $_POST['Tipo_Materia'];
            $arraySalida ['Producto'] = $_POST['Producto'];
            $arraySalida ['Tipo_Materia'] = $_POST['Tipo_Materia'];
            $conexion = mysqli_connect("localhost", "root", "");
            mysqli_select_db($conexion , "marpo");
            $query_offers = "SELECT * FROM Tipo_Materia WHERE idTipo_Materia = '".$tip."'";

            $offers = mysqli_query($conexion,$query_offers);
            $var = 0;

            while ($row = $offers->fetch_array()) {
                $var = $row['Cantidad'];
            }

                if ( $arraySalida ['Cantidad'] > $var){
                echo "No bestia";
                    header("Location: ../Vista/GestionarSalidas.php?Cantidad='$var'");
                xdebug_break();
                    $arraySalida ['Cantidad'] = $_POST['Cantidad'];
                }else{
                    header("Location: ../Vista/GestionarSalidas.php?Cantidad='$var'");
                    $arraySalida ['Cantidad'] = $var;
                }

            $arraySalida ['Fecha'] = $_POST['Fecha'];


            $Salida = new Salidas($arraySalida);
            $Salida->insertar();
            header("Location: ../Vista/GestionarSalidas.php?respuesta=correcto'$var'");
        } catch (Exception $e) {
            var_dump($e);
            //  header("Location: ../Vista/CreateSalidas.php?respuesta=error");
        }
    }
    static public function editar()
    {
        try {
            $arraySalida = array();

            $arraySalida ['Producto'] = $_POST['Producto'];
            $arraySalida ['Tipo_Materia'] = $_POST['Tipo_Materia'];
            $arraySalida ['Cantidad'] = $_POST['Cantidad'];
            $arraySalida ['Fecha'] = $_POST['Fecha'];

            $arraySalida ['idSalidas'] = $_POST['idSalidas'];

            $salida = new Salidas($arraySalida);
            $salida->editar();
            header("Location: ../Vista/GestionarSalidas.php?respuesta=correcto");
        } catch (Exception $e) {
            var_dump($arraySalida);
           // header("Location: ../Vista/editarSalidas.php?respuesta=error");
        }
    }
    static public function buscarID($id)
    {
        try {
            return Salidas::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../Vista/GestionarSalidas.php?respuesta=error");
        }
    }

    public function buscarAll()
    {
        try {
            return Salidas::getAll();
        } catch (Exception $e) {
            header("Location: ../Vista/GestionarSalidas.php?respuesta=error");
        }
    }

    public function buscar($Query)
    {
        try {
            return Salidas::buscar($Query);
        } catch (Exception $e) {
            header("Location: ../Vista/GestionarSalidas.php?respuesta=error");
        }
    }
}