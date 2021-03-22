<?php


class UserRepository 
{
	public static function checkLogin($u,$p){
        $db=Conectar::conexion();
		$result= $db->query("SELECT * FROM usuario WHERE nombre = '".$u."' AND pass ='".md5($p)."'");
		if($row=$result->fetch_assoc())		
			return new UserModel($row);			
		else return FALSE;
    }


    public function getUsuarios(){
		$bd=Conectar::conexion();
		$usuarios=array();
		$result= $bd->query("SELECT * FROM usuario");
		while($row=$result->fetch_assoc())		
			$usuarios[]=new UserModel($row);			
		return $usuarios;
	}

	public static function cambiarRol($n,$r){
		$bd=Conectar::conexion();
		if($r==0){
			$result = $bd->query("UPDATE `usuario` SET `rol` = 1 WHERE `usuario`.`nombre` = '".$n."'");

		}else{

			$result = $bd->query("UPDATE `usuario` SET `rol` = 0 WHERE `usuario`.`nombre` = '".$n."'");

		}
	}
    
}
?>