<?php
$servername = 'db';
$username = 'root';
$userpass = 'test';
try{
$conexion = new PDO("mysql:host=$servername",$username,$userpass);
//Forzamos las excepciones
$conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
echo "La conexión se ha realizado con exito<br>"; 
$sql = 'CREATE DATABASE myDBop';
// La conexion también se puede crear en vez de con if de la siguiente manera --> exec() porque no devuelve resultados
    $conexion->exec($sql);
// !!!Ojo   En PDO se ejecuta con exec no se hace el if...
/*
if($conexion->query($sql)){
        echo "La BBDD se ha creado con éxito<br>";
    }
*/
}catch(PDOException $e){
    echo "Se he producido un error al intentar crear la BBDD".$e->getMessage();
}finally {
    //4. Cerrar la conexión
    $conn = null;
    echo 'Conexión cerrada';
}
?>