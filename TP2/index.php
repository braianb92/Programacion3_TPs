<?php
include_once './vendor/autoload.php';
include_once './controllers/entityController.php';
include_once './classes/entity.php';

use entityController\EntityController;
use entity\Entity;

#nombre=juan
$queryParam = $_SERVER['QUERY_STRING'];
#GET
$method = $_SERVER['REQUEST_METHOD'];
#/getall
$path = $_SERVER['PATH_INFO'] ?? '';

switch ($method) {
    case 'POST':
        switch (strtolower($path)) {
            case '/signin':
                if(isset($_POST['nombre'])&&
                    isset($_POST['apellido'])&&
                    isset($_POST['telefono'])&&
                    isset($_POST['email'])&&
                    isset($_POST['password'])&&
                    isset($_POST['role'])){
                        $entity = new Entity($_POST['nombre'],$_POST['apellido'],$_POST['telefono'],$_POST['email'],$_POST['password'],$_POST['role']);
                        $response = EntityController::signIn($entity);
                        echo "Se registro correctamente"." ".json_encode($response);
                    }
                    else{
                        echo "Bad Request";
                    }
                break;

            case '/login':
                if(isset($_POST['email']) && isset($_POST['password'])){
                    $response = EntityController::login($_POST['email'],$_POST['password']);
                    echo json_encode($response);
                }
                else{
                    echo "Bad Request";
                }
                break;
            
            default:
                echo "Path Not Found";
                break;
        }
        break;

    case 'GET':
        
        break;
    
    default:
        echo "Method Not Allowed";
        break;
}
















debug();

function debug(){
    if(isset($_GET['debug'])){
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
    }else{
        error_reporting(0);
        ini_set('display_errors', 0);
    }
}