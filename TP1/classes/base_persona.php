<?php

use NNV\RestCountries;

class Persona{
    public $nombre;
    public $apellido;
    public $edad;
    public $paisResidencia;
    public $lenguaje;

    public function __construct($nombre = "DefaultName",$apellido = "DefaultLastName",$edad = 0,$paisResidencia = "argen"){
        $restCountries = new RestCountries;

        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->edad = $edad;
        $this->paisResidencia = $restCountries->fields(["name","capital","region","currencies","population"])->byName($paisResidencia);
    }

    public function datosPersonales(){
        echo "Nombre: $this->nombre <br>";
        echo "Apellido: $this->apellido <br>";
        echo "Edad: $this->edad <br>";
        echo "Reside en: <br>";
        foreach($this->paisResidencia as $value){
            echo "$value->name - $value->capital - $value->region - Population: $value->population <br>";
        }
    }
}