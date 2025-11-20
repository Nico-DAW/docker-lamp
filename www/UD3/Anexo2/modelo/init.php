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
    $error = false; 
    if($conexion->connect_error){
        /* 
        Aqui no matamos el proceso (die) devolvemos un array con 2 valores (true/false y un mensaje).
        die("Se ha producido un error al intentar conectarse a la BBDD ".$conexion->connect_error);
        */
        $error = true;
        return [false, $conexion->connect_error, $error];
    }else{
        /*
        En el enunciado se pide que se compruebe si la BD datos existe, para realizar esta comprbación es 
        necesario realizar una consulta -> $sqlCheck = "SELECT ..."
        */
        $sqlCheck = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME='tareas'";
        $check = $conexion->query($sqlCheck);
        if($check&&$check->num_rows>0){
            return [false, "La BBDD no se ha creado porque ya existía", $error];
        }else{
        $sql = "CREATE DATABASE IF NOT EXISTS tareas";

        $conexion->query($sql);
        /*
        Aquí $conexion->query($sql);
        Puede devolver true, false o un mysqli_result (conjunto de valores)
        En cualquier caso no detiene la ejecución del script. 
        */
        //$conexion->set_charset("utf8mb4");
        $conexion->select_db("tareas");
        /*
        $conexion->select_db("tareas");
        devuelve true si existe la BD y false en caso contrario.
        */
        return[true,"Base de datos creada correctamente", $error];
        }
        }
    }catch(mysqli_sql_exception $e){
        $error = true;
        return[false, "Error: ".$e->getMessage(), $error];
    }finally{
        if (isset($conexion)&&$conexion->errno!=0){
            $conexion->close();
        }
    }
}

function creaTareas(){
    $conexion = conecta();
    $conexion->select_db("tareas");
    if(!$conexion->connect_error){
        $sql = "SHOW TABLES LIKE 'tareas';";
        if($conexion->query($sql)){
            $sqlTareas = "CREATE TABLE IF NOT EXISTS tareas(
            id INT AUTO_INCREMENT PRIMARY KEY,
            titulo VARCHAR(50), 
            descripcion VARCHAR(250),
            estado VARCHAR(50), 
            id_usuario INT
            );";
            return [true, $conexion->query($sqlTareas)];
        }else{
            return [false, $conexion->connect_error];
        }
    }
}