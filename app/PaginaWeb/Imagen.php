<?php

namespace App\PaginaWeb;

class Imagen{

    private $nombre;
    private $descripcion;
    private $ruta;

    function __construct($nombre, $descripcion, $ruta){

            $this->nombre=$nombre;
            $this->descripcion=$descripcion;
            $this->ruta=$ruta;
    }

    public function getNombre(){

        return $this-> nombre;
    }

    public function getDescripcion(){
        return $this->descripcion;
    }

    public function getRuta(){

        return $this->ruta;
    }

}


