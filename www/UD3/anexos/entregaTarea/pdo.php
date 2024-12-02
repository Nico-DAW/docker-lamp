<?php 
function conecta($servername, $dbname, $username, $userpass){
    $conexion = new PDO("mysql:host=$servername; dbname=$dbname",$username,$userpass);
    return $conexion;
}

function nuevoUser($id,$username,$nombre,$apellidos,$contrasena){
    echo ("Aqui_1");
    try{
    echo ("Aqui_2");
        $conexion = conecta('db','tareas','root','test');
    echo ("Aqui_3");
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql= "INSERT INTO usuarios (id, username, nombre, apellidos, contrasena) VALUES (:id, :username, :nombre, :apellidos, :contrasena)";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':nombre', $nombre, PDO::PARAM_STR);
        $stmt->bindParam(':apellidos', $apellidos, PDO::PARAM_STR);
        $stmt->bindParam(':contrasena', $contrasena, PDO::PARAM_STR);

        return $stmt->execute();

    }catch(PDOException $e){
        error_log("Error al insertar el usuario: " . $e->getMessage());
        return false; 
    }finally{
        $conexion = null;
    }

}

?>