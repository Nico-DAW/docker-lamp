<?php
 $username = '';
 $nombre = '';
 $apellidos = '';
 $contrasena = '';
 $msgs=[];


if(isset($_POST['username'])&&!empty($_POST['username'])){
 $username = $_POST['username'];
}else{
 $msgs[] = "Debe definir un username";
}

if(isset($_POST['nombre'])&&!empty($_POST['nombre'])){
 $nombre = $_POST['nombre'];
}else{
 $msgs[] = "Debe definir un nombre";
}

if(isset($_POST['apellidos'])&&!empty($_POST['apellidos'])){
 $apellidos = $_POST['apellidos'];
}else{
 $msgs[] = "Debe definir unos apellidos";
}


if(isset($_POST['contrasena'])&&!empty($_POST['contrasena'])){
 $contrasena = $_POST['contrasena'];
}else{
 $msgs[] = "Debe definir una contrasena";
}

if(!empty($msgs)){
    header('Location:https://localhost/UD3/Anexo2/nuevoUsuarioFrom.php?msgs='.$msgs);
    exit();
}