<?php
// Se crea una página para cmabiar el tema... formulario con radio. 
require_once("config.php");
requiereLogin();

if($_SERVER['REQUEST_METHOD']=='POST'){
    if($_POST['tema']=='oscuro'){
        setcookie('tema', $_POST['tema'], time()+360, "/");

        echo "Tema cambiado a ". $_POST['tema']; 
    }elseif($_POST['tema']=='claro'){
        setcookie('tema', $_POST['tema'], time()+360, "/");

        echo "Tema cambiado a ". $_POST['tema'];
    };
    // Actualizamos el valor de $tema que viene de config.php para que el checked del formulario se actualice correctamente
    $tema = $_POST['tema'];
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .etiqueta,.volver{
            font-size:small;
        }

        .claro{
            background: #f5f5f5; 
            color: #333;
        }

        .oscuro{
            background: #333; 
            color: #f5f5f5;
        }

    </style>
</head>
<body class="<?=  $tema ?>">
    <h2>Página para cambiar el tema.</h2>
<!-- Cuando en un formulario no se define la accíon se envía a la misma página-->
    <form method="POST">
        <div class="etiqueta">
        <label>
        <!-- Recordar que $tema = $_COOKIE['tema'] ó '' por config.php -->
         <input type="radio" name="tema" value="claro" <?= $tema == 'claro' ? 'checked' : '';?>>Claro
         </label>
         </div>
         <div class="etiqueta">
         <label> 
         <input type="radio" name="tema" value="oscuro" <?= $tema == 'oscuro' ? 'checked' : '';?>>Oscuro
         </label>
         </div>
         <br>
        <input type="submit" value="Guardar">
    </form>
    <p class="volver"><a href="panel.php">Volver</a></p>
</body>
</html>