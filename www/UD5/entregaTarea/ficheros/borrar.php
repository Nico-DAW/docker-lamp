<?php
require_once('../login/sesiones.php');
require_once('../modelo/mysqli.php');
require_once('../modelo/pdo.php');
include_once('Fichero.php');

$status = 'error';
$messages = array();
$id_tarea = 0;

if (!empty($_GET))
{
    $id = $_GET['id'];
    $archivo = buscaFichero($id);
    if (!empty($id) && $archivo)
    {
        $id_tarea = $archivo['id_tarea'];
        if (checkAdmin() || esPropietarioTarea($_SESSION['usuario']['id'], $archivo['id_tarea']))
        {
            $ruta = '../' . $archivo['file'];
            $borrado = borrarArchivo($ruta);
            
          
            $name = $archivo['nombre'];
            //$file = $_FILES[];
            $file=[];
            $file['name'] = $archivo['file'];
            //$file['name'] = $ruta;
            $descripcion = $archivo['descripcion'];
            $fichero = new Fichero($name, $file, $descripcion, $id_tarea); 
            //var_dump($archivo['id']);
            $fichero->setId($archivo['id']);
            //$fichero->setId($archivo['id']);
            //var_dump($borrado);
            if ($borrado) $borrado = borraFichero($fichero);

            if ($borrado)
            {
                $status = 'success';
                array_push($messages, 'Archivo borrado correctamente.');
            }
            else
            {
                array_push($messages, 'No se pudo borrar el archivo.');
            }
        }
        else
        {
            array_push($messages, 'No tienes permisos sobre este archivo.');
        }
    }
    else
    {
        array_push($messages, 'No se pudo recuperar la información del archivo.');
    }
}
else
{
    array_push($messages, 'Debes acceder a través del listado de tareas.');
}


$_SESSION['status'] = $status;
$_SESSION['messages'] = $messages;
header("Location: ../tareas/tarea.php?id=" . $id_tarea);

function borrarArchivo($archivo)
{
    return (file_exists($archivo) && unlink($archivo));
}

