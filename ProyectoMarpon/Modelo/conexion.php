<?php
/**
 * Created by PhpStorm.
 * User: Paula
 * Date: 27/11/2017
 * Time: 21:58
 */

class conexion extends PDO
{
    public function __construct(){
        $this->isConnected = true;
        try {
            //$this->datab = new PDO("mysql:host={$this->host};dbname={$this->dbname};charset=utf8", $this->username, $this->password, array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));
            parent::__construct('mysql:host=localhost;dbname=marpo','root','');
            parent::setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e) {
            echo $e.'<br>';
            die('Error mula');
               }
    }

}