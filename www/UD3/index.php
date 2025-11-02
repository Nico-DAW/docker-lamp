<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Anexo 1!</h2>
    <?php include_once("lib/db.php"); 
        $conexion = conecta();
        $crea = crea_db($conexion, "tienda");
    ?>
</body>
</html>