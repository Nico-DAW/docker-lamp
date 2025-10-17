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

?>