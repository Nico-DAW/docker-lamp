<?php 
session_start();
if(isset($_SESSION['email'])){
 header("Location:index.php");
 exit();
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
    <h2>Login de usuario BBDD: </h2>
    <form action="log.php" method="POST">
        <label for="email">Email: </label>
        <input type="email" name="correo"><br>
        <label for="password">Contraseña: </label>
        <input type="password" name="pass"><br>
        <input type="submit" value="Enviar">
    </form>
</body>
</html>