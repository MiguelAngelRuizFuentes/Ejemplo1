<?php


class ListaReproduccionRepository {
    
    public static function insertLista($t){
		$bd=Conectar::conexion();
		$result= $result= $bd->query("INSERT INTO `listareproduccion` (`id`,`nombre`,`usuario`) VALUES (NULL,'".$t."','".$_SESSION['u']->nombre."')");
    }
     
    public function getLista(){
		$bd=Conectar::conexion();
		$ListaRe=array();
		$result= $bd->query("SELECT * FROM listareproduccion WHERE listareproduccion.usuario = '".$_SESSION['u']->nombre."'");
		while($row=$result->fetch_assoc())		
			$ListaRe[]=new ListaReproduccionModel($row);			
		return $ListaRe;
    }
    
    


    
}
?>