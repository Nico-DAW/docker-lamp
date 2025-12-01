<?php

/* 
Recordatorios -> 

1. Cuando hacemos las conexiones a las BBDD ya sea mediante Mysqli o PDO no realizamos un try/catch
Las conexiones las BBDD pueden dar error y deben ser tratados. Pero el catch lo realizaremos en las funciones en las que
vayamos a definir como listarUsurarios ... No en la conexion inicial. 
2. Las conexiones no son querys (sql) no requieren execute o exec
3. Una vez definida la conexión  la devolvemos con return para poder trabajar con ella dónde la empleemos. 
*/


function conMysqli(){
    $servername = 'db';
    $dbname = 'tareas';
    $user = 'root';
    $password = 'test';
    $conexion = new mysqli($servername, $user, $password, $dbname);

    return $conexion; 
}

function listaUsuarios(){
    //Aquí ya empleamos el try/catch
    try{
        $conexion = conMysqli();
        //contemplamos la posibilidad  de que pueda existir un error al establecer la conexion
        if($conexion->connect_error){
            return [false, "Se ha producido un error al intentar conectarse a la BBDD"];
        }else{
            $sql="SELECT id, username FROM usuarios";
            $resultados=$conexion->query($sql);
            // MYSQLI_ASSOC es sin comillas
            $resultados->fetch_all(MYSQLI_ASSOC);
            return [true, $resultados];
    }
    }catch(mysqli_sql_exception $e){
        return [false, "Se ha producido un error al intentar ejecutar la consulta: ".$e];
    }finally{
        if(isset($conexion)&&$conexion->connect_errno==0){
            $conexion->close();
        }
    }
}

function nuevaTarea($titulo,$descripcion,$estado,$userId){
    try{
    $conexion=conMysqli();
    if($conexion->connect_error){
        return[false,"Se ha producido un error al  intentar conectarse a la BBDD ".$conexion->connect_error];
    }
    $sql="INSERT INTO tareas(titulo,descripcion,estado,id_usuario) VALUES (?,?,?,?)";
    $stmt=$conexion->prepare($sql);
    $stmt->bind_param('sssi',$titulo,$descripcion,$estado,$userId);
    $stmt->execute();
        return[true, "Se ha incluido satisfactoriamente la tarea en la BBDD"];
    }catch(mysqli_sql_exception $e){
        return[false, "Se ha producido un error al intentar registrar la tarea en la BBDD ".$e->getMessage()];
    }finally{
        if(isset($conexion)&&$conexion->errno==0){
            $conexion->close(); 
        }
    }
}