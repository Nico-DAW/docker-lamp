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
            echo "La base de datos ya existe!";
        }else{
            echo "Debug!";
            //Crea la BBDD
        }
    }catch(PDOException $e){
        $e->getMessage();
    }
    
}
?>