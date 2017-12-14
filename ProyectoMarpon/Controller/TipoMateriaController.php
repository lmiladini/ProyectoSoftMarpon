<?php
/**
 * Created by PhpStorm.
 * User: forero
 * Date: 19/11/2017
 * Time: 21:39
 */
require_once (__DIR__.'/../Modelo/TipoMateria.php');

if(!empty($_GET['action'])){
    TipoMateriaController::main($_GET['action']);
}else{
    echo "";
}
class TipoMateriaController
{
    static function main($action)
    {
        if ($action == "crear") {
            TipoMateriaController::crear();
        } else if ($action == "editar") {
            TipoMateriaController::editar();
        } else if ($action == "buscarID") {
            TipoMateriaController::buscarID();
        } else if ($action == "editar") {
            TipoMateriaController::editar();

        }
    }

    static public function crear(){

        try {
            $arrayTipoMateria = array();
            $arrayTipoMateria ['Nombre'] = $_POST['Nombre'];
            $arrayTipoMateria ['Cantidad'] = $_POST['Cantidad'];
            $arrayTipoMateria ['Valor'] = $_POST['Valor'];
            $arrayTipoMateria ['U_Medida'] = $_POST['U_Medida'];


            $TipoMateria = new TipoMateria($arrayTipoMateria);
            $TipoMateria->insertar();
            header("Location: ../Vista/GestionarTipoMateria.php?respuesta=correcto");
        } catch (Exception $e) {
            //var_dump($e);
            header("Location: ../Vista/CreateTipoMateria.php?respuesta=error");
        }
    }

    static public function selectTipoMateria ($isRequired=true, $idTipo_Materia="idTipo_Materia", $Nombre="idTipo_Materia", $class="", $tipoUser="materia"){
        $arrTipoMateria = TipoMateria::getAll();/*("SELECT * FROM clientes WHERE Tipo_Perfil = '".$tipoUser."'");  */
        $htmlSelect = "<select  id=\"e1\" class=\"populate \" style=\"width: 385px\"height: 60
        px\"border: black\" ".(($isRequired) ? "required" : "class='col-lg-4'")." id= '".$idTipo_Materia."' name='".$Nombre."' class='".$class."'>";
        $htmlSelect .= "<option  >Seleccione</option>";
        if(count($arrTipoMateria) > 0){
            foreach ($arrTipoMateria as $tipomateria)
                $htmlSelect .= "<option value='".$tipomateria->getIdTipoMateria()."'>".$tipomateria->getNombre()."</option>";
        }
        $htmlSelect .= "</select>";
        return $htmlSelect;
    }
    static public function tdTabla($id){
        $arrayTipoMateria = TipoMateria::buscarForId($id);
        $htmlSelect ="<td>".$arrayTipoMateria->getNombre()." ".$arrayTipoMateria->getTipo()."</td>";
        return $htmlSelect;
    }
    static public function editar()
    {
        try {
            $arrayTipoMateria = array();
            $arrayTipoMateria ['Nombre'] = $_POST['Nombre'];
            $arrayTipoMateria ['Cantidad'] = $_POST['Cantidad'];
            $arrayTipoMateria ['Valor'] = $_POST['Valor'];
            $arrayTipoMateria ['U_Medida'] = $_POST['U_Medida'];

            $arrayTipoMateria ['idTipo_Materia'] = $_POST['idTipo_Materia'];

            $tipomateria = new TipoMateria($arrayTipoMateria);
            $tipomateria->editar();
            header("Location: ../Vista/GestionarTipoMateria.php?respuesta=correcto");
        } catch (Exception $e) {
           var_dump( $tipomateria);
            //header("Location: ../Vista/editarTipoMateria.php?respuesta=error");
        }
    }

    static public function buscarID($id)
    {
        try {
            return TipoMateria::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../Vista/GestionarTipoMateria.php?respuesta=error");
        }
    }

    public function buscarAll()
    {
        try {
            return TipoMateria::getAll();
        } catch (Exception $e) {
            header("Location: ../Vista/GestionarTipoMateria.php?respuesta=error");
        }
    }

    public function buscar($Query)
    {
        try {
            return TipoMateria::buscar($Query);
        } catch (Exception $e) {
            header("Location: ../Vista/GestionarTipoMateria.php?respuesta=error");
        }
    }

}