<?php

class ListaReproduccionModel {
    private $id;
    private $nombre;
    private $usuario;
    private $canciones;

	public function __construct($datos){
        $this->id=$datos['id'];
        $this->nombre=$datos['nombre'];
        $this->usuario=$datos['usuario'];
        $this->canciones=CancionRepository::getCancionByLista($datos['id']);
	}

	public function __get($propiedad){
        return $this->$propiedad;
    }

    public function __set($property, $value){
        if(property_exists($this, $property)) {
            $this->$property = $value;
        }

    }

    


}


?>