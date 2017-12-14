<?php
/**
 * Created by PhpStorm.
 * User: forero
 * Date: 19/11/2017
 * Time: 19:01
 */
require_once (__DIR__.'/../Modelo/Venta.php');

if(!empty($_GET['action'])){
    VentaController::main($_GET['action']);
}else{
    echo "";
}
class VentaController
{
    static function main($action)
    {
        if ($action == "crear") {
            VentaController::crear();
        } else if ($action == "editar") {
            VentaController::editar();
        } else if ($action == "buscarID") {
            VentaController::buscarID();


        }
    }

    static public function crear(){

        try {
            $arrayVenta = array();

            $arrayVenta ['Fecha'] = $_POST['Fecha'];
            $arrayVenta ['Consecutivo'] = $_POST['Consecutivo'];
            $arrayVenta ['Clientes'] = $_POST['Clientes'];

            $Venta = new Venta($arrayVenta);
            $Venta->insertar();
            header("Location: ../Vista/CreateVenta.php?respuesta=correcto");
        } catch (Exception $e) {
           var_dump($e);
           //  header("Location: ../Vista/CreateVenta.php?respuesta=error");
        }
    }
    static public function selectVentas ($isRequired=true, $idVenta="idVenta", $Consecutivo="idVenta", $class="", $tipoUser="Ven"){
        $arrVenta = Venta::getAll();/*("SELECT * FROM producto WHERE Tipo_Perfil = '".$tipoUser."'");  */
        $htmlSelect = "<select id=\"e1\" class=\"populate \" style=\"width: 385px\"height: 60
        px\"border: 415px\" ".(($isRequired) ? "required" : "")." id= '".$idVenta."' name='".$Consecutivo."' class='".$class."'>";
        $htmlSelect .= "<option >Seleccione</option>";
        if(count($arrVenta) > 0){
            foreach ($arrVenta as $venta)
                $htmlSelect .= "<option class=\"form-control\" value='".$venta->getIdVenta()."'>".$venta->getConsecutivo()."</option>";
        }
        $htmlSelect .= "</select>";
        return $htmlSelect;
    }
    static public function selectVenta ($isRequired=true, $idVenta="idVenta", $Consecutivo="", $class="", $tipoUser="Ven"){
        $arrVenta = Venta::getAll("SELECT MAX(idVenta) FROM Venta'");
        $htmlSelect = "<input".(($isRequired) ? "required" : "")." id= '".$idVenta."' name='".$Consecutivo."' class='".$class."'>";
        $resultado=1000 ;
        if(($arrVenta) > 0){



            foreach ($arrVenta as $consecutivo)
                $resultado+= $consecutivo->getidVenta();

            $htmlSelect .= "<input class=\"form-control\" type='number' readonly value='". $resultado."' id='Consecutivo' name='Consecutivo' />";
        }

        return $htmlSelect;
    }
    static public function tdTabla($id){
        $arrayVenta = Venta::buscarForId($id);
        $htmlSelect ="<td>".$arrayVenta->getConsecutivo()."</td>";

        return $htmlSelect;
    }


    static public function editar()
    {
        try {
            $arrayVenta = array();

            $arrayVenta ['Fecha'] = $_POST['Fecha'];
            $arrayVenta ['Consecutivo'] = $_POST['Consecutivo'];
            $arrayVenta ['Clientes'] = $_POST['Clientes'];
            $arrayVenta ['idVenta'] = $_POST['idVenta'];
            $venta = new Venta($arrayVenta);
            $venta->editar();
            header("Location: ../Vista/GestionarVenta.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/editarVenta.php?respuesta=error");
        }
    }
    static public function buscarID($id)
    {
        try {
            return Venta::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../Vista/GestionarVenta.php?respuesta=error");
        }
    }

    public function buscarAll()
    {
        try {
            return Venta::getAll();
        } catch (Exception $e) {
            header("Location: ../Vista/GestionarVenta.php?respuesta=error");
        }
    }


    public function buscar($Query)
    {
        try {
            return Venta::buscar($Query);
        } catch (Exception $e) {
            header("Location: ../Vista/GestionarVenta.php?respuesta=error");
        }
    }
}
?>