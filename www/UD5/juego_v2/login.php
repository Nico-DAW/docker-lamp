<?php 
require_once("config/utils.php");
//compruebaSesion();
if(isset($_SESSION['username'])){
   header("Location:index.php?mensaje=".urlencode("Usuario logueado correctamente."));
   exit();
}
/* 
Más limpio y compresible que en la primera version.
*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD5-Juego</title>
    <style>
        .centra{
            display:flex;
            justify-content: center;
            align-items: center;
        }

        .card{
            width: 250px;
            border-radius: 10px;
            border: 1px solid;
            text-align: center;
            padding:10px;
        }

        input[type=submit]{
            margin: 20px;
        }

    </style>
</head>
<body>
    <div class="centra">
        <div class="card">
            <h2>Login</h2>
            <form action="loginAuth.php" method="POST">
                <div>
                <label for="username">Username</label>
                <input type="text" name="username" id="username"/>
                </div>
                <div>
                <label for="pass">Password</label>
                <input type="text" name="pass" id="pass"/>
                </div>
                <input type="submit" value="Enviar"/>
            </form>
        </div>
    </div>
</body>
</html>