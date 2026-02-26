<?php
/* 
Cuidado aquí con isset() pasará ya que las varibles existen aunque esten vacias... 
la comprobación debe hacerse con empty().
MAL =>
if($_SERVER['REQUEST_METHOD']=='POST' && isset($_POST['nombre']) && isset($_POST['pass'])){ 
*/

require_once("config.php");

if($_SERVER['REQUEST_METHOD']=='POST' && !empty($_POST['nombre']) && !empty($_POST['pass'])){
    // echo "Bananas!";
    foreach($usuarios as $key=>$value){
        //if($key==$_POST['nombre']&&$value['clave']==$_POST['pass']){
        //echo $key;
        if($key==$_POST['nombre']&&$value['clave']==$_POST['pass']){
            $_SESSION['nombre']=$_POST['nombre'];
            $_SESSION['pass']=$_POST['pass'];
            $_SESSION['rol']=$value['rol'];
            //var_dump($value);

            $success = "Login realizado correctamente"; 
            header("Location:panel.php?success=".urlencode($success));
            exit();
        }
    };
    $error = "Error de Login";
    header("Location:login.php?error=".urlencode($error));
    exit();

}else{
    $error = "Debe definir un nombre y una contraseña"; 
    header("Location:login.php?error=".$error);
    exit();
}
?>