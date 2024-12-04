<?php
//Creamos una función que devuelve una conexión a una BBDD en función de los argumentos. 
function conecta($host,$user,$pass,$db){
    $conexion = new mysqli($host, $user, $pass, $db); 
    return $conexion;
}

function desconecta($conexion){
    if(isset($conexion) && $conexion->connect_errno === 0){
        $conexion->close();
    }
}

//Creamos una función que crea la BBDD sino existe

function createDB(){
    try{
        //Empleamos la función conecta() anteriormente definida
        $conexion = conecta('db', 'root', 'test', null);
        //Definimos una variable $error con el número de error                    
        $error = $conexion->connect_errno;
        //Definimos una varibale con un string vacío dónde iremos almacenando el texto de los mensajes a mostrar. 
        $checkMsg = "";
        //Comprobamos si se produce algún error en la conexion. 
        if($error!=null){
            //Si se produce algún error devolvemos un array con false y el mensaje a mostrar.
            $checkMsg .= "<p class=\"alert alert-danger\" role=\"alert\">Se ha producido un error en la conexion. Error con número. ".$error."</p>";
                return [false, $checkMsg];
        }else{
            //Si no se ha producido error mostramos un mensaje. 
            $checkMsg .="<p class=\"alert alert-success\" role=\"alert\">La conexión a la BBDD se ha realizado con exito. </p>";
            //Creamos la consulta para comprobar si existe la BBDD
            $sqldbCheck = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = 'tareas'";
            //!!!! Añadimos el resultado de la consulta a una varibale... Este paso es importante 
            $resultado = $conexion->query($sqldbCheck);
                //Si la query es TRUE la BBDD ya existe.
                if($resultado && $resultado->num_rows > 0){
                    $checkMsg .= "<p class=\"alert alert-warning\" role=\"alert\">La BBDD \"tareas\" ya existía. </p>";
                    //Devolvemos FALSE con el mensaje asociado. 
                    return [false, $checkMsg];
                }else{
                    //En caso de que la consulta sea FALSE (es decir no exista la BBDD) creamos la BBDD
                    $sqldb = "CREATE DATABASE IF NOT EXISTS tareas";
                    if($conexion->query($sqldb)){
                        $checkMsg .= "<p class=\"alert alert-success\" role=\"alert\">Se ha creado la BBDD correctamente.</p>";
                        return [true, $checkMsg];
                    }else{
                        $checkMsg .= "<p class=\"alert alert-danger\" role=\"alert\">Se ha producido un error alintentar crear la BBDD.</p>";
                        return [false, $checkMsg];
                    }
                    
                }
        }
    //Si se produce un error durante el proceso capturamos la excepción
    }catch(mysqli_sql_exception $e){
        $checkMsg .= "<p class=\"alert alert-danger\" role=\"alert\">Se ha producido un error al intentar crear la BBDD: ".$e->getMessage()."</p>";
        return [false, $checkMsg];
    }
    //Finalmente se cierra la conexion
    finally{
        desconecta($conexion);
    }
}

//Se define la función tablaUsuarios()

function tablaUsuarios(){
    try{
        $conexion = conecta('db', 'root', 'test', 'tareas');
        /* 
        ** Recordatorio -->
        En principio  la manera de seleccionar con mysqli_select_db es --> ($conexion, 'tareas') --> Argumentos la conexion y la BBDD
        mysqli_select_db('tareas');
        */
        //Creamos una variable que devolverá e mensaje en funcíon de si creamos la tabla o no... 
        $checkMsg = "";
        if($conexion->connect_error){
            $checkMsg .= $conexion->error;
            return[false, $checkMsg];
        }else{
            //Verificamos si la tabla existe. Creamos una consulta
            $sqlCheck = "SHOW TABLES LIKE 'usuarios'";
            //Almacenamos la consulta en una variable
            $resultado = $conexion->query($sqlCheck);
            //Comprobamos
            if ($resultado && $resultado->num_rows > 0){
                $checkMsg .= "<p class=\"alert alert-warning\" role=\"alert\">La tabla \"usuarios\" ya existía. </p>";
                return [false, $checkMsg];
            }
            //Creamos una variable con una consulta que crea la tabla en la BBDD
            $sql = "CREATE TABLE IF NOT EXISTS usuarios (
                    id INT AUTO_INCREMENT PRIMARY KEY,
                    username VARCHAR(50), 
                    nombre VARCHAR(50), 
                    apellidos VARCHAR(100), 
                    contrasena VARCHAR(100)
            )"; 
            //Comprobamos que la tabla se cree correctamente
            if ($conexion->query($sql)){
                $checkMsg .= "<p class=\"alert alert-success\" role=\"alert\">Tabla 'usuarios' creada correctamente</p>";
                return [true, $checkMsg];
            }else{
                $checkMsg .= "<p class=\"alert alert-danger\" role=\"alert\">No se pudo crear la tabla 'usuarios'.</p>";
                return [false, $checkMsg];
            }
        }
    //Si se produce alguna excepción la mostramos.    
    }catch(mysqli_sql_exception $e){
        $checkMsg .= "<p class=\"alert alert-danger\" role=\"alert\">Se ha producido un error al intentar crear la tabla 'usuarios'.".$e->getMessage()."</p>";
        return [false, $checkMsg];
    //Al finla de la creación de la tabla cerramos la conexion. 
    }finally{
        desconecta($conexion);
    }
}

function tablaTareas(){
try{
    $conexion = conecta('db','root','test','tareas');
    //Si se produce un error devolvemos el error. 
    //Creamos una variable que devolverá e mensaje en funcíon de si creamos la tabla o no... 
    $checkMsg = "";
    if($conexion->connect_error){
        $checkMsg .= $conexion->error;
        return[false, $checkMsg];  
    }else{
    //En el caso de que no se produzca verificamos si la tabla existe.
    $checkTable = "SHOW TABLES LIKE 'tareas'"; 
    //Almacenamos el resultado de la consulta en una variable
    $resultado = $conexion->query($checkTable);
    //Comprobamos. En el caso de que exista devuelve que la tabla existe. 
    if($resultado && $resultado->num_rows > 0){
        $checkMsg .= "<p class=\"alert alert-warning\" role=\"alert\">La tabla \"tareas\" ya existía. </p>";
        return [false, $checkMsg];
    }
    //Creamos una variable con la creación de la consulta que crea la tabla 
    $sql = "CREATE TABLE IF NOT EXISTS tareas (
        id INT AUTO_INCREMENT PRIMARY KEY,
        titulo VARCHAR(50), 
        descripcion VARCHAR(250), 
        estado VARCHAR(50), 
        id_usuario INT,
        CONSTRAINT fk_tar_use FOREIGN KEY (`id_usuario`) REFERENCES `usuarios`(`id`) 
        )"; 
        //Comprobamos que la tabla se cree correctamente
        if ($conexion->query($sql)){
            $checkMsg .= "<p class=\"alert alert-success\" role=\"alert\">Tabla 'tareas' creada correctamente</p>";
            return [true, $checkMsg];
        }else{
            $checkMsg .= "<p class=\"alert alert-danger\" role=\"alert\">No se pudo crear la tabla 'tareas'.</p>";
            return [false, $checkMsg];
        }
    }
    //Si se produce alguna excepción la mostramos.    
}catch(mysqli_sql_exception $e){
    $checkMsg .= "<p class=\"alert alert-danger\" role=\"alert\">Se ha producido un error al intentar crear la tabla 'tareas'.".$e->getMessage()."</p>";
    return [false, $checkMsg];
//Al final de la creación de la tabla cerramos la conexion. 
}finally{
    desconecta($conexion);
}
}

function devuelveUsuarios(){
    try{
        $conexion=conecta('db','root','test','tareas');
            if($conexion->connect_error){
                return false;
            }
        $sql="SELECT id, nombre FROM usuarios;";
        $resultado = $conexion->query($sql);
            if($resultado){
                /*
                Aqui el foreach no vale
                foreach($resultado as $nombre){
                    return $nombre;}
                */
                //fectch_assoc --> devuelve un array asociativo clave-valor
                $consulta = []; 
                while($fila = $resultado->fetch_assoc()){
                    /*
                    Esta es la clave. El array no se sobreescribe sino que 
                    añade una fila al final del array en cada iteración.
                    */
                    $consulta[]=$fila;
                }
                $conexion->close();
                return $consulta;
            }else {
                $conexion->close();
                return false;
            }
    }catch(mysqli_sql_exception $e){
        error_log($e->getMessage());
        return false;
    }
}

function guardaNueva($titulo, $desc, $estado, $idUsuario){
    try{
        $conexion = conecta('db', 'root', 'test', 'tareas');
            if($conexion->connect_error){
                return false;
            }
        /* 
        $sql="INSERT INTO tareas (titulo, descripcion, estado, usuario) VALUES  VALUES ('$titulo', '$desc', '$estado', '$usuario')";
        */
        $sql = "INSERT INTO tareas (titulo, descripcion, estado, id_usuario) VALUES (?, ?, ?, ?)";
        //Por seguridad utilizar prepared statements    
        $stmt = $conexion->prepare($sql);
            if ($stmt) {
                $stmt->bind_param('ssss', $titulo, $desc, $estado, $idUsuario);
                $stmt->execute();
                $stmt->close();
                // Debug - echo "Yes";
                return true;
            }
    }catch(mysqli_sql_exception $e){
            //Debug - echo "No, no!";
            echo $e->getMessage(); 
        return false;
    }
}

?>