<?php

use IComportamiento;
require_once 'persona.php';
require_once './../interfaces/IComportamiento.php';

class Empleador extends Persona implements IComportamiento{

    public $contratistaAcargo;

    public function __construct($nombre,$apellido,$edad,$paisResidencia,$contratistaAcargo){
        $this->contratistaAcargo = $contratistaAcargo;
        parent::__construct($nombre,$apellido,$edad,$paisResidencia);
    }
 
    public function presentarse(){
        parent::datosPersonales();
        echo "Contratista/s a cargo: $this->contratistaAcargo";
    }

}