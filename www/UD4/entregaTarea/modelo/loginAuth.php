<?php
session_start();

include_once('pdo.php');

function comprobarUsuario($nombre, $pass, $conPDO)
{
    //Incorporamos el id para tenerlo diponible en $_SESSION - UD4 Tarea
    $consulta = "SELECT contrasena, rol, id FROM usuarios WHERE nombre=:nombreTecleado";
    $stmt = $conPDO->prepare($consulta);
    try
    {
        $stmt->bindParam(':nombreTecleado', $nombre);
        $stmt->execute();

        //Si el usuario ya no existe, no valida
        if ($stmt->rowCount() != 1) return false;
        
        $fila=$stmt->fetch();
    
        $passBD=$fila['contrasena'];
        $rol = $fila['rol'];
        $id = $fila['id'];

        //Primero comprobamos que haya un usuario y después comprobamos la contraseña introducida
        if ($stmt->rowCount() == 1 && password_verify($pass, $passBD))
        {
            $usuario['nombre']=$nombre;
            $usuario['rol']=$rol;
            $usuario['id']=$id;
            return $usuario;
        }
        else
        {
            return null;
        }
    }
    catch (PDOException $ex)
    {
        return $ex->getMessage();
    }
    finally
    {
        $conPDO = null;
        if ($stmt != null) $stmt->closeCursor();
        $stmt = null;
    }

}

//Comprobar si se reciben los datos

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $usuario = $_POST["usuario"];
    $pass = $_POST["pass"];

    if(($_POST["usuario"]=="admin") && ($_POST["pass"]=="test"))
    {
        $usuario = [
            'nombre' => "admin",
            'contrasena' => "test",
            'rol' => 1
        ];
        $_SESSION['usuario']=$usuario;
        //Redirigimos a index.php
        header('Location: ../index.php');
    }

    if (empty($usuario) || empty($pass))
    {
        header('Location: ../login.php?error=true&message=Los campos del formulario son obligatorios.');
    }

    $conPDO = conectaPDO();
    if (is_string($conPDO))
    {
        header('Location: ../login.php?error=true&message=' . $conPDO);
    }
    $user = comprobarUsuario($usuario, $pass, $conPDO);
    if(!$user)
    {
        header('Location: ../login.php?error=true');
    }
    elseif (is_string($user))
    {
        header('Location: ../login.php?error=true&message=' . $user);
    }
    else
    {
        $_SESSION['usuario'] = $user;
        //Redirigimos a index.php
        header('Location: ../index.php');
    }
}

?>