<?php

require_once './classes/base_persona.php';
require_once './interfaces/IComportamiento.php';
use NNV\RestCountries;

class Empleador extends Persona implements IComportamiento{

    public $contratistasAcargo;
    public $oficinasAcargo;

    public function __construct($nombre,$apellido,$edad,$paisResidencia){
        parent::__construct($nombre,$apellido,$edad,$paisResidencia);
        $this->contratistasAcargo = array();
    }
 
    public function emplearContratista($contratista){
        array_push($this->contratistasAcargo,$contratista);
    }

    public function comprarOficinas($region){
        $restCountries = new RestCountries;
        $this->oficinasAcargo = $restCountries->fields(["name","region"])->byRegion($region);
    }
    
    public function presentarse(){
        parent::datosPersonales();
        echo "<br> Contratistas a cargo de $this->nombre: <br>";
        foreach($this->contratistasAcargo as $contratista){
            $contratista->presentarse();
            echo "<br>";
        }
    }

    public function listadoOficinas(){
        echo "Oficinas a cargo de $this->nombre :<br>";
        foreach($this->oficinasAcargo as $value){
            echo "$value->name -"." $value->region <br>";
        }
    }

}