<?php 
$servername = "db";
$username = "root";
$userpass = "test";
$dbname = "myDBop";
try{
$conexion = new PDO("mysql:host=$servername;dbname=$dbname",$username,$userpass);
// Forzamos excepciones
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexion establecida con éxito<br>";
// Almacenamos la consulta en una variable 
$sql = "INSERT INTO Clientes (nombre, apellido, email) VALUES ('Maria','Benedicta','benedicta@daw.gal')"; 
$conexion->exec($sql);
echo "Se han insertado los valores<br>";
}catch(PDOException $e){
    echo "Se ha producido un error".$e->getMessage(); 
}
?>