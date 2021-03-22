<?php
class Conectar{
    public static function conexion(){
        $conexion=new mysqli("localhost", "root", "", "listareproduccion");
        $conexion->query("SET NAMES 'utf8'");
        return $conexion;
    }
}
?>