<?php
include('lib/utils.php');

$arr=[];
$mensaje="";
$name=$_POST['nombre'];
$sname=$_POST['apellidos'];
$age=$_POST['edad']; 
$district=$_POST['provincia']; 
$verify=false;

$arr=valida($name, $sname, $age, $district);

$verify=$arr[0];
$mensaje=$arr[1];

// Si la información es válida => true simulamos el almacenado en el array

/*
if($verify){
    guarda($description, $flow);
}
*/

/*
Comprobación
var_dump($tareasarr);
*/

header("Location: http://localhost/UD3/registroUsuarios.php?mensaje=".urlencode($mensaje));
exit();
?>