<?php

use NNV\RestCountries;

$restCountries = new RestCountries;

class Persona{
    public $nombre;
    public $apellido;
    public $edad;
    public $paisResidencia;
    public $lenguaje;

    public function __construct($nombre = "DefaultName",$apellido = "DefaultLastName",$edad = 0,$paisResidencia = "argen"){
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->edad = $edad;
        $this->paisResidencia = $restCountries->byName($paisResidencia);
        $this->lenguaje = $paisResidencia->languages;
    }

    public function datosPersonales(){
        echo "Nombre: $this->nombre <br>";
        echo "Apellido: $this->apellido <br>";
        echo "Edad: $this->edad <br>";
        echo "Reside en: <br>";
        echo json_encode($this->paisResidencia)."<br>";
        echo "Lenguaje: <br>";
        echo json_encode($this->lenguaje)."<br>";
    }
}