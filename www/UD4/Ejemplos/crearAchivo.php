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

     $archivo = fopen("Ejemplo.txt","w") or die("Unable to open file");
    /* Aquí el archivo Ejemplo.txt no existe icialmente por lo que se crea. 
    La carpeta en la que se vaya a crear el archivo tiene que tener permisos de escritura -->$ sudo chmod 777 Ejemplos
    Ahora podriamos escribir información en el archivo con fwrite() --> 
    */
    fwrite($archivo, "Sabela\nJuan");
    fclose($archivo);
    /* El caracter de escape aquí es /n para generar el espacio
    En el caso de volver a hace un fwrite --> por ejemplo fwrite($archivo, "Alvaro\nMaria");
    Se caragaría la información anterior. Para añadir información a un archivo empleamos a en fopen("Ejemplo.txt","a")
    */
    
    $archivo = fopen("Ejemplo.txt","w") or die("Unable to open file");
    fwrite($archivo, "Alvaro\nMaria");
    fclose($archivo);
    ?>
    <h2>Hello!</h2>
</body>
</html>