<?php 
session_start(); 

function compruebaLogin($user,$password){
    if($user=="usuario1" && $password=="1234.."){
        $_SESSION['usuario'] = "usuario1";
        $_SESSION['rol'] = "usuario";
         return true;
    }elseif($user=="admin" && $password=="1234.abc"){
        $_SESSION['usuario'] = "admin";
        $_SESSION['rol'] = "admin";
         return true;
    }else{
        echo "Se ha producido un error en la validación";
        return false;
    }
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $usuario = $_POST['usuario'];
    $pass = $_POST['password'];

    if(compruebaLogin($usuario, $pass)){
        header("Location:index.php");
    };
    
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?> method="POST">
        <label for="usuario">Usuario: </label>
        <input type="text" name="usuario"> <br>
        <label for="password">Password: </label>
        <input type="text" name="password"> <br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>