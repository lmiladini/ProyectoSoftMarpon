<?php
/**
 * Created by PhpStorm.
 * User: forero
 * Date: 19/11/2017
 * Time: 19:02
 */
require_once('db_abstract_class.php');
class Cliente extends db_abstract_class
{
private $idClientes;
    private $Tipo_Documento;
    private $Documento;
    private $Nombre;
    private $Apellido;
    private $Telefono;
    private $Email;
    private $Direccion;
    private $Ciudad;

    /**
     * Cliente constructor.
     * @param $idClientes
     * @param $Tipo_Documento
     * @param $Documento
     * @param $Nombre
     * @param $Apellido
     * @param $Telefono
     * @param $Email
     * @param $Direccion
     * @param $Ciudad
     */
    public function __construct($cliente_data=array())
    {
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($cliente_data)>1){ //
            foreach ($cliente_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
        $this->idClientes = "";
        $this->Tipo_Documento = "";
        $this->Documento = "";
        $this->Nombre = "";
        $this->Apellido = "";
        $this->Telefono ="";
        $this->Email = "";
        $this->Direccion = "";
        $this->Ciudad = "";
    }
    }

    /* Metodo destructor cierra la conexion. */
    function __destruct() {
        $this->Disconnect();
        unset($this);
    }

    /**
     * @return mixed
     */
    public function getIdClientes()
    {
        return $this->idClientes;
    }

    /**
     * @param mixed $idClientes
     */
    public function setIdClientes($idClientes)
    {
        $this->idClientes = $idClientes;
    }

    /**
     * @return mixed
     */
    public function getTipoDocumento()
    {
        return $this->Tipo_Documento;
    }

    /**
     * @param mixed $Tipo_Documento
     */
    public function setTipoDocumento($Tipo_Documento)
    {
        $this->Tipo_Documento = $Tipo_Documento;
    }

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
     * @return mixed
     */
    public function getNombre()
    {
        return $this->Nombre;
    }

    /**
     * @param mixed $Nombre
     */
    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
    }

    /**
     * @return mixed
     */
    public function getApellido()
    {
        return $this->Apellido;
    }

    /**
     * @param mixed $Apellido
     */
    public function setApellido($Apellido)
    {
        $this->Apellido = $Apellido;
    }



    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->Telefono;
    }

    /**
     * @param mixed $Telefono
     */
    public function setTelefono($Telefono)
    {
        $this->Telefono = $Telefono;
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
    public function getDireccion()
    {
        return $this->Direccion;
    }

    /**
     * @param mixed $Direccion
     */
    public function setDireccion($Direccion)
    {
        $this->Direccion = $Direccion;
    }

    /**
     * @return mixed
     */
    public function getCiudad()
    {
        return $this->Ciudad;
    }

    /**
     * @param mixed $Ciudad
     */
    public function setCiudad($Ciudad)
    {
        $this->Ciudad = $Ciudad;
    }



    public function insertar()
    {
        $this->insertRow("INSERT INTO clientes VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?)", array(
                $this->Tipo_Documento,
                $this->Documento,
                $this->Nombre,
                $this->Apellido,
                $this->Telefono,
                $this->Email,
                $this->Direccion,
                $this->Ciudad,



            )
        );
        $this->Disconnect();
    }

    public static function buscarForId($id)
    {
        $Cliente = new Cliente();
        if ($id > 0){
            $getrow = $Cliente->getRow("SELECT * FROM clientes WHERE idClientes =?", array($id));
            $Cliente->idClientes = $getrow['idClientes'];
            $Cliente->Tipo_Documento = $getrow['Tipo_Documento'];
            $Cliente->Documento = $getrow['Documento'];
            $Cliente->Nombre = $getrow['Nombre'];
            $Cliente->Apellido = $getrow['Apellido'];
            $Cliente->Telefono = $getrow['Telefono'];
            $Cliente->Email = $getrow['Email'];
            $Cliente->Direccion = $getrow['Direccion'];
            $Cliente->Ciudad = $getrow['Ciudad'];


            $Cliente->Disconnect();
            return $Cliente;
        }else{
            return NULL;
        }
    }

    public static function buscar($query)
    {
        $arrCliente = array();
        $tmp = new Cliente();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $Cliente = new Cliente();
            $Cliente->idClientes = $valor['idClientes'];
            $Cliente->Tipo_Documento = $valor['Tipo_Documento'];
            $Cliente->Documento = $valor['Documento'];
            $Cliente->Nombre = $valor['Nombre'];
            $Cliente->Apellido = $valor['Apellido'];
            $Cliente->Telefono = $valor['Telefono'];
            $Cliente->Email = $valor['Email'];
            $Cliente->Direccion = $valor['Direccion'];
            $Cliente->Ciudad = $valor['Ciudad'];

            array_push($arrCliente, $Cliente);
        }
        $tmp->Disconnect();
        return $arrCliente;
    }

    public static function getAll()
    {
        return Cliente::buscar("SELECT * FROM clientes");
    }


    public function editar()
    {
        $this->updateRow("UPDATE clientes SET Tipo_Documento=?, Documento=?, Nombre = ?, Apellido = ?, Telefono = ?, Email = ?, Direccion=?, Ciudad=? WHERE idClientes = ?", array(
            $this->Tipo_Documento,
            $this->Documento,
            $this->Nombre,
            $this->Apellido,
            $this->Telefono,
            $this->Email,
            $this->Direccion,
            $this->Ciudad,
            $this->idClientes,
        ));
        $this->Disconnect();
    }

    public function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }


}