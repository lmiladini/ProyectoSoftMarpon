<?php
/**
 * Created by PhpStorm.
 * User: forero
 * Date: 19/11/2017
 * Time: 21:44
 */
require_once('db_abstract_class.php');
class TipoMateria extends db_abstract_class
{
    private $idTipo_Materia;
    private $Nombre;
    private $Cantidad;
    private $Valor;
    private $U_Medida;


    /**
     * TipoMateria constructor.
     * @param $idTipo_Materia
     * @param $Nomnbre
     * @param $Cantidad
     * @param $Valor
     * @param $U_Medida
     * @param $Tipo
     */
    public function __construct($tipomateria_data=array())
    {
        parent::__construct(); //Llama al contructor padre "la clase conexion" para conectarme a la BD
        if(count($tipomateria_data)>1){ //
            foreach ($tipomateria_data as $campo => $valor){
                $this->$campo = $valor;
            }
        }else {
        $this->idTipo_Materia = "";
        $this->Nombre = "";
        $this->Cantidad = "";
        $this->Valor = "";
        $this->U_Medida = "";

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
    public function getIdTipoMateria()
    {
        return $this->idTipo_Materia;
    }

    /**
     * @param mixed $idTipo_Materia
     */
    public function setIdTipoMateria($idTipo_Materia)
    {
        $this->idTipo_Materia = $idTipo_Materia;
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
    public function getValor()
    {
        return $this->Valor;
    }

    /**
     * @param mixed $Valor
     */
    public function setValor($Valor)
    {
        $this->Valor = $Valor;
    }

    /**
     * @return mixed
     */
    public function getUMedida()
    {
        return $this->U_Medida;
    }

    /**
     * @param mixed $U_Medida
     */
    public function setUMedida($U_Medida)
    {
        $this->U_Medida = $U_Medida;
    }

    /**
     * @return mixed
     */



    public function insertar()
    {
        $this->insertRow("INSERT INTO tipo_materia VALUES (NULL, ?, ?, ?, ?) ", array(
                      
                $this->Nombre,
                $this->Cantidad,
                $this->Valor,
                $this->U_Medida,





            )
        );
        $this->Disconnect();
    }

    public static function buscarForId($id)
    {
        $tipoM = new TipoMateria();
        if ($id > 0){
            $getrow = $tipoM->getRow("SELECT * FROM tipo_materia WHERE idTipo_Materia =?", array($id));
            $tipoM->idTipo_Materia = $getrow['idTipo_Materia'];
            $tipoM->Nombre = $getrow['Nombre'];
            $tipoM->Cantidad = $getrow['Cantidad'];
            $tipoM->Valor = $getrow['Valor'];
            $tipoM->U_Medida = $getrow['U_Medida'];



            $tipoM->Disconnect();
            return $tipoM;
        }else{
            return NULL;
        }
    }

    public static function buscar($query)
    {
        $arrTipoMateria = array();
        $tmp = new TipoMateria();
        $getrows = $tmp->getRows($query);

        foreach ($getrows as $valor) {
            $tipoM = new TipoMateria();
            $tipoM->idTipo_Materia = $valor['idTipo_Materia'];
            $tipoM->Nombre = $valor['Nombre'];
            $tipoM->Cantidad = $valor['Cantidad'];
            $tipoM->Valor = $valor['Valor'];
            $tipoM->U_Medida = $valor['U_Medida'];


            array_push($arrTipoMateria, $tipoM);
        }
        $tmp->Disconnect();
        return $arrTipoMateria;
    }

    public static function getAll()
    {
        return TipoMateria::buscar("SELECT * FROM tipo_materia ORDER  BY Nombre ASC ");
    }


    public function editar()
    {
        $this->updateRow("UPDATE tipo_materia SET Nombre = ?, Cantidad = ?, Valor = ?, U_Medida = ? WHERE idTipo_Materia = ?", array(

            $this->Nombre,
            $this->Cantidad,
            $this->Valor,
            $this->U_Medida,

            $this->idTipo_Materia,

        ));
        $this->Disconnect();
    }

    public function eliminar($id)
    {
        // TODO: Implement eliminar() method.
    }


}