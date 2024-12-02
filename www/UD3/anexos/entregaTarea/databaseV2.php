<?php
//Creamos una función que devuelve una conexión a una BBDD en función de los argumentos. 
function conecta($host,$user,$pass,$db){
    $conexion = new mysqli($host, $user, $pass, $db); 
    return $conexion;
}

function createDB(){
$conexion = conecta('db', 'root', 'test', null);                    
$error = $conexion->connect_errno;
$checkMsg = "";
    if($error!=null){
        return [false, "<p class=\"alert alert-danger\" role=\"alert\">Se ha producido un error en la conexion. Error con número. ".$error."</p><br>"];
    }else{
        $checkMsg +="<p class=\"alert alert-success\" role=\"alert\">La conexión a la BBDD se ha realizado con exito. </p>";
        try{
            $sqldb = "CREATE DATABASE IF NOT EXISTS tareas";
            if($conexion->query($sqldb)){
                return "<p class=\"alert alert-success\" role=\"alert\">Se ha creando la BBDD tareas correctamente. </p>";
            $conexion->select_db("tareas");
            $sqltu = "CREATE TABLE IF NOT EXISTS usuarios(
                    id INT(6) AUTO_INCREMENT PRIMARY KEY,
                    nombre VARCHAR(20) NOT NULL,
                    apellidos VARCHAR(40) NOT NULL,
                    username VARCHAR(30)NOT NULL
                    );";
            if($conexion->query($sqltu)){
                return "<p class=\"alert alert-success\" role=\"alert\">Se ha creando la tabla usuarios correctamente. </p>";
                }else{
                    return "<p class=\"alert alert-danger\" role=\"alert\">Error creando la tabla usuarios.".$conexion->error."</p><br>";
                }
            }else{
                return "<p class=\"alert alert-danger\" role=\"alert\">Error creando la BBDD.".$conexion->error."</p><br>";
                }
        }catch(mysqli_sql_exception $e){
            return "<p class=\"alert alert-danger\" role=\"alert\">Se ha producido un error al intentar crear la BBDD: ".$e->getMessage()."</p><br>"; 
        }

}
}
?>