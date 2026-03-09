<?php 
/* 
Hasta ahora las conexiones a las BBDD se han venido haciendo 
de la siguiente manera o similar. 
*/

function conPDO(){
    try{
        $servername = "db";
        $user = "root";
        $password = "test"; 

        $conPDO = new PDO("mysql:host=".$servername, $user, $password);
        $conPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conPDO;

    }catch(PDOException $e){
        echo "Se ha producido un error al intentar conectarse a la BBDD ".$e->getMessage();
    }
}

function creaDB(){
    try{
         $conPDO = conPDO();   
        // Una vez creada la conexión sino surgen errores (EXCEPCIONES) se podría crear una BBDD.
        $dbname = "repaso";
        // Cuidado aquí con el espacio.
        $sql = "CREATE DATABASE IF NOT EXISTS ".$dbname;

        $conPDO->exec($sql);
    }catch(Exception $e){
        echo "Se ha producido un error al intentar crear la BBDD ".$e->getMessage();
    }
}