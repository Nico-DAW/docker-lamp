<?php
$servername = "db";
$username = "root";
$userpass = "test";

$dbname = "myDBop";
try{
$conexion = new PDO("mysql:host=$servername;dbname=$dbname",$username,$userpass);
//Forzamos la excepciones
$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
echo "La conexión se ha realizado con éxito<br>"; 
//Una vez creada la conexión, creamos la query--> 
$sql = 'CREATE TABLE Clientes(
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nombre VARCHAR(30) NOT NULL,
apellido VARCHAR(30) NOT NULL,
email VARCHAR(50)
)';
$conexion->exec($sql);
echo "Se ha creado la tabla correctamente<br>";
}catch(PDOException $e){
    echo "Se ha producido un error en el proceso".$e->getMessage();
}finally{
    $conexion=null;
    echo "Se ha cerrado la conexion";
}
?>