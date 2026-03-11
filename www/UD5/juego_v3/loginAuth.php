<?php 
require_once("config/utils.php");
require_once("models/Autorizacion.php");
require_once("models/Users.php");

/* 
Antes de haber creado las clases Autorización y Users
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(compruebaLogin($_POST['username'], $_POST['pass'])){
        header("Location:index.php?mensaje=".urlencode("Usuario logueado correctamente."));
        exit();
    }else{
        header("Location:login.php?mensaje=".urlencode("Se requiere login."));
        exit();
    }
}
?>
*/

if($_SERVER['REQUEST_METHOD']=='POST'){
    if(Autoriza::login($_POST['username'], $_POST['pass'])){
        header("Location:index.php?mensaje=".urlencode("Usuario logueado correctamente."));
        exit();
    }else{
        header("Location:login.php?mensaje=".urlencode("Se requiere login."));
        exit();
    }
}
?>

