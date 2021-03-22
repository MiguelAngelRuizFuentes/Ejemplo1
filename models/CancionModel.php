<?php

class CancionModel {
    private $id;
    private $titulo;
    private $autor;
    private $duracion;

	public function __construct($datos){
        $this->id=$datos['id'];
        $this->titulo=$datos['titulo'];
        $this->pass=$datos['autor'];
        $this->rol=$datos['duracion'];
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