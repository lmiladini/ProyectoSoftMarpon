<?php
/**
 * Created by PhpStorm.
 * User: Paula
 * Date: 22/11/2017
 * Time: 9:44
 */
require_once('db_abstract_class.php');

class Ingresos extends db_abstract_class
{

    private $idIngresos;
    private $Cantidad;
    private $Tipo_Materia;
    private $Proveedor;
    private $Fecha;
    private $Valor_Unitario;

    /**
     * Ingresos constructor.
     * @param $idIngresos
     * @param $Tipo_Materia
     * @param $Proveedor
     * @param $Cantidad
     * @param $Fecha
     * @param $Valor_Unitario
     */
    public function __construct($ingreso_data = array())
    {
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if (count($ingreso_data) > 1) { //
            foreach ($ingreso_data as $campo => $valor) {
                $this->$campo = $valor;
            }
        } else {
            $this->idIngresos = "";
            $this->Cantidad = "";
            $this->Tipo_Materia = "";
            $this->Proveedor = "";
             $this->Fecha = "";
            $this->Valor_Unitario = "";
        }
    }

    /* Metodo destructor cierra la conexion. */
    function __destruct()
    {
        $this->Disconnect();
        unset($this);
    }


    /**
     * @return mixed
     */
    public function getIdIngresos()
    {
        return $this->idIngresos;
    }

    /**
     * @param mixed $idIngresos
     */
    public function setIdIngresos($idIngresos)
    {
        $this->idIngresos = $idIngresos;
    }

    /**
     * @return mixed
     */
    public function getTipoMateria()
    {
        return $this->Tipo_Materia;
    }

    /**
     * @param mixed $Tipo_Materia
     */
    public function setTipoMateria($Tipo_Materia)
    {
        $this->Tipo_Materia = $Tipo_Materia;
    }

    /**
     * @return mixed
     */
    public function getProveedor()
    {
        return $this->Proveedor;
    }

    /**
     * @param mixed $Proveedor
     */
    public function setProveedor($Proveedor)
    {
        $this->Proveedor = $Proveedor;
    }

    /**
     * @return mixed
     */
    public function getCantidad()
    {
        return $this->Cantidad;
    }

    /**
     * @param mixed $Cantidad
     */
    public function setCantidad($Cantidad)
    {
        $this->Cantidad = $Cantidad;
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
    public function getValorUnitario()
    {
        return $this->Valor_Unitario;
    }

    /**
     * @param mixed $Valor_Unitario
     */
    public function setValorUnitario($Valor_Unitario)
    {
        $this->Valor_Unitario = $Valor_Unitario;
    }

    public function insertar()
    {
        $this->insertRow("INSERT INTO ingresos VALUES (NULL, ?,?,?,?,?)", array(
                $this->Cantidad,
                $this->Tipo_Materia,
                $this->Proveedor,
                $this->Fecha,
                $this->Valor_Unitario,



            )
        );

        $this->updateRow("UPDATE tipo_materia SET cantidad=(cantidad+?) WHERE idTipo_Materia = ?", array(
            $this->Cantidad,
            $this->Tipo_Materia,
        ));


        $this->Disconnect();
    }

    public static function buscarForId($id)
    {
        $Ingresos = new Ingresos();
        if ($id > 0){
            $getrow = $Ingresos->getRow("SELECT * FROM ingresos WHERE idIngresos =?", array($id));
            $Ingresos->idIngresos = $getrow['idIngresos'];
            $Ingresos->Tipo_Materia = $getrow['Tipo_Materia'];
            $Ingresos->Proveedor = $getrow['Proveedor'];
            $Ingresos->Cantidad = $getrow['Cantidad'];
            $Ingresos->Fecha = $getrow['Fecha'];
            $Ingresos->Valor_Unitario = $getrow['Valor_Unitario'];



            $Ingresos->Disconnect();
            return $Ingresos;
        }else{
            return NULL;
        }
    }

    public static function buscar($query)
    {
        $arrIngreso = array();
        $tmp = new Ingresos();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $Ingresos = new Ingresos();
            $Ingresos->idIngresos = $valor['idIngresos'];
            $Ingresos->Tipo_Materia = $valor['Tipo_Materia'];
            $Ingresos->Proveedor = $valor['Proveedor'];
            $Ingresos->Cantidad = $valor['Cantidad'];
            $Ingresos->Fecha = $valor['Fecha'];
            $Ingresos->Valor_Unitario = $valor['Valor_Unitario'];


            array_push($arrIngreso, $Ingresos);
        }
        $tmp->Disconnect();
        return $arrIngreso;
    }

    public static function getAll()
    {
        return Ingresos::buscar("SELECT * FROM ingresos ORDER BY Fecha");
    }


    public function editar()
    {
        $this->updateRow("UPDATE ingresos SET Tipo_Materia=?, Proveedor=?, Cantidad = ?, Fecha = ?, Valor_Unitario = ? WHERE idIngresos = ?", array(
            $this->Tipo_Materia,
            $this->Proveedor,
            $this->Cantidad,
            $this->Fecha,
            $this->Valor_Unitario,
            $this->idIngresos,
        ));
        $this->updateRow("UPDATE tipo_materia SET cantidad=(cantidad+?) WHERE idTipo_Materia = ?", array(
            $this->Cantidad,
            $this->Tipo_Materia,
        ));
        $this->Disconnect();
    }

    public function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }
}