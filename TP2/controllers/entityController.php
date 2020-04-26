<?php

namespace entityController;

include_once './classes/response.php';
include_once './classes/data.php';
include_once './classes/auth.php';

use response\Response;
use data\Data;
use auth\Auth;

class EntityController{

    //Retorna la lista de usuarios o admins segun el rol pasado por parametro.
    public static function GetLista($tipo){
        $response = new Response();
        $users = Data::readAll();

        if(isset($users)){ 
            
            foreach ($users as $user) {

                if($user->tipo == $tipo){
                    array_push($response->data,$user);
                }
            }

            return $response;
        }
        else{
            $response->status = 'fail';
            return $response;
        }
    }

    //Retorna el usuario o admin dueño del email.
    public static function GetDetalle($email){
        $response = new Response();
        $users = Data::readAll();

        if(isset($users)){
            
            foreach ($users as $user) {

                if($user->email == $email){
                    $response->data = $user;
                    return $response;
                }
            }
            
            $response->status = 'not found';
            return $response;
        }
        else{
            $response->status = 'fail';
            return $response;
        }
    }

    //Registra un usuario o admin.
    public static function signIn($user){
        $response = new Response();

        if(isset($user)){
            Data::save($user);
            return $response;
        }
        else{
            $response->status = 'fail';
            return $response;
        }       
    }

    //Retorna un JWT si el usuario o admin existe.
    public static function login($email,$clave){
        $response = new Response();

        if(isset($email)&&isset($clave)){
            $users = Data::readAll();

            foreach ($users as $user) {

                if($user->email == $email && $user->clave == $clave){

                    $response->data = Auth::encode($user);
                    return $response;
                }
            }

            return $response->status = 'Login Failed, User Not Found';
        }
        else{
            return $response->status = 'fail';
        }
    }

    public static function userRole($userEmail){
        $users = Data::readAll();

        foreach($users as $user){
            if($user->email == $userEmail)
            return $user->tipo;
        }
    }
}