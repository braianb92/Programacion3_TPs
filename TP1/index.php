<!-- Crear una aplicación con composer que utilice una dependencia.
Se debe utilizar POO, herencia, al menos 3 clases y una interfaz, métodos de clase y de instancia.
Se debe poder obtener los países por continente, sub región, por idioma o capital y los detalles completos de cada país.
Crear un repositorio en github para guardar el código.

El paquete de países que vimos en clase es namnv609/php-rest-countries.

Se puede utilizar cualquier paquete si se respeta la consigna. -->
<?php

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

debug();

require __DIR__ . '/vendor/autoload.php';
foreach(glob("interfaces/*.php") as $interface){
    require_once $interface;
}

foreach (glob("classes/*.php") as $class){
    require_once $class;
}


$empleador = new Empleador('Marcos','Gomez',50,'germa');

$contratista1 = new Contratista('Juan','Fernandez',24,'fin','rus');
$contratista2 = new Contratista('Maria','Alvarez',32,'argen','spai');

$empleador.agregarContratista($contratista1);
$empleador.agregarContratista($contratista2);

$empleador.presentarse();


?>