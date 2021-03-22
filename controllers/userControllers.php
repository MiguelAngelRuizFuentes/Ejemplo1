<?php
if(isset($_POST['Nombre'])){
	$_SESSION['u'] = UserRepository::checkLogin($_POST['Nombre'], $_POST['pass']);
	}
	
if(isset($_GET['logout'])){
	//$_SESSION['u']=FALSE;
	session_destroy();
	header('location: index.php');
}

if(isset($_GET['register'])){
	require_once('views/RegisterView.phtml');
	exit;
}

if(isset($_POST['pass2'])){
	if($_POST['pass1']==$_POST['pass2'] && !empty($_POST['newNombre'])){
			$db=Conectar::conexion();
			$result=$db->query("SELECT * FROM usuario WHERE Nombre = '".$_POST['newNombre']."'");
			if($row=$result->fetch_assoc())
				{$_SESSION['error']="Usuario ya existe";}
			else {
				$result=$db->query("INSERT INTO usuario VALUES (NULL,'".$_POST['newNombre']."','".md5($_POST['pass1'])."',0)");
				$_SESSION['error']="Registro correcto";
			}
		}
		else {$_SESSION['error']="Usuario ya existe o contraseñas diferentes";}
	
}

if(isset($_GET['Usuarios'])){
	require_once('views/TotalView.phtml');
	exit;
}




?>