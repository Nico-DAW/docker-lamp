<?php 
$tareasarr=[
    ["Arrays y sentencias. Ejercicios de arrays y sentencias de control", "Finalizada"], 
    ["Formularios html. Ejercicios de formularios","Finalizada"], 
    ["Funciones y Librerias. Ejercicios de funciones y librerias","En curso"]
];

function listarTareas($tareasarr){
    foreach($tareasarr as $key=>$value){
        echo "<tr><td>".$key."</td><td>".$value[0]."</td><td>".$value[1]."</td></tr>";
    }
};

?>