<?php
/* 
//Creación de la BBDD
$servername = 'db';
$username = 'root';
$userpass = 'test';
try{
$conexion=new PDO("mysql:host=$servername", $username, $userpass);
//Forzamos las excepciones
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "CREATE DATABASE myDBoo;";
$conexion->query($sql);
echo "Se ha creado la BBDD<br>";
}catch(PDOException $e){
    echo "Se ha producido un error".$e->getMessage();
}finally{
    echo "Se cierra la conexion"; 
    $conexion=null; 
}
*/
/*
//Creción de tabla
$servername = 'db';
$username = 'root';
$userpass = 'test';
$dbname= 'myDBoo'; 

try{
$conexion=new PDO("mysql:host=$servername;dbname=$dbname", $username, $userpass);
//Forzamos las excepciones
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$sql = "CREATE TABLE Clientes(
id int(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nombre varchar(20) NOT NULL,
apellidos varchar(20) NOT NULL,
email varchar(20)
)";

$conexion->query($sql);
echo "Se ha creado la tabla<br>";
}catch(PDOException $e){
    echo "Se ha producido un error".$e->getMessage();
}finally{
    echo "Se cierra la conexion"; 
    $conexion=null; 
}
*/
/*
// Inserción de datos


$servername = 'db';
$username = 'root';
$userpass = 'test';
$dbname= 'myDBoo'; 

try{
$conexion=new PDO("mysql:host=$servername;dbname=$dbname", $username, $userpass);
//Forzamos las excepciones
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt =$conexion->prepare("INSERT INTO Clientes (nombre, apellidos, email) VALUES (:nombre, :apellidos, :email)");

$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':apellidos', $apellidos);
$stmt->bindParam(':email', $email);

$nombre = 'Juan';
$apellidos = 'Perez';
$email = 'juan@xunta.gal';
$stmt->execute();

$nombre = 'Pedro';
$apellidos = 'Garcia';
$email = 'pedro@xunta.gal';
$stmt->execute();

$nombre = 'Maria';
$apellidos = 'Lopez';
$email = 'maria@xunta.gal';
$stmt->execute();

echo "Se han insertado los datos en la tabla<br>";
$stmt->closeCursor(); 
echo "Se ha cerrado la inserción<br>";

}catch(PDOException $e){
    echo "Se ha producido un error".$e->getMessage();
}finally{
    echo "Se cierra la conexion"; 
    $conexion=null; 
}
*/
//Selección de datos
$servername = 'db';
$username = 'root';
$userpass = 'test';
$bbddname= 'myDBoo';
try{
$conexion=new PDO("mysql:host=$servername;db=$bbddname", $username, $userpass);
//Forzamos las excepciones
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $conexion->prepare('SELECT * from Clientes WHERE apellidos=:apellidos');
$stmt->setFetchMode(PDO::FETCH_ASSOC);
echo "Se ha establecido la conexión.<br>";

$stmt->execute(array('apellidos'=>'Lopez'));
echo "Bananas!<br>";
while($row = $stmt->fetch()){
    echo "El nombre es: ".$row['nombre']."Apellido: ".$row['apellido']."Email: ".$row['email'] ;
}

}catch(PDOException $e){
    echo "Se ha producido un error".$e->getMessage();
}finally{
    echo "Se cierra la conexion"; 
    $conexion=null; 
}

 

?>