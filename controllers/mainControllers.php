<?php
//cargamos el modelo
require_once("models/UserModel.php");
require_once("models/UserRepository.php");
require_once("models/CancionModel.php");
require_once("models/CancionRepository.php");
require_once("models/ListaReproduccionModel.php");
require_once("models/ListaReproduccionRepository.php");
session_start();


if(!isset($_SESSION['u']))
	$_SESSION['u']=FALSE;

if(isset($_GET['user']))
	require('controllers/userControllers.php');

//creamos el metodo para añadir listas de reproduccion//
if(isset($_GET['Post'])){

	$lista=ListaReproduccionRepository::insertLista($_POST['titulo']);
	header('location: index.php');
}

if ($_SESSION['u']) {
	$lista=ListaReproduccionRepository::getLista();
	$canciones=CancionRepository ::getCanciones();
}

if(isset($_GET['nuevaCancion'])){
	
	$cancion=CancionRepository::insertCancion($_POST['titulo'],$_POST['autor'],$_POST['duracion'],$_POST['listaid']);
	header('location: index.php');
}

if(isset($_GET['buscador'])){
	require_once('views/BuscadorView.phtml');
	exit;
}

if(isset($_POST['buscadorpalabra'])){
	$canciones=CancionRepository::getBuscador($_POST['buscadort']);
}

	
// cargar la vista
require_once("views/ListView.phtml");
?>