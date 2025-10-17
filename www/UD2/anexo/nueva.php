<?php
$mensaje;
$str;
$descripcion, $estado; 

function check($campo){
    $campo=htmlspecialchars($campo);
    $campo=trim($campo);
    $campo=stipslashes($campo);
    return $campo;
}

function valida($descripcion, $estado){
     if(isset($_POST['descripcion'])&&isset($_POST['estado']){
        $descripcion=$_POST['descripcion'];
        $estado=$_POST['estado'];
        $descripcion=check($descripcion);
        $estado=check($estado);
        $mensaje="El campo contiene información validada";
        return $mensaje;
    }
}

?>