<?php

use IComportamiento;
require_once 'persona.php';
require_once './../interfaces/IComportamiento.php';

class Contratista extends Persona implements IComportamiento{

    public $lenguaje;
    public $paisDestino;

    public function __construct($nombre,$apellido,$edad,$paisResidencia,$lenguaje,$paisDestino){
        $this->lenguaje = $lenguaje;
        $this->paisDestino = $paisDestino;
        parent::__construct($nombre,$apellido,$edad,$paisResidencia);
    }

    public function presentarse(){
        parent::datosPersonales();
        echo "Lenguaje: $this->lenguaje";
        echo "Pais Destino: $this->paisDestino";
    }
}