<?php 
$servername = 'db';
$bbdd = 'myDBop';
$username = 'root';
$userpass = 'test';
try{
$conexion = new PDO("mysql:host=$servername; dbname=$bbdd",$username,$userpass);
$stmt = $conexion->prepare("UPDATE Clientes SET apellido='Bananas' WHERE apellido='Jimenez'");
$stmt->execute();
echo "Se ha realizado la actualización con éxito<br>";
}catch(PDOException $e){
    echo "Se ha producido un error en la conexion<br>".$e->getMessage();
}finally{
    $conexion=null;
    echo "Se ha cerrado la conexion";
}
?>