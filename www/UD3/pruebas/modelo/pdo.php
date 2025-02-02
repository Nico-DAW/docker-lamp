<?php
function conecta(){
    $conexion= new PDO("mysql:host=db",'root','test');
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conexion;
}

function creaDB($name){
    try{
        $conexion = conecta();

        //Podemos hacerlo así o con stmt->bindParam(':nombre',$name);
        $sql="SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME='$name'";
        $stmt=$conexion->prepare($sql);
        //$resultados=$stmt->execute();
        //A ver execute() devuelve true o false... pero así no vamos a saber si devulve filas...
        //echo "Debug!";
        /*
        if($resultados){
            echo "La base de datos ya existe!";
        }else{
            echo "Debug!";
        }
        */
        $stmt->execute();
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //var_dump($resultados);
        if(!empty($resultados)){
            echo "La base de datos ya existe!<br>";
        }else{
            //echo "Debug!";
            //Crea la BBDD
        $sqlCrea = "CREATE DATABASE `$name`";
        $stmtCrea = $conexion->prepare($sqlCrea);
        $stmtCrea->execute();
        /*
        if($stmtCrea){
            echo "Se ha creado la BBDD";
        }*/
        //El if de arriba es redundante porque sino se crea se lanza una excepción
        echo "Se ha creado la BBDD";
        }
        //Sería mejor return true o false en vez de un echo
    }catch(PDOException $e){
        return $e->getMessage();
    }finally{
        $conexion = null; 
    }
    
}

function creaTabla(){
    try{
        $conexion = conecta();
        $conexion->exec("USE pruebas");
        $sql = "SHOW TABLES LIKE 'usuarioPruebas'";
        $stmt=$conexion->prepare($sql);
        $stmt->execute();

        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //Debug - return $resultados;
        if(empty($resultados)){
            $creaSql="CREATE TABLE IF NOT EXISTS usuarios(
            id INT AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(20),
            pass VARCHAR(15),
            fecha DATE, 
            color VARCHAR(8),
            fruta VARCHAR(8),
            vehiculo1 VARCHAR(8),
            vehiculo2 VARCHAR(8),
            vehiculo3 VARCHAR(8)
            );";

            $stmtTabla=$conexion->prepare($creaSql);
            $stmtTabla->execute();

            return true;
        }
    }catch(PDOException $e){
        return $e->getMessage();
    }finally{
        $conexion=null;
    }
}

/*Una manera de hacerlo -->

function nuevoUser($nombre,$pass,$fecha,$color,$fruit,$vehiculo1,$vehiculo2,$vehiculo3){
    try{
        $conexion =conecta();
        $conexion->exec("USE pruebas");

        $sql="INSERT INTO usuarios(nombre,pass,fecha,color,fruta,vehiculo1,vehiculo2,vehiculo3) VALUES (:nombre, :pass, :fecha, :color, :fruit, :vehiculo1, :vehiculo2, :vehiculo3)";

        $stmt=$conexion->prepare($sql);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':pass', $pass, PDO::PARAM_STR);
        $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
        $stmt->bindParam(':color', $color, PDO::PARAM_STR);
        $stmt->bindParam(':fruit', $fruit, PDO::PARAM_STR);
        $vehiculo1=$vehiculo1??NULL;
        $vehiculo2=$vehiculo2??NULL;
        $vehiculo3=$vehiculo3??NULL;

        $stmt->bindParam(':vehiculo1', $vehiculo1, PDO::PARAM_STR);
        $stmt->bindParam(':vehiculo2', $vehiculo2, PDO::PARAM_STR);
        $stmt->bindParam(':vehiculo3', $vehiculo3, PDO::PARAM_STR);

        $stmt->execute(); 
        return true;
    }catch(PDOException $e){

        return $e->getMessage();
    }finally{
        $conexion=null;
    }
    
}
    
*/

//En este caso no se incluye un NULL autentico sino campo vacio
/*
function nuevoUser($nombre,$pass,$fecha,$color,$fruit,$vehiculo1,$vehiculo2,$vehiculo3){
    try{
        $conexion =conecta();
        $conexion->exec("USE pruebas");

        $sql="INSERT INTO usuarios(nombre,pass,fecha,color,fruta,vehiculo1,vehiculo2,vehiculo3) VALUES ('$nombre','$pass','$fecha','$color','$fruit','$vehiculo1','$vehiculo2','$vehiculo3')";
        
        $conexion->exec($sql);
  
        return true;
    }catch(PDOException $e){

        return $e->getMessage();
    }finally{
        $conexion=null;
    }
    
}
*/

//Prueba sin que la consulta sql sea referenciada. 

function nuevoUser($nombre,$pass,$fecha,$color,$fruit,$vehiculo1,$vehiculo2,$vehiculo3){
    try{
        $conexion =conecta();
        $conexion->exec("USE pruebas");


        
        $conexion->exec("INSERT INTO usuarios(nombre,pass,fecha,color,fruta,vehiculo1,vehiculo2,vehiculo3) VALUES ('$nombre','$pass','$fecha','$color','$fruit','$vehiculo1','$vehiculo2','$vehiculo3')");
  
        return true;
    }catch(PDOException $e){

        return $e->getMessage();
    }finally{
        $conexion=null;
    }
    
}

?>