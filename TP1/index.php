<!-- Crear una aplicación con composer que utilice una dependencia.
Se debe utilizar POO, herencia, al menos 3 clases y una interfaz, métodos de clase y de instancia.
Se debe poder obtener los países por continente, sub región, por idioma o capital y los detalles completos de cada país.
Crear un repositorio en github para guardar el código.

El paquete de países que vimos en clase es namnv609/php-rest-countries.

Se puede utilizar cualquier paquete si se respeta la consigna. -->
<?php
require __DIR__ . '/vendor/autoload.php';
require_once './classes/empleador.php';
require_once './classes/contratista.php';

#Funcion que habilita el debugger (ejemplo para postman con metodo GET -> http://127.0.0.1/TP1/index.php?debug)
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

#Se llama a la funcion debug para activarlo.
debug();

//Llama al metodo de buscar paises por nombre parcial.
$empleador = new Empleador('Marcos','Gomez',50,'germa');

//Llama al metodo de buscar paises por region.
$empleador->comprarOficinas('Europe');

//Llama al metodo de buscar paises por region. (pais residencia y pais destino).
$contratista1 = new Contratista('Juan','Fernandez',24,'fin','portu');
$contratista2 = new Contratista('Maria','Alvarez',32,'argen','spai');

$empleador->emplearContratista($contratista1);
$empleador->emplearContratista($contratista2);

$empleador->presentarse();
echo "<br>";
$empleador->listadoOficinas();


?>