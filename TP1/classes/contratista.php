<?php
require_once './classes/base_persona.php';
require_once './interfaces/IComportamiento.php';

use NNV\RestCountries;

class Contratista extends Persona implements IComportamiento{

    public $paisDestino;

    public function __construct($nombre,$apellido,$edad,$paisResidencia,$paisDestino = 'arg'){  
        $restCountries = new RestCountries;    
        parent::__construct($nombre,$apellido,$edad,$paisResidencia);
        $this->paisDestino = $restCountries->fields(["name","capital","region","currencies","population"])->byName($paisDestino);
    }

    public function presentarse(){
        parent::datosPersonales();
        echo "Pais de destino: <br>";
        foreach($this->paisDestino as $value){
            echo "$value->name - $value->capital - $value->region - Population: $value->population <br>";
        }
    }
}