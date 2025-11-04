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

function crea_tabla_usuarios($conexion){
    $sql="
CREATE TABLE IF NOT EXISTS usuarios(
    id INT AUTO_INCREMENT PRIMARY KEY, 
    nombre VARCHAR(50) NOT NULL,
    apellidos VARCHAR(100) NOT NULL,
    edad INT NOT NULL, 
    provincia VARCHAR(50) NOT NULL
);";
    //$conexion->query($sql);
    /* No haría falta devolver algo pero en este caso es una buena práctica 
    porque devolviendo algo podemos comprobar si se ha creado o no la tabla... 
    Si no devolvemos algo no lo podremos comprobar => */
    ejecuta($conexion, $sql);
}

function guarda($arrValues){
    $conexion=conecta();
    selecciona_db($conexion,'tienda');
    $stmt=$conexion->prepare("INSERT INTO usuarios(nombre,apellidos,edad,provincia)VALUES(?,?,?,?);");
    $stmt->bind_param('ssis',$arrValues[0],$arrValues[1],$arrValues[2],$arrValues[3]);
    $stmt->execute();

    $mensaje="Se ha registrado el usuario en la BBDD"; 

    $stmt->close();
    $conexion->close();

    return $mensaje;
}

?>