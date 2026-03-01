<?php 
require_once("config.php");
requiereAdmin();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body class="<?=  $tema ?>">
    <h2>Esto ya lo hemos visto un par de veces... </h2>
    <p>Ver <a href="../../Ejemplos/subirFile.php">subirarchivo.php</a></p>
    <p>Recordar aquí:
        <ul>
            <li>is_dir()</li>
            <li>mkdir()</li>
            <li>file_exists($target_file)</li>
        </ul>
    </p>
</body>
</html>