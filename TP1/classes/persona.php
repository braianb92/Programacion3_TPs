<?php

class Persona{
    public $nombre;
    public $apellido;
    public $edad;
    public $paisResidencia;

    public function __construct($nombre = "DefaultName",$apellido = "DefaultLastName",$edad = 0,$paisResidencia = "None"){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->edad = $edad;
        $this->paisResidencia = $paisResidencia;
    }

    public function datosPersonales(){
        echo "Nombre: $this->nombre<br>";
        echo "Apellido: $this->apellido<br>";
        echo "Edad: $this->edad<br>";
        echo "Reside en: $this->paisResidencia<br>";
    }
}