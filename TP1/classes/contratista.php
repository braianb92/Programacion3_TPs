<?php
require_once './classes/base_persona.php';
require_once './interfaces/IComportamiento.php';

use NNV\RestCountries;

$restCountries = new RestCountries;
$restCountries->All();
class Contratista extends Persona implements IComportamiento{

    public $paisDestino;

    public function __construct($nombre,$apellido,$edad,$paisResidencia,$paisDestino = 'arg'){      
        $this->paisDestino = $restCountries->byName($paisDestino);
        parent::__construct($nombre,$apellido,$edad,$paisResidencia);
    }

    public function presentarse(){
        parent::datosPersonales();
        echo "Pais Destino: <br>";
        echo json_encode($this->paisDestino);
    }
}