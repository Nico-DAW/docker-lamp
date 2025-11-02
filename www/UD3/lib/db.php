<?php 

/* Pruebas

$conexion = new mysqli("db", "root", "test");

$sql="CREATE DATABASE IF NOT EXISTS tienda;";

if($conexion->query($sql)){
    echo "Se ha creado la BBDD correctamente";
}else{
    echo "Se ha producido un error al crear la BBDD ".$conexion->error; 
}

//Acordarse de cerrar las conexiones - En mysqli con close() y en PDO con null

$conexion->close();

*/

function conecta(){

    $conexion = new mysqli('db', 'root', 'test');
    if($conexion->connect_errno != null){
        die("Se ha producido un error al intentar establecer la consexión con la BBDD".$connect_error);
    }else{
        return $conexion;
    }
}

function ejecuta($conexion, $sql){
    $resultado = $conexion->query($sql);
    if(!$resultado){
        die("Se ha producido un error al intentar ejecutar la query ".$conexion->error);
    }
    return $resultado;
}

function crea_db($conexion,$db){
    $sql='CREATE DATABASE IF NOT EXISTS '.$db.';';
    ejecuta($conexion,$sql);
}

function selecciona_db($conexion, $db){
    // Aqui no es necesario añadir return
    $conexion->select_db($db);
}

?>