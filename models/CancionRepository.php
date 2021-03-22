<?php


class CancionRepository {

    public static function insertCancion($t,$a,$d,$i){
        $bd=Conectar::conexion();
        $result= $result= $bd->query("INSERT INTO `canciones` (`id`, `titulo`, `autor`, `duracion`,`idlista`) VALUES (NULL,'".$t."','".$a."','".$d."','".$i."')");
    }


    public static function getCancionByLista($i){
        $bd=Conectar::conexion();
        $canciones=array();
        $result= $bd->query("SELECT * FROM canciones WHERE idlista = '".$i."'");
        while($row=$result->fetch_assoc()){
            $canciones[]=new CancionModel($row);
        }
        return $canciones;
    
    }

    
	public function getBuscador($t){
        $bd=Conectar::conexion();
        $ListaCanciones=array();
        $result= $bd->query("SELECT * FROM canciones WHERE titulo LIKE  '%$t%' OR autor LIKE  '%$t%'");
        while($row=$result->fetch_assoc()){
            $ListaCanciones[]=new CancionModel($row);
        }
        return $ListaCanciones;
    }
    
    public function getCanciones(){
        $bd=Conectar::conexion();
        $canciones=array();
        $result= $bd->query("SELECT * FROM canciones");
        while($row=$result->fetch_assoc()){
            $canciones[]=new CancionModel($row);
        }
        return $canciones;
    }

    
}
?>