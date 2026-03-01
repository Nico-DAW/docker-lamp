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
    'raquel'=>['clave'=>'1234.', 'rol'=>'player'],
    'paco'=>['clave'=>'abcd.', 'rol'=>'admin']
];

//Función para comprobar si está logueado 
function estaLogueado(){
    return isset($_SESSION['nombre']);
};

//Función para requerir login
function requiereLogin(){
    if(!isset($_SESSION['nombre'])){
        header("Location:login.php?error=".urlencode("Requiere login"));
        exit();
    }
}

function getRol(){
    return $_SESSION['rol'];
}

?>