<?php

namespace entity;

class Entity{
    public $nombre;
    public $apellido;
    public $telefono;
    public $email;
    public $clave;
    public $tipo;

    public function __construct($_nombre,$_apellido,$_telefono,$_email,$_clave,$_tipo){
        $this->nombre = $_nombre;
        $this->apellido = $_apellido;
        $this->telefono = $_telefono;
        $this->email = $_email;
        $this->clave = $_clave;
        $this->tipo = $_tipo;
    }
}