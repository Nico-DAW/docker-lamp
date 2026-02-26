<?php 
/*
Archivo de configuración --> Dispondremos aquí el código que en principio
necesitaremos en todas las páginas. Como por ejemplo session_start()
*/

//Iniciamos la sesion la idea será incluir este archivo al inicio de todos los ficheros. 

session_start();

/* 
Definimos los posibles usuarios en un array. Un simulación. Lo suyo sería recuperarlos
de un BBDD.
*/
$usuarios = [
    'raquel'=>['clave'=>'1234.abc', 'rol'=>'player'],
    'paco'=>['clave'=>'abc.1234', 'rol'=>'admin']
];

function estaLogueado(){
    return isset($_SESSION['nombre']);
};

function getRol(){
    return $_SESSION['rol'];
}

?>