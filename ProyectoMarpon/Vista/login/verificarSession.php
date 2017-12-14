<?php
session_start();


if (!empty($_SESSION["Perfil"])){
    if ($_SESSION["Perfil"] == "Administrador"){
        header("Location: ../index.php");
    }else if($_SESSION["Perfil"] == "Empleado"){
        header("Location: ../index.php");
    }

}