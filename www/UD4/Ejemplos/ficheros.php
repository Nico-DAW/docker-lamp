<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php 
/* Dos formas de creat archivos en Linux con cat >> nombreArchivo.txt 
O también con touch nombreArchivo.txt 
A la hora de crearlo se crea en este caso en la carpeta raiz (Si abrimos el terminal es la carpeta en la que nos encontramos.)
*/
/* 
Primer ejemplo con readfile(); 
echo readfile("lenguajes.txt");
*/

$archivo = fopen("lenguajes.txt", "r") or die("Unable to open file");
echo fread($archivo,filesize("lenguajes.txt"));
fclose($archivo);

/*
Otra función que se puede utilizar es un fgets() o fgetc() en el primer caso devuelve una linea y en el segundo un caracter. 
Si se combina con un while y feof() podemos leer todo un archivo while(!feof($archivo)){fgets($archivo);}

dentro de feof, fgets... va un fopen() --> $archivo

REcordar fopen() or die()
*/
?>
    
</body>
</html>