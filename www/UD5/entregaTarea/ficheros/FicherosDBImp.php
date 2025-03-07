<?php
include_once('../modelo/pdo.php');
include_once('../modelo/FicherosDBInt.php');
include_once('Fichero.php');

class FicherosDBImp implements FicherosDBInt{
    
    public function nuevoFichero($fichero):array
{
    // Validamos el fichero antes de proceder
    $errores = Fichero::validar($fichero);
    if (!empty($errores)) {
        return [false, $errores]; // Retornamos los errores de validación
    }

    try
    {
        $con = conectaPDO();
        $stmt = $con->prepare("INSERT INTO ficheros (nombre, file, descripcion, id_tarea) VALUES (:nombre, :file, :descripcion, :idTarea)");
        $file = $fichero->getFile();
        $stmt->bindParam(':file', $file['name']);
        $nombre = $fichero->getNom();
        $stmt->bindParam(':nombre', $nombre);
        $descripcion = $fichero->getDesc();
        $stmt->bindParam(':descripcion', $descripcion);
        $id_tarea = $fichero->getTa();
        $stmt->bindParam(':idTarea', $id_tarea);
        $stmt->execute();
        
        $stmt->closeCursor();

        return [true, null];
    }
    catch (PDOException $e)
    {
        return [false, $e->getMessage()];
    }
    finally
    {
        $con = null;
    }
}

}

?>