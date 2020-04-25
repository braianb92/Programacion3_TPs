<?php

namespace entity;

class Entity{
    public $nombre;
    public $apellido;
    public $telefono;
    public $email;
    public $password;
    public $role;

    public function __construct($_nombre,$_apellido,$_telefono,$_email,$_password,$_role){
        $this->nombre = $_nombre;
        $this->apellido = $_apellido;
        $this->telefono = $_telefono;
        $this->email = $_email;
        $this->password = $_password;
        $this->role = $_role;
    }
}