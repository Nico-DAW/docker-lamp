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
            <li>$target_dir="uploads/";</li>
            <li>$target_file=$target_dir.basename($_FILES["fileToUpload"]['name'])</li>
            <li>!file_exists($target_file)</li>
            <li>move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file)</li>
            <li>$fileType=strtolower(pathinfo($target_file,PATHINFO_EXTENSION))</li>
            <li>recordar también que la carpeta de subida tiene que tener permisos de escritura chmod 777 ruta desde terminal</li>
        </ul>
    </p>
</body>
</html>