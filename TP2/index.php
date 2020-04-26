<?php
include_once './vendor/autoload.php';
include_once './controllers/entityController.php';
include_once './classes/entity.php';

use entityController\EntityController;
use entity\Entity;

session_start();

$queryParam = $_SERVER['QUERY_STRING'];

$method = $_SERVER['REQUEST_METHOD'];

$path = $_SERVER['PATH_INFO'] ?? '';

switch ($method) {
    case 'POST':
        switch (strtolower($path)) {
            case '/signin':
                if(isset($_POST['nombre'])&&
                    isset($_POST['apellido'])&&
                    isset($_POST['telefono'])&&
                    isset($_POST['email'])&&
                    isset($_POST['clave'])&&
                    isset($_POST['tipo'])){
                        $entity = new Entity($_POST['nombre'],$_POST['apellido'],$_POST['telefono'],$_POST['email'],$_POST['clave'],$_POST['tipo']);
                        $response = EntityController::signIn($entity);
                        echo "Se registro correctamente"." ".json_encode($response);
                    }
                    else{
                        echo "Bad Request";
                    }
                break;

            case '/login':
                if(isset($_POST['email']) && isset($_POST['clave'])){
                    $response = EntityController::login($_POST['email'],$_POST['clave']);
                    echo json_encode($response);

                    if($response->status === 'success'){
                        
                        $_SESSION['email'] = $_POST['email'];
                        $_SESSION['tipo'] = EntityController::userRole($_POST['email']);
                    }
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
        switch (strtolower($path)) {
            case '/detalle':

            $session = $_SESSION['email'] ?? false;

            if($session == false){
                echo "Debe iniciar sesion primero!";
            }
            else{
                $response = EntityController::GetDetalle($session);
                echo json_encode($response);
            }
                break;

            case '/lista':
                $session = $_SESSION['email'] ?? false;

            if($session == false){
                echo "Debe iniciar sesion primero!";
            }
            else{

                $response = EntityController::GetLista($_SESSION['tipo']);
                echo json_encode($response);
            }
                break;

            case '/logout':

                $session = $_SESSION['email'] ?? false;

                if($session===false){
                    echo "No ha iniciado sesion";
                }
                else{
                    echo $_SESSION['email']." cerro sesion";
                    session_destroy();
                }
                break;

            default:
                echo "Path Not Found";
                break;
        }
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