<?php

/**
 * Created by PhpStorm.
 * User: johana
 * Date: 20/11/2017
 * Time: 10:00
 */
require_once('db_abstract_class.php');
class Proveedor extends db_abstract_class
{

    private $idProveedor;
    private $Razon_Social;
    private $Nit_Rut;
    private $Ciudad;
    private $Direccion;
    private $Telefono;
    private $Contrato;

    public function __construct($Proveedor_data = array())
    {
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($Proveedor_data)>1){ //
            foreach ($Proveedor_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {

            $this->idProveedor = "";
            $this->Razon_Social = "";
            $this->Nit_Rut = "";
            $this->Ciudad = "";
            $this->Direccion = "";
            $this->Telefono = "";
            $this->Contrato = "";

        }
    }
    function __destruct() {
        $this->Disconnect();
        unset($this);
    }

    /**
     * @return mixed
     */
    
    
    public function getIdProveedor()
    {
        return $this->idProveedor;
    }

    /**
     * @param mixed $idProveedor
     */
    public function setIdProveedor($idProveedor)
    {
        $this->idProveedor = $idProveedor;
    }

    /**
     * @return mixed
     */
    public function getRazonSocial()
    {
        return $this->Razon_Social;
    }

    /**
     * @param mixed $Razon_Social
     */
    public function setRazonSocial($Razon_Social)
    {
        $this->Razon_Social = $Razon_Social;
    }

    /**
     * @return mixed
     */
    public function getNitRut()
    {
        return $this->Nit_Rut;
    }

    /**
     * @param mixed $Nit_Rut
     */
    public function setNitRut($Nit_Rut)
    {
        $this->Nit_Rut = $Nit_Rut;
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
    public function getContrato()
    {
        return $this->Contrato;
    }

    /**
     * @param mixed $Contrato
     */
    public function setContrato($Contrato)
    {
        $this->Contrato = $Contrato;
    }


    public static function buscarForId($id)
    {
        $Proveedor = new Proveedor();
        if ($id > 0){
            $getrow = $Proveedor->getRow("SELECT * FROM proveedor WHERE idProveedor = ?", array($id));
            $Proveedor = new Proveedor();
            $Proveedor->idProveedor= $getrow ['idProveedor'];
            $Proveedor->Razon_Social= $getrow ['Razon_Social'];
            $Proveedor->Nit_Rut= $getrow ['Nit_Rut'];
            $Proveedor->Ciudad= $getrow ['Ciudad'];
            $Proveedor->Direccion= $getrow ['Direccion'];
            $Proveedor->Telefono= $getrow ['Telefono'];
            $Proveedor->Contrato= $getrow ['Contrato'];

            return $Proveedor;
        }else{
            return NULL;
        }
    }

    public static function buscar($query)
    {
        $arrayProveedor = array();
        $tmp = new Proveedor ();
        $getrows = $tmp->getRows($query);
        foreach ($getrows as $valor) {
            $Proveedor = new Proveedor();
            $Proveedor->idProveedor= $valor ['idProveedor'];
            $Proveedor->Razon_Social= $valor['Razon_Social'];
            $Proveedor->Nit_Rut= $valor['Nit_Rut'];
            $Proveedor->Ciudad= $valor['Ciudad'];
            $Proveedor->Direccion= $valor ['Direccion'];
            $Proveedor->Telefono= $valor ['Telefono'];
            $Proveedor->Contrato= $valor ['Contrato'];

            array_push($arrayProveedor, $Proveedor);
        }
        $tmp->Disconnect();
        return $arrayProveedor;
    }

    public function insertar()
    {
        $this->insertRow("INSERT INTO Proveedor VALUES ( NULL, ?, ?, ?, ?, ?, ?)", array(

            $this->Razon_Social,
            $this->Nit_Rut,
            $this->Ciudad,
            $this->Direccion,
            $this->Telefono,
            $this->Contrato,

            )

        );
        $this->Disconnect();
    }

    public function editar()
    {
        $this->updateRow("UPDATE proveedor SET Razon_Social = ?, Nit_Rut = ?, Ciudad = ?, Direccion = ? , Telefono = ?, Contrato = ? WHERE idProveedor = ?", array(

            $this->Razon_Social,
            $this->Nit_Rut,
            $this->Ciudad,
            $this->Direccion,
            $this->Telefono,
            $this->Contrato,
            $this->idProveedor,

        ));
        $this->Disconnect();
    }

    public function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }
    static function getAll()
    {
        return proveedor::buscar("SELECT * FROM proveedor");
    }
}