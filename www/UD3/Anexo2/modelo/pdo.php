<?php

function conPDO(){
        $servername = 'db';
        $dbname = 'tareas';
        $username = 'root';
        $password = 'test';
        $conexion = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
}

function listaUsuarios(){
    try{
        $conexion = conPDO();
        $sql = "SELECT id,username,nombre,apellidos,contrasena FROM usuarios;";
        $stmt = $conexion->prepare($sql);
        //$resultados = $stmt->execute();
        $stmt->execute();
        //$resultados->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        //$devuelve = $resultados->fetchAll();
        $resultados = $stmt->fetchAll();
        /*
        if(empty($resultados)){
            return [false, ];
        }
        */
        return [true, $resultados];

    }catch(PDOException $e){
        return [false, "Se ha producido un error al intentar listar los usuarios ".$e->getMessage()];
    }
   
}

function borraUser($id){
    try{
      $conexion = conPDO();
      $sql = "DELETE FROM usuarios WHERE id=:id";
      $stmt = $conexion->prepare($sql);
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->execute();
      return [true, "Se ha borrado el usuario satisfactoriamente"];
    }catch(PDOException $e){
      return [false, "Se ha producido un error al borrar el usuario ".$e->getMessage()];
    }
}

function nuevoUsuario($username,$nombre,$apellidos,$contrasena){
    try{
        $conexion = conPDO();
        $stmt = $conexion->prepare("INSERT INTO usuarios(username,nombre,apellidos,contrasena)VALUES(:username,:nombre,:apellidos,:contrasena)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellidos', $apellidos);
        $stmt->bindParam(':contrasena', $contrasena);

        $stmt->execute();

        return [true,"Se ha registrado el usuairo satisfactoriamente"];
    }catch(PDOException $e){
        return [false,"Se ha producido un error al intentar registrar al usuario"];
    }
}