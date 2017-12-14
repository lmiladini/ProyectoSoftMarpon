<?php
/**
 * Created by PhpStorm.
 * User: Paula
 * Date: 21/11/2017
 * Time: 0:46
 */

require_once('db_abstract_class.php');


class Detalle extends db_abstract_class
{
private  $idDetalle;
private  $Valor_Unitario;
private  $Venta;
private  $Producto;
private  $Total;




    public function __construct($De_data = array())
    {

        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($De_data)>1){ //
            foreach ($De_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->idDetalle = "";
            $this->Valor_Unitario = "";
            $this->Venta="";
            $this->Producto="";
            $this->Cantidad = "";
            $this->Total="";


        }
    }

    function __destruct() {
        $this->Disconnect();
        unset($this);
    }


    public function insertar()
    {
        $this->insertRow("INSERT INTO detalle VALUES (NULL, ?,?,?,?,?)", array(

                $this->Valor_Unitario,
                $this->Venta,
                $this->Producto,
                $this->Cantidad,
                $this->Total,


            )
        );
        $this->Disconnect();
    }





    public static function buscarForId($id)
    {
        $de =new Deatalle();
        if( $id >0){
            $getrow=$de->getRow("select * from detalle WHERE idProducto=?",array($id));
            $de->idDetalle=$getrow['idDetalle'];
            $de->Valor_Unitario=$getrow['Valor_Unitario'];
            $de->Venta=$getrow['Venta'];
            $de->Producto=$getrow['Producto'];
            $de->Cantidad=$getrow['Cantidad'];
            $de->Total=$getrow['Total'];

            $de->Disconnect();
            return $de;
        }else{
            return NULL;
        }
    }

    public static function buscar($query)
    {
        $arrayde=array();
        $tmp=new Detalle();
        $getrows=$tmp->getRows($query);

        foreach ($getrows as $valor){
            $de= new Detalle();
            $de->idDetalle=$valor['idDetalle'];
            $de->Valor_Unitario=$valor['Valor_Unitario'];
            $de->Venta=$valor['Venta'];
            $de->Producto=$valor['Producto'];
            $de->Cantidad=$valor['Cantidad'];
            $de->Total=$valor['Total'];


            array_push($arrayde,$de);
        }
        $tmp->Disconnect();
        return $arrayde;
    }



    public static function getAll()
    {
        return Detalle::buscar("SELECT * FROM detalle");
    }

    public function editar()
    {
        $this->updateRow("UPDATE detalle SET  Valor_Unitario = ?,Venta = ?, Producto = ?, Cantidad = ?, Total = ? WHERE idDetalle = ?", array(

            $this->Valor_Unitario,
            $this->Venta,
            $this->Producto,
            $this->Cantidad,
            $this->Total,
            $this->idDetalle,


        ));
        $this->Disconnect();
    }

    public function eliminar($id)
    {
        $this->deleteRow("DELETE marpo.detalle SET  Valor_Unitario = ?, Venta =?, Producto = ?, Cantidad = ? WHERE idDetalle = ?", array(

            $this->Valor_Unitario,
            $this->Venta,
            $this->Producto,
            $this->Cantidad,
            $this->idDetalle,

        ));
        $this->Disconnect();
    }














    /**
     * @return mixed
     */
    public function getTotal()
    {
        return $this->Total;
    }

    /**
     * @param mixed $Total
     */
    public function setTotal($Total)
    {
        $this->Total = $Total;
    }
    /**
     * @return mixed
     */
    public function getIdDetalle()
    {
        return $this->idDetalle;
    }

    /**
     * @param mixed $idDetalle
     */
    public function setIdDetalle($idDetalle)
    {
        $this->idDetalle = $idDetalle;
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

    /**
     * @return mixed
     */
    public function getVenta()
    {
        return $this->Venta;
    }

    /**
     * @param mixed $Venta
     */
    public function setVenta($Venta)
    {
        $this->Venta = $Venta;
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
private  $Cantidad;
}