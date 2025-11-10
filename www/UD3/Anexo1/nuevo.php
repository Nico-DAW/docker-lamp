<?php
require_once("lib/utils.php");

$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$edad = $_POST['edad'];
$grupo = $_POST['grupo'];
$cp = $_POST['cp'];
$phone = $_POST['phone'];

$mensaje = ""; 

$nombre = validaCampo($nombre);
$apellidos = validaCampo($apellidos);
$edad = validaCampo($edad);
$cp = validaCampo($cp);
$phone = validaCampo($phone);
$mensajeBday = "";
$mensajeDistr = "";
$mensajeMov = "";


$checkBday = checkEdad($edad);

if($checkBday[0] != true){
    $mensajeBday = $checkBday[1];
}

$checkDistr = checkCp($cp);

if($checkDistr[0] != true){
    $mensajeDistr = $checkDistr[1];
}

$checkMov = checkPhone($phone);

if($checkMov[0] != true){
    $mensajeMov = $checkMov[1];
}

if(!empty($mensajeBday)&&!empty($checkDistr)&&!empty($checkMov)){
    // Aquí podríamos emplear el urlencode();
    header("Location:http://localhost/UD3/Anexo1/nuevoDonante.php?mensajeBday=".$mensajeBday."&mensajeDistr=".$mensajeDistr."&mensajeMov=".$mensajeMov."&mensajeGoodWay="."");
    exit();
}else{
    $mensajeGoodWay = "Se ha almacenado en nuevo usuario en la BBDD;";
    //("Location:http://localhost/UD3/Anexo1/nuevoDonante.php?mensajeGoodWay=".$mensajeGoodWay);
    //Aqui guardamos en la BBDD => definir la función gurdar en lib->init.php
    header("Location:http://localhost/UD3/Anexo1/nuevoDonante.php?mensajeBday=&mensajeDistr=&mensajeMov=&mensajeGoodWay=".$mensajeGoodWay);
    exit();
}