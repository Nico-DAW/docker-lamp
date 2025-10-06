<?php 

function test_input($dato){
    $dato=trim($dato);
    $dato=stripslashes($dato);
    return $dato; 
}

$nombre=$correo=$genero="";

$nombre=test_input($_POST["nombre"]);
$correo=test_input($_POST["correo"]);
$genero=test_input($_POST["genero"]);

?>