<?php 
require_once('utils.php');
require_once('modelo/pdo.php');

  $user = $_POST['username'];
  $pass = $_POST['pass'];

  $user = filtraCampo($user);
  $pass = filtraCampo($pass);

  $error='';
  $success='';

if(empty($user)||empty($pass)){
    $error = "Debe ingresar los dos campos";
    header("Location:login.php?error=".urlencode($error));
    exit();
}

if($_SERVER['REQUEST_METHOD']=='POST'){
  $userLogin = buscaUser($user,$pass);
  if($userLogin){
    $success = "Login realizado correctamente";
    $_SESSION['username'] = $user;
    $_SESSION['rol'] = $userLogin['rol'];
    header("Location:index.php?success=".urlencode($success));
    exit();
  }else{
    $error = "Credenciales incorrectas";
    header("Location:login.php?error=".urlencode($error));
    exit();
  }
}

/*
$usuario = buscaUser($user, $pass);
var_dump($usuario);
*/
?>