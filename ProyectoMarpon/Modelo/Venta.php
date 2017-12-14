<?php
/**
 * Created by PhpStorm.
 * User: forero
 * Date: 19/11/2017
 * Time: 19:02
 */
require_once('db_abstract_class.php');
class Venta extends db_abstract_class
{
private $idVenta;
private $Fecha;
private $Consecutivo;
private $Clientes;

    /**
     * Venta constructor.
     * @param $idVenta
     * @param $Fecha
     * @param $Consecutivo
     * @param $Clientes
     */
    public function __construct($venta_data=array())
    {
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($venta_data)>1){ //
            foreach ($venta_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
        $this->idVenta = "";
        $this->Fecha = "";
        $this->Consecutivo = "";
        $this->Clientes = "";
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
    public function getIdVenta()
    {
        return $this->idVenta;
    }

    /**
     * @param mixed $idVenta
     */
    public function setIdVenta($idVenta)
    {
        $this->idVenta = $idVenta;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->Fecha;
    }

    /**
     * @param mixed $Fecha
     */
    public function setFecha($Fecha)
    {
        $this->Fecha = $Fecha;
    }

    /**
     * @return mixed
     */
    public function getConsecutivo()
    {
        return $this->Consecutivo;
    }

    /**
     * @param mixed $Consecutivo
     */
    public function setConsecutivo($Consecutivo)
    {
        $this->Consecutivo = $Consecutivo;
    }

    /**
     * @return mixed
     */
    public function getClientes()
    {
        return $this->Clientes;
    }

    /**
     * @param mixed $Clientes
     */
    public function setClientes($Clientes)
    {
        $this->Clientes = $Clientes;
    }


    public function insertar()
    {
        $this->insertRow("INSERT INTO venta VALUES (NULL, ?, ?, ?)", array(
                $this->Fecha,
                $this->Consecutivo,
                $this->Clientes,




            )
        );
        $this->Disconnect();
    }

    public static function buscarForId($id)
    {
        $Vent = new Venta();
        if ($id > 0){
            $getrow = $Vent->getRow("SELECT * FROM venta WHERE idVenta =?", array($id));
            $Vent->idVenta = $getrow['idVenta'];
            $Vent->Fecha = $getrow['Fecha'];
            $Vent->Consecutivo = $getrow['Consecutivo'];
            $Vent->Clientes = $getrow['Clientes'];



            $Vent->Disconnect();
            return $Vent;
        }else{
            return NULL;
        }
    }

    public static function buscar($query)
    {
        $arrVenta = array();
        $tmp = new Venta();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $Vent = new Venta();
            $Vent->idVenta = $valor['idVenta'];
            $Vent->Fecha = $valor['Fecha'];
            $Vent->Consecutivo = $valor['Consecutivo'];
            $Vent->Clientes = $valor['Clientes'];

            array_push($arrVenta, $Vent);
        }
        $tmp->Disconnect();
        return $arrVenta;
    }

    public static function getAll()
    {
        return Venta::buscar("SELECT * FROM venta");
    }


    public function editar()
    {
        $this->updateRow("UPDATE venta SET  Fecha = ?, Consecutivo = ?, Clientes=? WHERE idVenta = ?", array(

            $this->Fecha,
            $this->Consecutivo,
            $this->Clientes,
            $this->idVenta,
        ));
        $this->Disconnect();
    }

    public function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }


}