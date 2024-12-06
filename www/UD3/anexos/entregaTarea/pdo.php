<?php 
function conectaPDO($servername, $dbname, $username, $userpass){
    $conexion = new PDO("mysql:host=$servername; dbname=$dbname",$username,$userpass);
    return $conexion;
}

function nuevoUser($id,$username,$nombre,$apellidos,$contrasena){
    //Debug - echo ("Aqui_1");
    try{
        $conexion = conectaPDO('db','tareas','root','test');
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
// Podemos meter un parámetro opcional ... Ejemplo --> 
function listaUsuarios($id){
    try {
        $conexion = conectaPDO('db','tareas','root','test');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql= "SELECT * FROM usuarios";
        if($id!==null){
        $sql = $sql." WHERE id='$id'";
        }
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

function listaTareasUsuario($id){
    try {
        $conexion = conectaPDO('db','tareas','root','test');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql= "SELECT t.id, t.titulo, t.descripcion, t.estado, u.nombre FROM tareas t JOIN usuarios u ON u.id = t.id_usuario WHERE u.id = '$id'";
        $stmt = $conexion->prepare($sql);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $resultados = $stmt->fetchAll();
        return $resultados;
    }catch(PDOException $e){
        return null;
    }
    finally
    {
        $conexion = null;
    }
}

function borraUsuario($id){

    try {
        $conexion = conectaPDO('db','tareas','root','test');
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
        $conexion = null;
    }
}

function buscaUsuario($id)
{
    try {
        $conexion = conectaPDO('db','tareas','root','test');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $conexion->prepare("SELECT * FROM usuarios WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if (count($resultados) === 1) {
            return [true, $resultados[0]];
        } else {
            return [false, 'No se pudo recuperar el usuario.'];
        }
        
    }catch (PDOException $e) {
        return [false, $e->getMessage()];
    }finally{
        if (isset($conexion)) {
            $conexion = null;
        }
    }
}

function actualizaUsuario($id, $username, $nombre, $apellidos, $contrasena)
{
    try {
        $conexion = conectaPDO('db','tareas','root','test');
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE usuarios SET username = :username, nombre = :nombre, apellidos = :apellidos, contrasena = :contrasena WHERE id = :id";
        $stmt = $conexion->prepare($sql);

        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':apellidos', $apellidos, PDO::PARAM_STR);
        $stmt->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);

        $stmt->execute();

        return [true, 'Usuario actualizado correctamente.'];

    } catch (PDOException $e) {
        return [false, $e->getMessage()];
    } finally {
        $conexion = null;
    }
}

?>