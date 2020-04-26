<?php

namespace data;

class Data{

    //Guarda en un JSON un array de usuarios.
    public static function save($user){

        if(isset($user)){

            $data = Data::readAll();

            array_push($data,$user);
            
            $filePath = 'files/users.json';

            $file = fopen($filePath, 'w');

            $rta = fwrite($file, json_encode($data));

            fclose($file);

            return $rta;
        }

    return false;
}

    //Lee el archivo JSON y devuelve un array de usuarios.
    public static function readAll(){
    $filePath = 'files/users.json'; 

    $file = fopen($filePath, 'r');

    $data = fread($file, filesize($filePath));
   
    fclose($file);

    if(strlen($data)>1){

        $arrayJSON = json_decode($data);

        return $arrayJSON;
    }
    
    return $emptyArray = array();
}

}