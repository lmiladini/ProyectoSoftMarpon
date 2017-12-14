<?php
/**
 * Created by PhpStorm.
 * User: Paula
 * Date: 22/11/2017
 * Time: 9:44
 */
require_once('db_abstract_class.php');

class Salidas extends db_abstract_class
{
    private $idSalidas;
    private $Producto;
    private $Tipo_Materia;
    private $Cantidad;
    private $Fecha;


    /**
     * Salidas constructor.
     * @param $idSalidas
     * @param $Producto
     * @param $Tipo_Materia
     * @param $Cantidad
     * @param $Fecha
     * @param $Valor_Unitario
     */
    public function __construct($salida_data = array())
    {
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if (count($salida_data) > 1) { //
            foreach ($salida_data as $campo => $valor) {
                $this->$campo = $valor;
            }
        } else {
            $this->idSalidas = "";
            $this->Producto = "";
            $this->Tipo_Materia = "";
            $this->Cantidad = "";
            $this->Fecha = "";

        }
    }

    /**
     * @return mixed
     */
    public function getIdSalidas()
    {
        return $this->idSalidas;
    }

    /**
     * @param mixed $idSalidas
     */
    public function setIdSalidas($idSalidas)
    {
        $this->idSalidas = $idSalidas;
    }

    /**
     * @return mixed
     */
    public function getProducto()
    {
        return $this->Producto;
    }

    /**
     * @param mixed $Producto
     */
    public function setProducto($Producto)
    {
        $this->Producto = $Producto;
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


    public function insertar()
    {
        $this->insertRow("INSERT INTO salidas VALUES (NULL, ?, ?, ?, ?)", array(
                $this->Producto,
                $this->Tipo_Materia,
                $this->Cantidad,
                $this->Fecha,





            )
        );

        $this->updateRow("UPDATE tipo_materia SET cantidad=(cantidad-?) WHERE idTipo_Materia = ?", array(
            $this->Cantidad,
            $this->Tipo_Materia,
        ));

        $this->Disconnect();
    }
    public static function buscarForId($id)
    {
        $Salidas = new Salidas();
        if ($id > 0){
            $getrow = $Salidas->getRow("SELECT * FROM salidas WHERE idSalidas =?", array($id));
            $Salidas->idSalidas = $getrow['idSalidas'];
            $Salidas->Producto = $getrow['Producto'];
            $Salidas->Tipo_Materia = $getrow['Tipo_Materia'];
            $Salidas->Cantidad = $getrow['Cantidad'];
            $Salidas->Fecha = $getrow['Fecha'];




            $Salidas->Disconnect();
            return $Salidas;
        }else{
            return NULL;
        }
    }

    public static function buscar($query)
    {
        $arrSalida = array();
        $tmp = new Salidas();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $Salidas = new Salidas();
            $Salidas->idSalidas = $valor['idSalidas'];
            $Salidas->Producto = $valor['Producto'];
            $Salidas->Tipo_Materia = $valor['Tipo_Materia'];
            $Salidas->Cantidad = $valor['Cantidad'];
            $Salidas->Fecha = $valor['Fecha'];



            array_push($arrSalida, $Salidas);
        }
        $tmp->Disconnect();
        return $arrSalida;
    }

    public static function getAll()
    {
        return Salidas::buscar("SELECT * FROM salidas");
    }



    public function editar()
    {
        $this->updateRow("UPDATE salidas SET Producto=?, Tipo_Materia=?, Cantidad = ?, Fecha = ? WHERE idSalidas = ?", array(
            $this->Producto,
            $this->Tipo_Materia,
            $this->Cantidad,
            $this->Fecha,

            $this->idSalidas,
        ));
        $this->updateRow("UPDATE tipo_materia SET cantidad=(cantidad-?) WHERE idTipo_Materia = ?", array(
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