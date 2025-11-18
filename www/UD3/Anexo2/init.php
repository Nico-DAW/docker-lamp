<?php 

//mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

function conecta(){
    $servername = "db";
    $username = "root";
    $password = "test";
    $conexion = new mysqli($servername, $username, $password);

    if($conexion->connect_error){
        die("Se ha producido un error al intentar crear la BBDD ".$conexion->connect_error);
    }

    return $conexion; 
}

/*

Para poder utilizar excepciones en Mysqli es necesario habilitarlas:
Si no se activan de la siguiente manera->
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

entonces try/catch NO funciona, porque las funciones de MySQLi no lanzan excepciones por defecto.

La activación se realizará al inicio del script -> <?php ya que se activarán las excepciones del forma global. 

*/

function creaDB(){
    $conexion = conecta(); 
    $sql = "CREATE DATABASE IF NOT EXISTS tareas";
    try{
        $conexion->query($sql);
        //$conexion->set_charset("utf8mb4");
        $conexion->select_db("tareas");
        echo "Base de datos creada correctamente";
    }catch(mysqli_sql_exception $e){
        echo "Error: ".$e->getMessage();
    }finally{
        if (isset($conexion)){
            $conexion->close();
        }
    }
}