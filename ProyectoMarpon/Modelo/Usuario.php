<?php

/**
 * Created by PhpStorm.
 * User: turbo core
 * Date: 19/11/2017
 * Time: 14:27
 */
require_once('db_abstract_class.php');
class Usuario extends db_abstract_class {


    private $idUsuarios;
    private $Email;
    private $Documento;
    private $Password;
    private $Estado;
    private $Perfil;

    /**
     * @return mixed
     */
    public function getDocumento()
    {
        return $this->Documento;
    }

    /**
     * @param mixed $Documento
     */
    public function setDocumento($Documento)
    {
        $this->Documento = $Documento;
    }

    /**
     * Usuario constructor.
     * @param $Email
     * @param $Estado
     * @param $Usuario
     * @param $Password
     * @param $Perfil
     */
    public function __construct( $usuario_data=array())
    {
        parent::__construct();
        if(count($usuario_data)>1){ //
            foreach ($usuario_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->Email = "";
            $this->Documento = "";
            $this->Password = "";
            $this->Estado = "";
            $this->Perfil = "";
        }
    }
    function __destruct() {
        $this->Disconnect();
        unset($this);
    }
    public static function codificar ($str){
        $salt = "rauNcHyfO0T_231";
        $c1 = md5(crypt ($str, $salt));
        return $c1;
    }
    /**
     * @return mixed
     */
    public function getIdUsuarios()
    {
        return $this->idUsuarios;
    }

    /**
     * @param mixed $idUsuarios
     */
    public function setIdUsuarios($idUsuarios)
    {
        $this->idUsuarios = $idUsuarios;
    }

    /**
     * @return mixed
     */

    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * @param mixed $Email
     */
    public function setEmail($Email)
    {
        $this->Email = $Email;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->Estado;
    }

    /**
     * @param mixed $Estado
     */
    public function setEstado($Estado)
    {
        $this->Estado = $Estado;
    }

    /**
     * @return mixed
     */


    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->Password;
    }

    /**
     * @param mixed $Password
     */
    public function setPassword($Password)
    {
        $this->Password = $Password;
    }

    /**
     * @return mixed
     */
    public function getPerfil()
    {
        return $this->Perfil;
    }

    /**
     * @param mixed $Perfil
     */
    public function setPerfil($Perfil)
    {
        $this->Perfil = $Perfil;
    }

    public function insertar()
    {
        $this->insertRow("INSERT INTO usuarios VALUES (NULL, ?, ?, ?, ?, ?)", array(

                $this->Email,
                $this->Documento,
                $this->Password,
                $this->Estado,
                $this->Perfil,

            )
        );
        $this->Disconnect();

    }


    public static function buscarForId($id)
    {
        $usuario = new usuario();
        if ($id > 0) {
            $getrow = $usuario->getRow("SELECT * FROM usuarios WHERE idUsuarios =?", array($id));
            $usuario->idUsuarios = $getrow['idUsuarios'];

            $usuario->Email = $getrow['Email'];
            $usuario->Documento = $getrow['Documento'];
            $usuario->Estado = $getrow['Estado'];
            $usuario->erfil = $getrow['Perfil'];


            $usuario -> Disconnect();
            return $usuario;
        } else {
            return NULL;
        }
    }

    public static function buscar($query)
    {
        $arrUsuario = array();
        $tmp = new usuario();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $usuario = new Usuario();
            $usuario->idUsuarios = $valor['idUsuarios'];
            $usuario->Email = $valor['Email'];
            $usuario->Documento = $valor['Documento'];
            $usuario->Estado = $valor['Estado'];
            $usuario->Perfil = $valor['Perfil'];

            array_push($arrUsuario, $usuario);
        }
        $tmp->Disconnect();
        return $arrUsuario;
    }

    public static function getAll()
    {
        return Usuario::buscar("SELECT * FROM usuarios");
    }

    public function editar()
    {

        $this->updateRow("UPDATE usuarios SET Email = ?, Documento=?, Password=?, Estado=?, Perfil=? WHERE idUsuarios = ?", array(

            $this->Email,
            $this->Documento,
            $this->Password,
            $this->Estado,
            $this->Perfil,
            $this->idUsuarios,
        ));

        $this->Disconnect();
    }

    public function eliminar($id)
    {
        $this->deleteRow("DELETE persona SET Estado = ?, Email = ? WHERE idUsuarios = ?", array(

            $this->Email,
            $this->Estado,
            $this->Documento,
            $this->Password,
            $this->Perfil,
            $this->idUsuarios,
        ));
        $this->Disconnect();
    }


    public static function Login($Documento, $Password){
        $arrUsuarios = array();
        $tmp = new Usuario();
        $getTempUsuario = $tmp->getRows("SELECT * FROM usuarios WHERE Documento = '$Documento'");
        if(count($getTempUsuario) >= 1){
            $getrows = $tmp->getRows("SELECT * FROM usuarios WHERE Documento = '$Documento' AND Password = '$Password'");
            if(count($getrows) >= 1){
                foreach ($getrows as $valor) {
                    return $valor;
                }
            }else{
                return "Password Incorrecto";
            }
        }else{
            return "No existe el usuario";
        }

        $tmp->Disconnect();
        return $arrUsuarios;
    }

}