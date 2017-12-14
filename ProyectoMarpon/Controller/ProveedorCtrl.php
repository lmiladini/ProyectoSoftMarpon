<?php

/**
 * Created by PhpStorm.
 * User: johana
 * Date: 20/11/2017
 * Time: 10:16
 */
require_once (__DIR__ . '/../Modelo/proveedor.php');
if(!empty($_GET['action'])){
    ProveedorCtrl::main($_GET['action']);
}else{
    echo "";
}
class ProveedorCtrl
{

    static function main($action)
    {
        if ($action == "crear") {
            ProveedorCtrl::crear();
        } else if ($action == "editar") {
            ProveedorCtrl::editar();
        } else if ($action == "Login") {
            ProveedorCtrl::Login();
        } else if ($action == "CerrarSession") {
            ProveedorCtrl::CerrarSession();
        } else if ($action == "buscarID") {
            ProveedorCtrl::buscarID();

        }
    }
    static public function crear (){
        try {

            $arrayproveedor = array();
            $arrayproveedor['idproveedor'] = $_POST['idproveedor'];
            $arrayproveedor['Razon_Social'] = $_POST['Razon_Social'];
            $arrayproveedor['Nit_Rut'] = $_POST['Nit_Rut'];
            $arrayproveedor['Ciudad'] = $_POST['Ciudad'];
            $arrayproveedor['Direccion'] = $_POST['Direccion'];
            $arrayproveedor['Telefono'] = $_POST['Telefono'];
            $arrayproveedor['Contrato'] = $_POST['Contrato'];

            $proveedor = new proveedor ($arrayproveedor);
            $proveedor->insertar();
            header("Location: ../Vista/Gestinarproveedor.php?respuesta=correcto");
        } catch (Exception $e) {
            var_dump($e);
            //header("Location: ../vista/createEmpleados.php?respuesta=error");
        }
    }
    static public function selectProveedor ($isRequired=true, $idProveedor="idProveedor", $Razon_Social="idProveedor", $class="", $tipoUser="Nuevos"){
        $arrProveedor = Proveedor::getAll();/*("SELECT * FROM clientes WHERE Tipo_Perfil = '".$tipoUser."'");  */
        $htmlSelect = "<select  id=\"e2\" class=\"populate \" style=\"width: 385px\"height: 60
        px\"border: 415px\" ".(($isRequired) ? "required" : "")." id= '".$idProveedor."' name='".$Razon_Social."' class='col-lg-4'>";
        $htmlSelect .= "<option >selecionar</option>";
        if(count($arrProveedor) > 0){
            foreach ($arrProveedor as $pro)
                $htmlSelect .= "<option value='".$pro->getIdProveedor()."'>".$pro->getRazonSocial()."</option>";
        }
        $htmlSelect .= "</select>";
        return $htmlSelect;
    }

    static public function tdTabla($id){
        $arrayproveedor = proveedor::buscarForId($id);
        $htmlSelect ="<td>".$arrayproveedor->getRazonSocial()."</td>";

        return $htmlSelect;
    }
    static public function DataProveedor($id){
        $arrayProveedor = Proveedor::buscarForId($id);
        $htmltd =Proveedor::tdTabla($arrayProveedor->getCiudad());
        return $htmltd;
    }
    static public function buscarID ($id){
        try {
            return  proveedor::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../Vista/Gestinarproveedor.php?respuesta=correcto");
        }
    }
    public function buscarAll (){
        try {
            return proveedor::getAll();
        } catch (Exception $e) {
            header("Location: ../Vista/Gestinarproveedor.php?respuesta=correcto");
        }
    }

    public function buscar ($Query){
        try {
            return proveedor::buscar($Query);
        } catch (Exception $e) {
            header("Location: ../Vista/Gestinarproveedor.php?respuesta=correcto");
        }
    }
    static public function editar (){
        try {
            $arrayproveedor = array();
            $arrayproveedor['Razon_Social'] = $_POST['Razon_Social'];
            $arrayproveedor['Nit_Rut'] = $_POST['Nit_Rut'];
            $arrayproveedor['Ciudad'] = $_POST['Ciudad'];
            $arrayproveedor['Direccion'] = $_POST['Direccion'];
            $arrayproveedor['Telefono'] = $_POST['Telefono'];
            $arrayproveedor['Contrato'] = $_POST['Contrato'];
            $arrayproveedor['idProveedor'] = $_POST['idProveedor'];
            $Proveedor = new proveedor ($arrayproveedor);
            var_dump($arrayproveedor);
            $Proveedor->editar();
            echo "Edito";
            header("Location: ../Vista/Gestinarproveedor.php?respuesta=correcto");

        } catch (Exception $e) {
            var_dump($e);
            //header("Location: ../Vista/Gestinarproveedor.php?respuesta=correcto");
        }
    }
}