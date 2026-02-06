<?php 

function conPDO(){
    $servername = 'db';
    $user = 'root';
    $password = 'test';

    $conexion = new PDO("mysql:host=$servername",$user,$password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conexion; 
}

function inicializa(){
    try{
        $conexion = conPDO();
        $sql = "SHOW DATABASES LIKE 'loginud4'";
        $stmt = $conexion->exec($sql);
        
        // Por qué pasa esto (importante entenderlo)
        // exec() devuelve número de filas afectadas
        // SHOW, SELECT, DESCRIBE:
        // - no afectan filas
        // - ⇒ resultado: 0
        // Las filas devueltas solo se pueden leer con query() + fetch()

        //Regla de ORO en PDO : 
        //Regla de oro PDO 🧠
        // Guárdatela porque evita muchos bugs:
        // exec() → modifica cosas
        // query() → lee cosas
        // fetch() → solo con query()

        if($stmt>0){
            echo "Bananas!";
        }else {
            $sql = "CREATE DATABASE IF NOT EXISTS loginud4";
            $conexion->exec($sql);
            echo "Se ha creado correctamente la BBDD";
        }
    }catch(PDOException $e){
        echo "Se ha producido un error en la consulta a la BBDD". $e->getMessage();
    }
}

?>