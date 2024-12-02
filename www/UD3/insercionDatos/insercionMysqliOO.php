<?php
//Suposem que la BBDD esta creada
$servername = 'db';
$username = 'root';
$userpass = 'test';
$dbname = 'myDBoo';

$conexion = new mysqli($servername,$username,$userpass,$dbname);
$error = $conexion->connect_errno;

if($error!=null){
    die("Se ha producido un error al intentar establecer la conexion con la BBDD. " .$conexion->connect_error. " Error con número ".$error);
}

echo "Se ha establecido la conexion correctamente<br>";
/*Almacenamos la consulta en una variable --> Aqui en las consultas poder comillas dobles.
Recordar que al haber creado el id con AUTO_INCREMENT no se detalla le da valor automáticamente.
*/
$sql = "INSERT INTO Clientes (nombre,apellido,email) VALUES ('Pepe','Garcia','pepe@daw.gal');";
//Y ejecutamos comprobando con if
if($conexion->query($sql)){
    echo "La iniserción de datos se ha realizado con éxito<br>";
}

$conexion->close();
echo "Se ha cerrado la conexion.";

/* Recordar también que la manera de trabajar con BBDD es con try/catch para tratar posibles excepciones
en este caso la excepciona a capturar sería mysqli_sql_exception $e...
*/

?>