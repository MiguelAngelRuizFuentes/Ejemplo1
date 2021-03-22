<?php

class UserModel {
    private $id;
    private $nombre;
    private $pass;
    private $rol;

	public function __construct($datos){
        $this->id=$datos['id'];
        $this->nombre=$datos['nombre'];
        $this->pass=$datos['pass'];
        $this->rol=$datos['rol'];
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