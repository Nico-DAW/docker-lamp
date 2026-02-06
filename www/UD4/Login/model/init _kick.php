<?php 

function conPDO(){
    $servername = 'db';
    $user = 'root';
    $password = 'test';

    $conexion = new PDO("mysql:host=$servername",$user,$password);
    // Recordar que aquí el constructor es $conexion = new PDO("mysql:host=$servername;dbname=$basededatos",$user,$password);
    // Ese dbname va entre las comillas y los parámetros entre comillas se separan con ; 
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conexion; 
}

function inicializa(){
    // Crea la BBDD y la tabla con la que vamos a trabajar. 
    try{
        $conexion = conPDO();
        //$sql = "SHOW TABLES LIKE 'loginud4'";
        $sql = "SHOW DATABASES LIKE 'loginud4'";
        $stmt = $conexion->prepare($sql);
        /*
        Si establecemos la siguiente igualdad: 
        $resultados = $stmt->execute();
        $resultados devuelve true o false. Nada más por lo que si depués hacemos: 
                if($resultados->fetch()){
                        echo "Bananas!";
                    }else {...

        Esto mal porque sobre un bool no se puede hacer un fetch(). La comprobación  sería
                if($resultados->fetch()){
                        echo "Bananas!";
                    }else {...

        Por lo tanto: 
        */
        $stmt->execute();
        /* execute() - Devuelve true o false no un result set ... 
                Por lo que las siguientes líneas de código serían erróneas
            if($resultados->rowCount()>0){
                echo "Bananas!";
            }

            Por otra parte: 
            3. rowCount() is unreliable for SHOW DATABASES ...
            With MySQL + PDO, rowCount() is not reliable for SELECT/SHOW queries.
            You should fetch the results instead.

            Por lo que... si queremos comprobar si devuelve resultados. Las comprobaciones 
            se hacen con fetch()  --->
        */
        if($stmt->fetch()){
            // Si devuelve resultados es que la BBDD existe. Sino la creamos
            echo "Bananas!";
        }else {
            $sql = "CREATE DATABASE IF NOT EXISTS loginud4";
            $stmt = $conexion->prepare($sql);
            $stmt->execute();
            echo "Se ha creado correctamente la BBDD";
        }
    }catch(PDOException $e){
        echo "Se ha producido un error en la consulta a la BBDD". $e->getMessage();
    }
}

?>