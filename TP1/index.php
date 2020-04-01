<!-- Crear una aplicación con composer que utilice una dependencia.
Se debe utilizar POO, herencia, al menos 3 clases y una interfaz, métodos de clase y de instancia.
Se debe poder obtener los países por continente, sub región, por idioma o capital y los detalles completos de cada país.
Crear un repositorio en github para guardar el código.

El paquete de países que vimos en clase es namnv609/php-rest-countries.

Se puede utilizar cualquier paquete si se respeta la consigna. -->
<?php
use NNV\RestCountries;

echo "compiles!";


$restCountries = new RestCountries;

echo json_decode($restCountries->all());

?>