<?php

/**
 * Created by PhpStorm.
 * User: johana
 * Date: 20/11/2017
 * Time: 14:04
 */
require_once ('Producto.php');
require_once('db_abstract_class.php');
class Gastos extends db_abstract_class
{
    private $idGastos;
    private $Nombre;
    private $Apellido;
    private $Documento;
    private $Fecha;
    private $Descripcion;
    private $Horas;
    private $Valor_Hora;
    private $Producto;
    private $Total;

    public function __construct($Gastos_data = array())
    {
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($Gastos_data)>1){ //
            foreach ($Gastos_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {

            $this->idGastos = "";
            $this->Nombre = "";
            $this->Apellido = "";
            $this->Documento = "";
            $this->Fecha = "";
            $this->Descripcion = "";
            $this->Horas = "";
            $this->Valor_Hora = "";
            $this->Producto = "";
            $this->Total = "";

        }
    }
    static public function selectProducto ($isRequired=true, $idProducto, $Descripcion, $class)
    {
        $arrayGastos = Producto::getAll();
        $htmlSelect = '<select name="Producto">';
        $htmlSelect .= "<option value='nada'>Seleccione el Producto</option>";
        if (count($arrayGastos) > 0) {
            foreach ($arrayGastos as $Producto) {
                $htmlSelect .= "<option value='" . $Producto->getIdProducto(). "'>" . $Producto->getNombre() . " " . "</option>";
            }
            $htmlSelect .= "</select>";
        } else {
            $htmlSelect = '<select>';
            $htmlSelect .= "<option value='nada'>Seleccione</option>";
            $htmlSelect .= "</select>";
        }
        return $htmlSelect;
    }
    function __destruct() {
        $this->Disconnect();
        unset($this);
    }

    /**
     * @return string
     */
    public function getIdGastos()
    {
        return $this->idGastos;
    }

    /**
     * @param string $idGastos
     */
    public function setIdGastos($idGastos)
    {
        $this->idGastos = $idGastos;
    }

    /**
     * @return string
     */
    public function getNombre()
    {
        return $this->Nombre;
    }

    /**
     * @param string $Nombre
     */
    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
    }

    /**
     * @return string
     */
    public function getApellido()
    {
        return $this->Apellido;
    }

    /**
     * @param string $Apellido
     */
    public function setApellido($Apellido)
    {
        $this->Apellido = $Apellido;
    }

    /**
     * @return string
     */
    public function getDocumento()
    {
        return $this->Documento;
    }

    /**
     * @param string $Documento
     */
    public function setDocumento($Documento)
    {
        $this->Documento = $Documento;
    }

    /**
     * @return string
     */
    public function getFecha()
    {
        return $this->Fecha;
    }

    /**
     * @param string $Fecha
     */
    public function setFecha($Fecha)
    {
        $this->Fecha = $Fecha;
    }

    /**
     * @return string
     */
    public function getDescripcion()
    {
        return $this->Descripcion;
    }

    /**
     * @param string $Descripcion
     */
    public function setDescripcion($Descripcion)
    {
        $this->Descripcion = $Descripcion;
    }

    /**
     * @return string
     */
    public function getHoras()
    {
        return $this->Horas;
    }

    /**
     * @param string $Horas
     */
    public function setHoras($Horas)
    {
        $this->Horas = $Horas;
    }

    /**
     * @return string
     */
    public function getValorHora()
    {
        return $this->Valor_Hora;
    }

    /**
     * @param string $Valor_Hora
     */
    public function setValorHora($Valor_Hora)
    {
        $this->Valor_Hora = $Valor_Hora;
    }

    /**
     * @return string
     */
    public function getProducto()
    {
        return $this->Producto;
    }

    /**
     * @param string $Producto
     */
    public function setProducto($Producto)
    {
        $this->Producto = $Producto;
    }

    /**
     * @return string
     */
    public function getTotal()
    {
        return $this->Total;
    }

    /**
     * @param string $Total
     */
    public function setTotal($Total)
    {
        $this->Total = $Total;
    }


    public static function buscarForId($id)
    {
        $Gastos = new Gastos();
        if ($id > 0){
            $getrow = $Gastos->getRow("SELECT * FROM gastos WHERE idGastos = ?", array($id));
            $Gastos = new Gastos();
            $Gastos->idGastos = $getrow ['idGastos'];
            $Gastos->Nombre = $getrow ['Nombre'];
            $Gastos->Apellido = $getrow ['Apellido'];
            $Gastos->Documento = $getrow ['Documento'];
            $Gastos->Fecha = $getrow ['Fecha'];
            $Gastos->Descripcion = $getrow ['Descripcion'];
            $Gastos->Horas = $getrow ['Horas'];
            $Gastos->Valor_Hora = $getrow ['Valor_Hora'];
            $Gastos->Producto = $getrow ['Producto'];
            $Gastos->Total = $getrow ['Total'];

            return $Gastos;
        }else{
            return NULL;
        }
    }

    public static function buscar($query)
    {
        $arrayGastos = array();
        $tmp = new Gastos ();
        $getrows = $tmp->getRows($query);
        foreach ($getrows as $valor) {
            $Gastos = new Gastos();
            $Gastos->idGastos = $valor ['idGastos'];
            $Gastos->Nombre = $valor ['Nombre'];
            $Gastos->Apellido = $valor ['Apellido'];
            $Gastos->Documento = $valor ['Documento'];
            $Gastos->Fecha = $valor ['Fecha'];
            $Gastos->Descripcion = $valor ['Descripcion'];
            $Gastos->Horas = $valor ['Horas'];
            $Gastos->Valor_Hora = $valor ['Valor_Hora'];
            $Gastos->Producto = $valor ['Producto'];
            $Gastos->Total = $valor ['Total'];

            array_push($arrayGastos, $Gastos);
        }
        $tmp->Disconnect();
        return $arrayGastos;
    }

    public function insertar()
    {
        $this->insertRow("INSERT INTO gastos VALUES ( NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?)", array(


                $this->Nombre,
                $this->Apellido,
                $this->Documento,
                $this->Fecha,
                $this->Descripcion,
                $this->Horas,
                $this->Valor_Hora,
                $this->Producto,
                $this->Total,

            )

        );
        $this->Disconnect();
    }

    public function editar()
    {
        $this->updateRow("UPDATE gastos SET Nombre = ?, Apellido = ?, Documento = ?, Fecha = ? , Descripcion = ?, Horas = ?, Valor_Hora = ?, Producto = ?, Total = ? WHERE idGastos = ?", array(

            $this->Nombre,
            $this->Apellido,
            $this->Documento,
            $this->Fecha,
            $this->Descripcion,
            $this->Horas,
            $this->Valor_Hora,
            $this->Producto,
            $this->Total,
            $this->idGastos,

        ));
        $this->Disconnect();
    }

    public function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }
    static function getAll()
    {
        return Gastos::buscar("SELECT * FROM gastos");
    }
}