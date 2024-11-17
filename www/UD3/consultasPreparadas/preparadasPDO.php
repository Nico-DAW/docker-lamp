<?php
$servername = 'db';
$dbname = 'myDBop';
$username = 'root';
$userpass = 'test';

try{
$conexion = new PDO("mysql:host=$servername;dbname=$dbname",$username,$userpass);
// Forzamos excepciones
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// Si llegamos aquí es que la conexión se ha realizado.
echo "La conexion se ha realizado con exito.<br>";

//Creamos la consulta preparada 
$stmt = $conexion->prepare("INSERT INTO Clientes (nombre, apellido,email) VALUES (:nombre,:apellido, :email);");

/* A diferencia de mysqli tenemos que definir los bind_param() uno a uno... En el caso de PDO bindParam() 
no va separado y tiene 2 argumentos separados por coma... y los bind van entre comillas simples*/
$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':apellido', $apellido);
$stmt->bindParam(':email', $email);

//Una vez definidos

$nombre ="Juan";
$apellido ="López";    
$email = "juan@edu.com";
$stmt->execute();

$nombre ="Ayla";
$apellido ="Pérez";
$email = "ayla@edu.com";
$stmt->execute();

// Cerrar el cursor, en este caso no es close() sino closeCursor()
$stmt->closeCursor();

echo "Los datos fueron insertados <br>";

//Cerramos la conexion... Recordar que en PDO hay que igualar a null para cerra

//!!!MAL --> $conexion->close();
$conexion = null; 

echo "Se ha cerrado la conexion.<br>";

}catch(PDOException $e){

    echo "Se ha producido un error durante el proceso".$e->getMessage();
}
?>