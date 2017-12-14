<?php
/**
 * Created by PhpStorm.
 * User: forero
 * Date: 19/11/2017
 * Time: 19:01
 */
require_once (__DIR__.'/../Modelo/Cliente.php');

if(!empty($_GET['action'])){
    ClienteController::main($_GET['action']);
}else{
    echo "";
}

class ClienteController
{
    static function main($action)
    {
        if ($action == "crear") {
            ClienteController::crear();
        } else if ($action == "editar") {
            ClienteController::editar();
        } else if ($action == "buscarID") {
            ClienteController::buscarID();
        } else if ($action == "editar") {
            ClienteController::editar();

        }
    }

    static public function crear(){

        try {
            $arrayCliente = array();
            $arrayCliente ['Tipo_Documento'] = $_POST['Tipo_Documento'];
            $arrayCliente ['Documento'] = $_POST['Documento'];
            $arrayCliente ['Nombre'] = $_POST['Nombre'];
            $arrayCliente ['Apellido'] = $_POST['Apellido'];
            $arrayCliente ['Telefono'] = $_POST['Telefono'];
            $arrayCliente ['Email'] = $_POST['Email'];
            $arrayCliente ['Direccion'] = $_POST['Direccion'];
            $arrayCliente ['Ciudad'] = $_POST['Ciudad'];

            $Cliente = new Cliente($arrayCliente);
            $Cliente->insertar();
            header("Location: ../Vista/GestionarCliente.php?respuesta=correcto");
        } catch (Exception $e) {
            //var_dump($e);
            header("Location: ../Vista/CreateCliente.php?respuesta=error");
        }
    }

    static public function selectCliente ($isRequired=true, $idClientes="idClientes", $Nombre="idClientes", $class="", $tipoUser="Nuevos"){
        $arrCliente = Cliente::getAll();/*("SELECT * FROM clientes WHERE Tipo_Perfil = '".$tipoUser."'");  */
        $htmlSelect = "<select  id=\"e1\" class=\"populate \" style=\"width: 345px\"height: 60
        px\"border: 415px\" ".(($isRequired) ? "required" : "")." id= '".$idClientes."' name='".$Nombre."' class='col-lg-4'>";
        $htmlSelect .= "<option >selecionar</option>";
        if(count($arrCliente) > 0){
            foreach ($arrCliente as $cliente)
                $htmlSelect .= "<option class=\"form-control\"  value='".$cliente->getIdClientes()."'>".$cliente->getNombre()." ".$cliente->getApellido()."</option>";
        }
        $htmlSelect .= "</select>";
        return $htmlSelect;
    }
    static public function tdTabla($id){
        $arrayCliente = Cliente::buscarForId($id);
        $htmlSelect ="<td>".$arrayCliente->getNombre()." ".$arrayCliente->getApellido()."</td>";
        $htmlSelect .="<td>".$arrayCliente->getDocumento()."</td>";
        return $htmlSelect;
    }



    static public function editar()
    {
        try {
            $arrayCliente = array();
            $arrayCliente ['Tipo_Documento'] = $_POST['Tipo_Documento'];
            $arrayCliente ['Documento'] = $_POST['Documento'];
            $arrayCliente ['Nombre'] = $_POST['Nombre'];
            $arrayCliente ['Apellido'] = $_POST['Apellido'];
            $arrayCliente ['Telefono'] = $_POST['Telefono'];
            $arrayCliente ['Email'] = $_POST['Email'];
            $arrayCliente ['Direccion'] = $_POST['Direccion'];
            $arrayCliente ['Ciudad'] = $_POST['Ciudad'];
            $arrayCliente ['idClientes'] = $_POST['idClientes'];

            $cliente = new Cliente($arrayCliente);
            $cliente->editar();
            header("Location: ../Vista/GestionarCliente.php?");
        } catch (Exception $e) {
            //var_dump(e);
            header("Location: ../Vista/editarCliente.php?respuesta=error");
        }
    }

    static public function buscarID($id)
    {
        try {
            return Cliente::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../Vista/GestionarCliente.php?respuesta=error");
        }
    }

    public function buscarAll()
    {
        try {
            return Cliente::getAll();
        } catch (Exception $e) {
            header("Location: ../Vista/GestionarCliente.php?respuesta=error");
        }
    }

    public function buscar($Query)
    {
        try {
            return Cliente::buscar($Query);
        } catch (Exception $e) {
            header("Location: ../Vista/GestionarCliente.php?respuesta=error");
        }
    }

}