<?php 
$tareasarr=[
    ["Arrays y sentencias. Ejercicios de arrays y sentencias de control", "Finalizada"], 
    ["Formularios html. Ejercicios de formularios","Finalizada"], 
    ["Funciones y Librerias. Ejercicios de funciones y librerias","En curso"]
];

/*
A ver... esto no es... elegante... se mezcla vista y controlador. Lo que se tenga que mostrar hacerlo en la vista. Separado del controlador.

function listarTareas($tareasarr){
    foreach($tareasarr as $key=>$value){
        echo "<tr><td>".$key."</td><td>".$value[0]."</td><td>".$value[1]."</td></tr>";
    }
};

Por tanto-->
*/

function listarTareas($tareasarr){
    return $tareasarr;
};

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

function guarda($descripcion, $estado){
    global $tareasarr;
    array_push($tareasarr,[$descripcion, $estado]);
}

?>