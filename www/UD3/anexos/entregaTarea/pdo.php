<?php 
function conecta($servername, $dbname, $username, $userpass){
    $conexion = new PDO("mysql:host=$servername; dbname=$dbname",$username,$userpass);
    return $conexion;
}

function nuevoUser($id,$username,$nombre,$apellidos,$contrasena){
    //Debug - echo ("Aqui_1");
    try{
        $conexion = conecta('db','tareas','root','test');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql= "INSERT INTO usuarios (id, username, nombre, apellidos, contrasena) VALUES (:id, :username, :nombre, :apellidos, :contrasena)";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':apellidos', $apellidos, PDO::PARAM_STR);
        $stmt->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);
        /*
        https://www.php.net/manual/en/pdostatement.execute.php
        execute() Returns true on success or false on failure.
        */
        return $stmt->execute();

    }catch(PDOException $e){
        error_log("Error al insertar el usuario: " . $e->getMessage());
        return false; 
    }finally{
        $conexion = null;
    }

}

function listaUsuarios(){
    try {
        $conexion = conecta('db','tareas','root','test');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql= "SELECT * FROM usuarios";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $resultados = $stmt->fetchAll();
        return $resultados;
    }
    catch (PDOException $e) {
        return null;
    }
    finally
    {
        $conexion = null;
    }
}

function borraUsuario($id){

    try {
        $conexion = conecta('db','tareas','root','test');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $conexion->beginTransaction();
        /*
        $sqlTareas = "DELETE FROM tareas WHERE id_usuario = :usuarioId";
        $sqlTareas = $conn->prepare($sqlDonaciones);
        $sqlTareas->bindParam(':usuarioId', $id, PDO::PARAM_INT);
        $sqlTareas->execute();
        */
        $sqlUsuarios = "DELETE FROM usuarios WHERE id = :usuarioId";
        $stmtUsuarios = $conexion->prepare($sqlUsuarios);
        $stmtUsuarios->bindParam(':usuarioId', $id, PDO::PARAM_INT);
        $stmtUsuarios->execute();

        $conexion->commit();
        return true;
    }
    catch (PDOException $e) {
        error_log("Error al eliminar el usuario: " . $e->getMessage());
        return false;
    }
    finally
    {
        $conn = null;
    }
}

?>