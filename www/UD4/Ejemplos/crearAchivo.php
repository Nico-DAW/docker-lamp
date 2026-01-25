<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    /* 
    Para crear un archivo se hace con fopen($archivo, "w") hay que tener en cuenta que w trunca el fichero... con lo que si tiene información
    la va a borrar. Vemos un ejemplo
    */

    $archivo = fopen("Ejemplo.txt","w");
    // Aquí el archivo Ejemplo.txt no existe icialmente por lo que se crea. 
    ?>
</body>
</html>