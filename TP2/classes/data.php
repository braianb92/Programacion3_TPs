<?php

namespace data;

class Data{

    //Guarda en un txt un objeto serializado.
    public static function saveSerialized($user){

    if(isset($user)){

        $file =  fopen('files/users.txt','a+');
        
        $response = fwrite($file,serialize($user));
        
        fclose($file);
        
        return $response;
    }

    return false;
}

    //Lee el archivo txt y deserealiza.
    //Devuelve un array de usuarios.
    public static function readAll(){
    
    $file =  fopen('files/users.txt','r+');
    
    $data = fread($file,filesize('files/users.txt'));
    
    fclose($file);
    
    $users = unserialize($data);

    return $users;
}

}