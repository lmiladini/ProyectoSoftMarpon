<?php

/**
 * Created by PhpStorm.
 * User: turbo core
 * Date: 19/11/2017
 * Time: 14:11
 */
session_start();
require_once (__DIR__.'/../Modelo/Usuario.php');

if(!empty($_GET['action'])){
    UsuarioController::main($_GET['action']);
}else{

}
class  UsuarioController
{


    static function main($action)
    {
        if ($action == "crear") {
            UsuarioController::crear();
        } else if ($action == "editar") {
            UsuarioController::editar();
        } else if ($action == "validacion") {
            UsuarioController::validacion();
        } else if ($action == "buscarID") {
            UsuarioController::buscarID();
        } else if ($action == "editar") {
            UsuarioController::editar();
        }else if ($action == "ActivarUsuario"){
            UsuarioController::ActivarPersona();
        }else if ($action == "InactivarUsuario"){
            UsuarioController::InactivarPersona();
        } else if ($action == "Login") {
            UsuarioController::Login();
        } else if ($action == "CerrarSession") {
            UsuarioController::CerrarSession();
        }
    }
    static public function crear (){
        try {
            $arrayUsuario = array();
            $arrayUsuario  ['Email'] = $_POST['Email'];
            $arrayUsuario  ['Documento'] = $_POST['Documento'];
            $arrayUsuario ['Password'] = Usuario::codificar($_POST['Password']);
            $arrayUsuario  ['Estado'] = $_POST['Estado'];
            $arrayUsuario  ['Perfil'] = $_POST['Perfil'];
            $Usuario  = new  Usuario( $arrayUsuario );

            $Usuario ->insertar();

            header("Location: ../Vista/GestionarUsuario.php?respuesta=correcto");
        } catch (Exception $e) {
            //  var_dump(  $arrayUsuario );
            header("Location: ../Vista/CreateUsuario.php?respuesta=error");
        }
    }
    static public function tdTabla($id){
        $arrayUsuario = Usuario::buscarForId($id);
        $htmlSelect ="<td>".$arrayUsuario>getEmail()." ".$arrayUsuario->getUsuario()."</td>";

        return $htmlSelect;
    }

    static public function selectUsuario ($isRequired=true, $idUsuarios="idUsuarios", $Email="idUsuarios", $class="", $tipoUser="Cliente"){

        $arrayUsuario = Usuario::getAll();
        $htmlSelect = "<select ".(($isRequired) ? "required" : "")." id= '".$idUsuarios."' name='".$Email."' class='".$class."'>";
        $htmlSelect .= "<option >Seleccione</option>";
        if(count(   $arrayUsuario ) > 0){
            foreach (   $arrayUsuario  as $Usuario)
                $htmlSelect .= "<option value='".$Usuario->idUsuarios()."'>".$Usuario->getEmail()."</option>";
        }
        $htmlSelect .= "</select>";
        return $htmlSelect;
    }

    static public function editar()
    {
        try {
            $arrayUsuario = array();

            $arrayUsuario  ['Email'] = $_POST['Email'];
            $arrayUsuario  ['Documento'] = $_POST['Documento'];
            $arrayUsuario ['Password'] = Usuario::codificar($_POST['Password']);
            $arrayUsuario  ['Estado'] = $_POST['Estado'];
            $arrayUsuario ['Perfil'] = $_POST['Perfil'];
            $arrayUsuario ['idUsuarios'] = $_POST['idUsuarios'];

            $usuario = new Usuario($arrayUsuario );
            $usuario->editar();
            //  var_dump($arrayUsuario );
            header("Location: ../Vista/GestionarUsuario.php?respuesta=correcto");
        } catch (Exception $e) {

           header("Location: ../Vista/editarUsuario.php?respuesta=error");
        }
    }


    public function Login()
    {
        try {
            $Documento = $_POST['Documento'];
            $Password =  Usuario::codificar($_POST['Password']);
            if (!empty($Documento) && !empty($Password)) {
                $respuesta = Usuario::Login($Documento, $Password);
                if (is_array($respuesta)) {
                    $_SESSION['idUsuarios'] = $respuesta['idUsuarios'];
                    $_SESSION["Perfil"] = $respuesta['Perfil'];
                    echo TRUE;
                } else if ($respuesta == "Password Incorrecto") {
                    echo "<div class='ui-state-error ui-corner-all' style='margin-top: 20px; padding: 0 .7em;'>";
                    echo "<p><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span>";
                    echo "<strong>Error!</strong> La Contraseña No Coincide Con El Usuario</p>";
                    echo "</div>";
                } else if ($respuesta == "No existe el usuario") {
                    echo "<div class='ui-state-error ui-corner-all' style='margin-top: 20px; padding: 0 .7em;'>";
                    echo "<p><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span>";
                    echo "<strong>Error!</strong> No Existe Un Usuario Con Estos Datos</p>";
                    echo "</div>";
                }
            } else {
                echo "<div class='ui-state-error ui-corner-all' style='margin-top: 20px; padding: 0 .7em;'>";
                echo "<p><span class='ui-icon ui-icon-alert' style='float: left; margin-right: .3em;'></span>";
                echo "<strong>Error!</strong> Datos Vacios</p>";
                echo "</div>";
            }
        } catch (Exception $e) {
            header("Location: ../login.php?respuesta=error");
        }
    }

    public function CerrarSession()
    {
        session_destroy();
        header("Location: ../Vista/login/index.php");
    }
    static public function buscarID($id)
    {
        try {
            return Usuario::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../Vista/GestionarUsuario.php?respuesta=error");
        }
    }

    private static function validacion($Documento)
    {
        $arrayUsuario = array();
        $tmp = new Usuario();
        $getTempUser = $tmp->getRows("SELECT * FROM usuarios WHERE Documento = '".$Documento."'");

        if (empty($getTempUser)) {
            echo "<span style='font-weight:bold;color:green;'>Disponible.</span>";
        }else if(!empty($getTempUser)){
            echo "<span style='font-weight:bold;color:red;'>El Documento  ya existe.</span>";
        }
        $tmp->Disconnect();
        return $arrayUsuario;
    }


    public function buscarAll()
    {
        try {
            return Usuario::getAll();
        } catch (Exception $e) {
            header("Location: ../Vista/GestionarUsuario.php?respuesta=error");
        }
    }

    public function buscar($Query)
    {
        try {
            return Usuario::buscar($Query);
        } catch (Exception $e) {
            header("Location: ../Vista/GestionarUsuario.php?respuesta=error");
        }
    }

    static public function ActivarPersona (){
        try {
            $ObjUsuario= Usuario::buscarForId($_GET['IdUsuarios']);
            $ObjUsuario->setEstado("Activo");
            $ObjUsuario->editar();
            header("Location: ../Vista/GestionarUsuario.php");
        } catch (Exception $e) {
            header("Location: ../Vista/GestionarUsuario.php?respuesta=error");
        }
    }

    static public function InactivarPersona (){
        try {
            $ObjUsuario = Usuario::buscarForId($_GET['IdUsuarios']);
            $ObjUsuario->setEstado("Inactivo");
            $ObjUsuario->editar();
            header("Location: ../Vista/GestionarUsuario.php");
        } catch (Exception $e) {
            header("Location: ../Vista/GestionarUsuario.php?respuesta=error");
        }
    }
}
?>



