<?php
/**
 * Created by PhpStorm.
 * User: Paula
 * Date: 19/11/2017
 * Time: 22:53
 */
require_once('db_abstract_class.php');

class Producto extends db_abstract_class

{
    private $idProducto;
    private $Foto;
    private  $Precio;
    private $Nombre;

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
    public function getPrecio()
    {
        return $this->Precio;
    }

    /**
     * @param mixed $Precio
     */
    public function setPrecio($Precio)
    {
        $this->Precio = $Precio;
    }
    private $Estado;
    private $Descripcion;


    public function __construct($Pro_data = array())
    {

        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($Pro_data)>1){ //
            foreach ($Pro_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
            $this->idProducto = "";
            $this->Nombre="";
            $this->Foto = "";
            $this->Precio="";
            $this->Estado = "";
            $this->Descripcion = "";

        }
    }

    function __destruct() {
        $this->Disconnect();
        unset($this);
    }


    public function insertar()
    {
        $this->insertRow("INSERT INTO producto VALUES (NULL, ?,?,?,?,?)", array(
                $this->Nombre,
                $this->Foto,
                $this->Precio,
                $this->Estado,
                $this->Descripcion,

            )
        );
        $this->Disconnect();
    }





    public static function buscarForId($id)
    {
        $pro =new Producto();
        if( $id >0){
            $getrow=$pro->getRow("select * from producto WHERE idProducto=?",array($id));
            $pro->idProducto=$getrow['idProducto'];
            $pro->Nombre=$getrow['Nombre'];
            $pro->Foto=$getrow['Foto'];
            $pro->Precio=$getrow['Precio'];
            $pro->Estado=$getrow['Estado'];
            $pro->Descripcion=$getrow['Descripcion'];
            $pro->Disconnect();
            return $pro;
        }else{
            return NULL;
        }
    }

    public static function buscar($query)
    {
        $arraypro=array();
        $tmp=new Producto();
        $getrows=$tmp->getRows($query);

        foreach ($getrows as $valor){
            $prog= new Producto();
            $prog->idProducto=$valor['idProducto'];
            $prog->Nombre=$valor['Nombre'];
            $prog->Foto=$valor['Foto'];
            $prog->Precio=$valor['Precio'];
            $prog->Estado=$valor['Estado'];
            $prog->Descripcion=$valor['Descripcion'];
            array_push($arraypro,$prog);
        }
        $tmp->Disconnect();
        return $arraypro;
    }



    public static function getAll()
    {
        return Producto::buscar("SELECT * FROM producto");
    }

    public function editar()
    {
        $this->updateRow("UPDATE producto SET  Nombre = ?, Foto = ?, Precio = ?, Estado = ?,Descripcion=? WHERE idProducto = ?", array(

            $this->Nombre,
            $this->Foto,
            $this->Precio,
            $this->Estado,
            $this->Descripcion,
            $this->idProducto,


        ));
        $this->Disconnect();
    }

    public function eliminar($id)
    {
        $this->deleteRow("DELETE producto SET  Foto = ?, Nombre =?, Precio = ?, Estado = ?,Descripcion=? WHERE idProducto = ?", array(
            $this->Nombre,
            $this->Foto,
            $this->Precio,
            $this->Estado,
            $this->Descripcion,
        ));
        $this->Disconnect();
    }




    /**
     * @return mixed
     */
    public function getIdProducto()
    {
        return $this->idProducto;
    }

    /**
     * @param mixed $idProducto
     */
    public function setIdProducto($idProducto)
    {
        $this->idProducto = $idProducto;
    }

    /**
     * @return mixed
     */
    public function getFoto()
    {
        return $this->Foto;
    }

    /**
     * @param mixed $Foto
     */
    public function setFoto($Foto)
    {
        $this->Foto = $Foto;
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
    public function getDescripcion()
    {
        return $this->Descripcion;
    }

    /**
     * @param mixed $Descripcion
     */
    public function setDescripcion($Descripcion)
    {
        $this->Descripcion = $Descripcion;
    }

}