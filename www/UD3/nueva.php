<?php
include_once('lib/utils.php');
include_once('lib/db.php');

$arr=[];
$mensaje="";
$name=$_POST['nombre'];
$sname=$_POST['apellidos'];
$age=$_POST['edad']; 
$district=$_POST['provincia']; 
$verify=false;
$id="";

if(isset($_POST['id'])&&!empty($_POST['id'])){
    $id=$_POST['id'];
}

$arr=valida($name, $sname, $age, $district);

$verify=$arr[0];
$mensaje=$arr[1];

// Si la información es válida => true simulamos el almacenado en el array

/*
if($verify){
    guarda($description, $flow);
}
*/

if($verify&&empty($id)){
    $arrValues=[$name,$sname,$age,$district];
    $mensaje=guarda($arrValues);
}else{
    $arrValues=[$id,$name,$sname,$age,$district];
    $mensaje=update($arrValues);
}

/*
Comprobación
var_dump($tareasarr);
*/

header("Location: http://localhost/UD3/registroUsuarios.php?mensaje=".urlencode($mensaje));
exit();
?>