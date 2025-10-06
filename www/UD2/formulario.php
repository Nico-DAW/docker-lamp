<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        Nombre: <input type="text" name="nombre"></br>
        Correo: <input type="email" name="correo"></br>
        Género: <input type="radio" name="genero" value="Hombre">Hombre 
        <input type="radio" name="genero" value="Mujer">Mujer
        <input type="radio" name="genero" value="Otro">Otro
        <input type="submit" value="enviar">
    </form>
<?php include_once "controlador.php"; ?>
<?php echo $nombre."; </br>"?>
<?php echo $correo ."; </br>"?>
<?php echo $genero ."; </br>"?>
</body>
</html>