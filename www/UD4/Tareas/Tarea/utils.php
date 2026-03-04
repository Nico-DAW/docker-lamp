<?php
session_start();

function filtraCampo($campo)
{
    $campo = trim($campo);
    $campo = stripslashes($campo);
    $campo = htmlspecialchars($campo);
    return $campo;
}

function validarCampoTexto($campo)
{
    return (!empty(filtraCampo($campo) && validarLargoCampo($campo, 2)));
}

function validarLargoCampo($campo, $longitud)
{
    return (strlen(trim($campo)) > $longitud);
}

function esNumeroValido($campo)
{
    return (!empty(filtraCampo($campo) && is_numeric($campo)));
}

function esRolValido($campo)
{   
    //Cuidado aquí Amego!!! empty(0) y empty('0') devuelven true.... 
    $campo=filtraCampo($campo);
    return in_array($campo, ['0','1'], true);
}


function validaContrasena($campo)
{
    return (!empty($campo) && validarLargoCampo($campo, 7));
}

function requiereLogin(){
    if(!isset($_SESSION['username'])){
        //Si... Amego... cuidado con las rutas... 
        header("Location:/UD4/Tareas/Tarea/login.php?error=".urlencode("Es necesario login."));
        exit();
    }
}

// Como utils lo requerimos en todas las vistas... podemos implementar la cookie aquí:

$tema = $_COOKIE['tema']??'claro'; 

if($_SERVER['REQUEST_METHOD']=='POST'&&isset($_POST['tema'])){
    $tema = $_POST['tema'];
    setcookie('tema',$tema,time()+360,"/");
}

//$tema = $_SESSION['tema'];