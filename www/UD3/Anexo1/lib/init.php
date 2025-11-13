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

function selecciona_db($conexion,$db){
    $sql="USE ".$db;
    ejecuta($conexion, $sql);
}

function createDonantes($conexion){
    $sql="CREATE TABLE IF NOT EXISTS donantes(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(20) NOT NULL, 
    apellidos VARCHAR(20) NOT NULL, 
    edad INT(3) NOT NULL, 
    grupo VARCHAR(3) NOT NULL, 
    cp INT(5) NOT NULL,
    movil INT(9) NOT NULL
    );";

    ejecuta($conexion, $sql);
}

/* 
En los CONSTRAINTS las columnas van entre paréntesis. 
Convención para nonmbrar CONSTRAINTS ->
<tabla>_<columna>_<tipo>
*/

function createHistorico($conexion){
    $sql="CREATE TABLE IF NOT EXISTS historico(
    donante INT PRIMARY KEY, 
    fecha DATE NOT NULL,
    fechaNext DATE NOT NULL,
    CONSTRAINT his_don_fk FOREIGN KEY (donante) REFERENCES donantes(id) ON DELETE CASCADE
    )";

    ejecuta($conexion, $sql);
}

function createAdmin($conexion){
    $sql="CREATE TABLE IF NOT EXISTS administradores(
    nombre VARCHAR(50) PRIMARY KEY,
    pass VARCHAR(200) NOT NULL
    )";
    
    ejecuta($conexion, $sql);
}

function guardarDonante($conexion, $nombre, $apellidos, $edad, $grupo, $cp, $movil){
    //$sql = ;
    $stmt = $conexion->prepare("INSERT INTO donantes(nombre,apellidos,edad,grupo,cp,movil) VALUES (:nombre,:apellidos,:edad,:grupo,:cp,:movil)");
    $stmt->bindParam(':nombre',$nombre);
    $stmt->bindParam(':apellidos',$apellidos);
    $stmt->bindParam(':edad',$edad,PDO::PARAM_INT);
    $stmt->bindParam(':grupo',$grupo);
    $stmt->bindParam(':cp',$cp,PDO::PARAM_INT);
    $stmt->bindParam(':movil',$movil);

    $stmt->execute();
    $stmt->closeCursor();
}

function listarDonantes($conexion){
    //Estas consultas deberían hacerse dentro de un try/catch  
    $sql = "SELECT id, nombre, apellidos, edad, grupo, cp, movil FROM donantes;";
    $stmt = $conexion->prepare($sql);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    $resultados = $stmt->fetchAll();
    return $resultados;
}

function getFechaNext($conexion, $id){
    $sql = "SELECT FechaNext FROM historico WHERE id=".$id; 
    $stmt = $conexion->prepare($sql);
        $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $resultados = $stmt->fetchAll();
    return $resultados; 
}