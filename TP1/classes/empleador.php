<?php

require_once './classes/base_persona.php';
require_once './interfaces/IComportamiento.php';
class Empleador extends Persona implements IComportamiento{

    public $contratistasAcargo;

    public function __construct($nombre,$apellido,$edad,$paisResidencia){
        parent::__construct($nombre,$apellido,$edad,$paisResidencia);
    }
 
    public function agregarContratista($contratista){
        array_push($this->contratistasAcargo,$contratista);
    }
    
    public function presentarse(){
        parent::datosPersonales();
        echo "Contratistas: <br>";
        foreach($array as $value){
            echo $value."<br>";
        }
    }

}