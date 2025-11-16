<?php
require_once("lib/utils.php");
require_once("lib/init.php");

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
    //var_dump($checkDistr[0]);
    $mensajeDistr = $checkDistr[1];
}

$checkMov = checkPhone($phone);

if($checkMov[0] != true){
    $mensajeMov = $checkMov[1];
}

//Corrección aquí OR en vez de AND (&&) y [1]
if(!empty($mensajeBday[1])||!empty($checkDistr[1])||!empty($checkMov[1])){
    // Aquí podríamos emplear el urlencode();
    header("Location:http://localhost/UD3/Anexo1/nuevoDonante.php?mensajeBday=".$mensajeBday."&mensajeDistr=".$mensajeDistr."&mensajeMov=".$mensajeMov."&mensajeGoodWay="."");
    exit();
}else{
    $mensajeGoodWay = "Se ha almacenado en nuevo usuario en la BBDD;";
    //("Location:http://localhost/UD3/Anexo1/nuevoDonante.php?mensajeGoodWay=".$mensajeGoodWay);
    //Aqui guardamos en la BBDD => definir la función gurdar en lib->init.php
    $conexion = conecta();
    selecciona_db($conexion,"donacion");
    guardarDonante($conexion, $nombre, $apellidos, $edad, $grupo, $cp, $phone);
    header("Location:http://localhost/UD3/Anexo1/nuevoDonante.php?mensajeBday=&mensajeDistr=&mensajeMov=&mensajeGoodWay=".$mensajeGoodWay);
    exit();
}