<?php
include('utils.php');

$arr=[];
$mensaje="";
$description=$_POST['descripcion'];
$flow=$_POST['estado']; 
$verify=false;

/* Las siguientes funciones las había definido aquí pero siguiendo el enunciado del ejercicio hay que hacerlo en utils.php

function check($campo){
    $campo=htmlspecialchars($campo);
    $campo=trim($campo);
    $campo=stripslashes($campo);
    return $campo;
}

function valida($description, $flow){
    if(!empty($description)&&!empty($flow)){
        $description=check($description);
        $estado=check($flow);
        $mensaje="Los campos contienen información validada";
        $arr=[true,$mensaje];
    }else{
       if(empty($description)){
        $mensaje="Debe definir un descripción";
        $arr=[false,$mensaje];
       }else{
        $mensaje="Debe definir un estado";
        $arr=[false,$mensaje];
       }
    }
    return $arr;
}

*/

$arr=valida($description, $flow);

$verify=$arr[0];
$mensaje=$arr[1];

// Si la información es válida => true simulamos el almacenado en el array

if($verify){
    guarda($description, $flow);
}

/*
Comprobación
var_dump($tareasarr);
*/

header("Location: http://localhost/UD2/anexo/nuevaForm.php?mensaje=".urlencode($mensaje));
exit();
?>