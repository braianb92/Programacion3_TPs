<?php

namespace auth;

use \Firebase\JWT\JWT;

class Auth{

    //Hace un encode del JWT junto con la informacion
    //no sensible del usuario. Retorna un JWT
    public static function encode($entity){
        $key = "clave_super_secreta_Baldino";
        $payload = array(
            "iss" => "https://github.com/braianb92/Programacion3_TPs",
            "aud" => "https://github.com/braianb92/Programacion3_TPs",
            "iat" => 1356999524,
            "nbf" => 1357000000,
            "nombre" => $entity->nombre,
            "apellido" => $entity->apellido,
            "email" => $entity->email
        );

        return JWT::encode($payload, $key);
    }

    //Decodifica
    public static function decode($jwt){
        $key = "clave_super_secreta_Baldino";
        return JWT::decode($jwt, $key, array('HS256'));
    }

}