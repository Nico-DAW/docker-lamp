<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"]) ?>" method="post">
        Nombre: <input type="text" name="nombre">
        Apellidos: <input type="text" name="apellido">
        <input type="submit" value="Enviar">
        <br>

    <?php 
    $tutti=$_POST["nombre"]." ".$_POST["apellido"];
        echo $tutti."<br>". "Su nombre tiene ".strlen($tutti)." caracteres"."<br>";
        echo "Los 3 primeros caracteres de su nombre son : ". substr($tutti,0,3)."<br>";
        echo "La letra A fuen encontrada en su apellido en la posición : ". strpos($_POST["apellido"],"e"). "<br>";
        echo "Su nombre contiene " . substr_count($tutti, "e"). " caracteres e". "<br>"; 
        echo "Tu nombre en mayusculas es: ". strtoupper($_POST['nombre']). "<br>";
        echo "Su apellido en minúsculas es: ". strtolower($_POST['apellido']). "<br>";
        echo "Su nombre y apellido en mayusculas es: ".strtoupper($tutti). "<br>";
        echo "Tu nombre escrito al revés es: ".strrev($tutti);
    
    ?>
        
    </form>
</body>
</html>