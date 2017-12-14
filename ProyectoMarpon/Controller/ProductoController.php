<?php
require_once (__DIR__ . '/../Modelo/Producto.php');

if(!empty($_GET['action'])){
    ProductoController::main($_GET['action']);
}else{

}


/**
 * Created by PhpStorm.
 * User: Paula
 * Date: 19/11/2017
 * Time: 22:16
 */





class ProductoController
{
    static function main($action)
    {
        if ($action == "crear") {
            ProductoController::crear();
        } else if ($action == "editar") {
            ProductoController::editar();
        }else if ($action == "ActivarProducto"){
            ProductoController::ActivarProducto();
        }else if ($action == "InactivarProducto"){
            ProductoController::InactivarProducto();
        } else if ($action == "eliminar") {
            ClienteController::eliminar();
        } else if ($action == "buscarID") {
            ProductoController::buscarID();

        }
    }

    static public function crear()
    {

            try {
                $path = 'no hay dato';
                $arrayPro = array();
                $img = $_POST['Doc'];

                $new=$_FILES['Foto']['name'];
                $nomdir = "../Vista/images/";
                $nombrefoto=$nomdir.$img.$new;
                move_uploaded_file($_FILES['Foto']['tmp_name'],'../Vista/image/'.$img.$new);

                $path = 'image/'.$img.$new;



                $arrayPro = array();
                $arrayPro['Nombre']=$_POST['Nombre'];

            $arrayPro['Foto'] = $path;
            $arrayPro['Precio'] = $_POST['Precio'];
            $arrayPro['Estado'] = 'Activo';
            $arrayPro['Descripcion'] = $_POST['Descripcion'];
            $Producto = new Producto($arrayPro);
            $Producto->insertar();
            header("Location: ../Vista/listPro.php?respuesta=1");
        } catch (Exception $e) {
                //var_dump(e);
            header("Location: ../Vista/Producto.php?respuesta=0");

        }

    }

    static public function selectProducto ($isRequired=true, $idProducto="idProducto", $Nombre="idProducto",$Precio="idProducto", $class="", $tipoUser="Pro"){
        $arrPro = Producto::getAll();/*("SELECT * FROM producto WHERE Tipo_Perfil = '".$tipoUser."'");  */
        $htmlSelect = "<select  id=\"e2\" class=\"populate \" style=\"width: 380px\"height: 60
        px\" ".(($isRequired) ? "required" : "")." id= '".$idProducto."' name='".$Nombre."' class='".$class."'>";

        $htmlSelect .= "<option >Seleccione</option>";

        if(count($arrPro) > 0){
            foreach ($arrPro as $pro)
                $htmlSelect .= "<option value='".$pro->getIdProducto()."'>".$pro->getNombre()."</option>";
        }
        $htmlSelect .= "</select>";
        return $htmlSelect;
    }

    static public function select ($isRequired=true, $idProducto="idProducto", $Nombre="idProducto",$Precio="idProducto", $class="", $tipoUser="Pro"){
        $prod= $_POST['pro'];

        $arrPro = Producto::getAll();


        $miSelect = "";
        if(count($arrPro) > 0) {
            foreach ($prod as $Precio) {
                $miSelect .= "<option value=" . $Precio . ">" . $Precio . "</option>";
            }

            echo $miSelect;
        }}
    static public function tdTabla($id){
        $arrarProducto = Producto::buscarForId($id);
        $htmlSelect ="<td>".$arrarProducto->getPrecio()."</td>";

        return $htmlSelect;
    }

    static public function editar()
    {
        try {
            $path = 'no hay dato';
            $arrayPro = array();
            $img = $_POST['Doc'];

            $new=$_FILES['Foto']['name'];
            $nomdir = "../Vista/images/";
            $nombrefoto=$nomdir.$img.$new;
            move_uploaded_file($_FILES['Foto']['tmp_name'],'../Vista/image/'.$img.$new);

            $path = 'image/'.$img.$new;


            $arrayProducto ['Foto'] = $path;
            $arrayProducto ['Nombre'] = $_POST['Nombre'];

            $arrayProducto ['Precio'] = $_POST['Precio'];
            $arrayProducto ['Estado'] = $_POST['Estado'];
            $arrayProducto ['Descripcion'] = $_POST['Descripcion'];
            $arrayProducto ['idProducto'] = $_POST['idProducto'];

            $producto = new Producto($arrayProducto);
            $producto->editar();
            header("Location: ../Vista/listPro.php?respuesta=correcto");
        } catch (Exception $e) {
            header("Location: ../Vista/listPro.php?respuesta=error");
        }
    }
    static public function buscarID($id)
    {
        try {
            return Producto::buscarForId($id);
        } catch (Exception $e) {
            header("Location: ../Vista/listPro.php?respuesta=error");
        }
    }

    public function buscarAll()
    {
        try {
            return Producto::getAll();
        } catch (Exception $e) {
            header("Location: ../Vista/listPro.php?respuesta=error");
        }
    }

    public function buscar($Query)
    {
        try {
            return Producto::buscar($Query);
        } catch (Exception $e) {
            header("Location: ../Vista/listPro.php?respuesta=error");
        }
    }
    static public function ActivarProducto (){
        try {
            $ObjPro = Producto::buscarForId($_GET['IdProducto']);
            $ObjPro->setEstado("Activo");
            $ObjPro->editar();
            header("Location: ../Vista/listPro.php");
        } catch (Exception $e) {

            // header("Location: ../Vista/listPro.php?respuesta=error");
        }
    }

    static public function InactivarProducto (){
        try {
            $ObjProducto = Producto::buscarForId($_GET['IdProducto']);
            $ObjProducto->setEstado("Inactivo");
            $ObjProducto->editar();
            header("Location: ../Vista/listPro.php");
        } catch (Exception $e) {
            header("Location: ../Vista/listPro.php?respuesta=error");
        }
    }



}