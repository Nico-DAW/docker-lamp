<?php

function conPDO(){
        $servername = 'db';
        $dbname = 'tareas';
        $username = 'root';
        $password = 'test';
        $conexion = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
}

function listaUsuarios(){
    try{
        $conexion = conPDO();
        $sql = "SELECT id,username,nombre,apellidos,contrasena FROM usuarios;";
        $stmt = $conexion->prepare($sql);
        //$resultados = $stmt->execute();
        $stmt->execute();
        //$resultados->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        //$devuelve = $resultados->fetchAll();
        $resultados = $stmt->fetchAll();
        /*
        if(empty($resultados)){
            return [false, ];
        }
        */
        return [true, $resultados];

    }catch(PDOException $e){
        return [false, "Se ha producido un error al intentar listar los usuarios ".$e->getMessage()];
    }
   
}