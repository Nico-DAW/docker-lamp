<?php 

function conecta(){
 $servername = 'db';
 $username = 'root';
 $pass = 'test';
 try{
    $conexion = new PDO("mysql:host=$servername; dbname=dbname",$username, $pass);
    // Una vez crea da la conexión se fuerzan las excepciones
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conexion;
 }catch(PDOException $e){
    echo "Se ha producido un error al intentar conectarse a la BBDD".$e->getMessage();
 }
}

/* 
function ejecuta($conexion, $sql){
    try {
        $resultado = $conexion->exec($sql);
        // $resultado puede ser un número (filas afectadas) o 0 (sino afecta a ninguna fila)
        return $resultado; 
    } catch (PDOException $e) {
        echo "Se ha producido un error al intentar ejecutar la consulta: " . $e->getMessage();
        return false; // devuelve false si hay un error
    }
}
*/

function ejecuta($conexion, $sql){
    try{
        $conexion->exec($sql);
    }catch(PDOException $e){
        echo "Se ha producido un error al intentar ejecutar la consulta".$e->getMessage();
    }
}

function create_db($conexion){
    $sql = "CREATE DATABASE IF NOT EXISTS donacion;";
    ejecuta($conexion, $sql);
}

//26:29
