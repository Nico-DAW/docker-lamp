<?php

function conectaDB(){
    $servername ='db';
    $user = 'root';
    $pass = 'test';
    $conexion =  new mysqli($servername, $user, $pass);
    return $conexion;
}; 

function creaDB(){
    $conexion = conectaDB();
    if($conexion->connect_error){
        return [false, "Se ha producido un error al intentar conectarse al servidor"];
    }
    try{
        
        $sql = "CREATE DATABASE IF NOT EXISTS tareas;";
        $stmt = $conexion->prepare($sql);
        return [true, "Se ha creado la BBDD correctamente". $stmt->execute()];
    }catch(mysqli_exception $e){
        return [false, "Se ha producido un error al intentar crear la BBDD ".$e];
    }

}; 
