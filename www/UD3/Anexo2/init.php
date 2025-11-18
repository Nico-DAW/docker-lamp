<?php 

//mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

function conecta(){
    $servername = "db";
    $username = "root";
    $password = "test";
    $conexion = new mysqli($servername, $username, $password);
    /*
        if($conexion->connect_error){
            die("Se ha producido un error al intentar crear la BBDD ".$conexion->connect_error);
        }

        --> Una observación aquí - new mysqli(...) devuelve un objeto mysqli. Se haga efectiva o no, es decir si la conexión es erronea o no, 
        se va a devolver un objeto mysqli. Si la conexion es erronea no se interrumpe la ejecución del script. Se va a devolver un objeto mysqli
        con información de error ($conn->connect_error o $conn->connect_errno). 
    */
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
    try{
    //Hacemos aqui la comprobación de si la conexión es erróneo o no:   
    $conexion = conecta(); 
    if($conexion->connect_error){
        /* 
        Aqui no matamos el proceso (die) devolvemos un array con 2 valores (false y un mensaje).
        die("Se ha producido un error al intentar conectarse a la BBDD ".$conexion->connect_error);
        */
        return [false, $conexion->connect_error]
    }else{
    $sql = "CREATE DATABASE IF NOT EXISTS tareas";

        $conexion->query($sql);
        //$conexion->set_charset("utf8mb4");
        $conexion->select_db("tareas");
        echo "Base de datos creada correctamente";
        }
    }catch(mysqli_sql_exception $e){
        echo "Error: ".$e->getMessage();
    }finally{
        if (isset($conexion)){
            $conexion->close();
        }
    }
}