<?php
include_once("../usuarios/usuario.php");
include_once("../ficheros/Fichero.php");

function conectaPDO()
{
    $servername = $_ENV['DATABASE_HOST'];
    $username = $_ENV['DATABASE_USER'];
    $password = $_ENV['DATABASE_PASSWORD'];
    $dbname = $_ENV['DATABASE_NAME'];

    $conPDO = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conPDO;
}

/*
function listaUsuarios()
{
    try {
        $con = conectaPDO();
        $stmt = $con->prepare('SELECT id, nombre, apellidos, username, rol, contrasena FROM usuarios');
        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $resultados = $stmt->fetchAll();
        return [true, $resultados];
    }
    catch (PDOException $e) {
        return [false, $e->getMessage()];
    }
    finally {
        $con = null;
    }
    
}
*/

function listaUsuarios()
{
    try {
        $con = conectaPDO();
        $stmt = $con->prepare('SELECT id, nombre, apellidos, username, rol, contrasena FROM usuarios');
        $stmt->execute();

        /* Esto esta mal:
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        */
        //$resultados = $stmt->fetchAll();
        $usuarios=[];
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
            
            $usuario=new Usuario(null, null, null, null, null, null);
            $usuario->setId($row['id']);
            $usuario->setUsername($row['username']);
            $usuario->setNom($row['nombre']);
            $usuario->setApel($row['apellidos']);
            $usuario->setRol($row['rol']);
            $usuario->setPass($row['contrasena']);
            $usuarios[]=$usuario;
        }
        return [true, $usuarios];
    }
    catch (PDOException $e) {
        return [false, $e->getMessage()];
    }
    finally {
        $con = null;
    }
    
}

function listaTareasPDO($id_usuario, $estado)
{
    try {
        $con = conectaPDO();
        $sql = 'SELECT * FROM tareas WHERE id_usuario = ' . $id_usuario;
        if (isset($estado))
        {
            $sql = $sql . " AND estado = '" . $estado . "'";
        }
        $stmt = $con->prepare($sql);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $tareas = array();
        while ($row = $stmt->fetch())
        {
            $usuario = buscaUsuario($row['id_usuario']);
            $row['id_usuario'] = $usuario['username'];
            array_push($tareas, $row);
        }
        return [true, $tareas];
    }
    catch (PDOException $e) {
        return [false, $e->getMessage()];
    }
    finally {
        $con = null;
    }
    
}


function nuevoUsuario($usuario){
    try{
        $con = conectaPDO();
        $stmt = $con->prepare("INSERT INTO usuarios (username, rol, nombre, apellidos, contrasena) VALUES ( :username, :rol, :nombre, :apellidos, :contrasena)");
        $username = $usuario->getUsername();
        $stmt->bindParam(':username', $username);
        $rol = $usuario->getRol();
        $stmt->bindParam(':rol', $rol);
        //Sino lo haces así -->
        $nombre = $usuario->getNom();
        $stmt->bindParam(':nombre', $nombre);
        //Obtienes el siguente error: Only variables should be passed by reference... 
        $apellidos = $usuario->getApel();
        $stmt->bindParam(':apellidos', $apellidos);
        $pass = $usuario->getPass();
        $hasheado = password_hash($pass, PASSWORD_DEFAULT);
        $stmt->bindParam(':contrasena', $hasheado);
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

/*
function nuevoUsuario($nombre, $apellidos, $username, $contrasena, $rol=0)
{
    try{
        $con = conectaPDO();
        $stmt = $con->prepare("INSERT INTO usuarios (nombre, apellidos, username, rol, contrasena) VALUES (:nombre, :apellidos, :username, :rol, :contrasena)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellidos', $apellidos);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':rol', $rol);
        $hasheado = password_hash($contrasena, PASSWORD_DEFAULT);
        $stmt->bindParam(':contrasena', $hasheado);
        $stmt->execute();
        
        $stmt->closeCursor();

        return [true, null];
    }
    catch (PDOExcetion $e)
    {
        return [false, $e->getMessage()];
    }
    finally
    {
        $con = null;
    }
}


function actualizaUsuario($id, $nombre, $apellidos, $username, $contrasena, $rol)
{
    try{
        $con = conectaPDO();
        $sql = "UPDATE usuarios SET nombre = :nombre, apellidos = :apellidos, username = :username, rol = :rol";

        if (isset($contrasena))
        {
            $sql = $sql . ', contrasena = :contrasena';
        }

        $sql = $sql . ' WHERE id = :id';

        $stmt = $con->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellidos', $apellidos);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':rol', $rol);
        if (isset($contrasena))
        {
            $hasheado = password_hash($contrasena, PASSWORD_DEFAULT);
            $stmt->bindParam(':contrasena', $hasheado);
        }
        $stmt->bindParam(':id', $id);

        $stmt->execute();
        
        $stmt->closeCursor();

        return [true, null];
    }
    catch (PDOExcetion $e)
    {
        return [false, $e->getMessage()];
    }
    finally
    {
        $con = null;
    }
}
*/

function actualizaUsuario($usuario)
{
    try{
        $con = conectaPDO();
        //$sql = "UPDATE usuarios SET username = :username, rol = :rol, nombre = :nombre, apellidos = :apellidos, contrasena = :contrasena WHERE id = :id" ;
        $sql = "UPDATE usuarios SET username = :username, rol = :rol, nombre = :nombre, apellidos = :apellidos" ;
        $pass = $usuario->getPass();
        
        if (isset($pass))
        {
            $sql = $sql . ', contrasena = :contrasena';
        }
        $sql = $sql . ' WHERE id = :id';

        $stmt = $con->prepare($sql);
        $nombre = $usuario->getNom();
        $stmt->bindParam(':nombre', $nombre);
        $apellidos = $usuario->getApel();
        $stmt->bindParam(':apellidos', $apellidos);
        $username = $usuario->getUsername();
        $stmt->bindParam(':username', $username);
        $rol = $usuario->getRol();
        $stmt->bindParam(':rol', $rol);
        $pass = $usuario->getPass();

        if (isset($pass))
        {
            $hasheado = password_hash($pass, PASSWORD_DEFAULT);
            $stmt->bindParam(':contrasena', $hasheado);
        }
        $id = $usuario->getId();
        $stmt->bindParam(':id', $id);

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

/*
function borraUsuario($id)
{
    try {
        $con = conectaPDO();

        $con->beginTransaction();

        $stmt = $con->prepare('DELETE FROM tareas WHERE id_usuario = ' . $id);
        $stmt->execute();
        $stmt = $con->prepare('DELETE FROM usuarios WHERE id = ' . $id);
        $stmt->execute();
        
        return [$con->commit(), ''];
    }
    catch (PDOExcetion $e)
    {
        return [false, $e->getMessage()];
    }
    finally
    {
        $con = null;
    }
}
*/

function borraUsuario($usuario)
{
    try {
        $con = conectaPDO();

        $con->beginTransaction();
        $id=$usuario->getId();

        $stmt = $con->prepare('DELETE FROM tareas WHERE id_usuario = ' . $id);
        $stmt->execute();
        $stmt = $con->prepare('DELETE FROM usuarios WHERE id = ' . $id);
        $stmt->execute();
        
        return [$con->commit(), ''];
    }
    catch (PDOExcetion $e)
    {
        return [false, $e->getMessage()];
    }
    finally
    {
        $con = null;
    }
}

/* Se puede buscar un usuario por ID en la BBDD y que devuelva un objeto Usuario */
function buscaUsuario($id)
{

    try
    {
        $con = conectaPDO();
        $stmt = $con->prepare('SELECT id, username, nombre, apellidos, rol, contrasena FROM usuarios WHERE id = ' . $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() == 1)
        {
            return $stmt->fetch();
        }
        else
        {
            return null;
        }
    }
    catch (PDOExcetion $e)
    {
        return null;
    }
    finally
    {
        $con = null;
    }
    
}

function buscaUsername($username)
{
    try
    {
        $con = conectaPDO();
        $stmt = $con->prepare('SELECT id, rol, contrasena FROM usuarios WHERE username = "' . $username . '"');
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        if ($stmt->rowCount() == 1)
        {
            return $stmt->fetch();
        }
        else
        {
            return null;
        }
    }
    catch (PDOExcetion $e)
    {
        return null;
    }
    finally
    {
        $con = null;
    }
    
}

function listaFicheros($fichero)
{
    try
    {
        $con = conectaPDO();
        $id_tarea = $fichero->getTa();
        $sql = 'SELECT * FROM ficheros WHERE id_tarea = ' . $id_tarea;
        $stmt = $con->prepare($sql);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ficheros = array();
        while ($row = $stmt->fetch())
        {
            array_push($ficheros, $row);
        }
        return $ficheros;
    }
    catch (PDOException $e)
    {
        return array();
    }
    finally
    {
        $con = null;
    }
}

/*
function listaFicheros($id_tarea)
{
    try
    {
        $con = conectaPDO();
        $sql = 'SELECT * FROM ficheros WHERE id_tarea = ' . $id_tarea;
        $stmt = $con->prepare($sql);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $ficheros = array();
        while ($row = $stmt->fetch())
        {
            array_push($ficheros, $row);
        }
        return $ficheros;
    }
    catch (PDOException $e)
    {
        return array();
    }
    finally
    {
        $con = null;
    }
}
*/

function buscaFichero($id)
{
    try
    {
        $con = conectaPDO();
        $sql = 'SELECT * FROM ficheros WHERE id = ' . $id;
        $stmt = $con->prepare($sql);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $fichero = null;
        if ($row = $stmt->fetch())
        {
            $fichero = $row;
        }
        return $fichero;
    }
    catch (PDOException $e)
    {
        return null;
    }
    finally
    {
        $con = null;
    }
}

/*
function buscaFichero($fichero)
{
    try
    {
        $con = conectaPDO();
        $id =$fichero->getId();
        $sql = 'SELECT * FROM ficheros WHERE id = ' . $id;
        $stmt = $con->prepare($sql);
        $stmt->execute();

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $fichero = null;
        if ($row = $stmt->fetch())
        {
            $fichero = $row;
        }
        return $fichero;
    }
    catch (PDOException $e)
    {
        return null;
    }
    finally
    {
        $con = null;
    }
}
*/

function borraFichero($fichero)
{
    try
    {
        $con = conectaPDO();
        $id = $fichero->getId();
        $sql = 'DELETE FROM ficheros WHERE id = ' . $id;
        $stmt = $con->prepare($sql);
        $stmt->execute();

        return true;
    }
    catch (PDOException $e)
    {
        return false;
    }
    finally
    {
        $con = null;
    }
}

/*
function borraFichero($id)
{
    try
    {
        $con = conectaPDO();
        $sql = 'DELETE FROM ficheros WHERE id = ' . $id;
        $stmt = $con->prepare($sql);
        $stmt->execute();

        return true;
    }
    catch (PDOException $e)
    {
        return false;
    }
    finally
    {
        $con = null;
    }
}
*/

/*
function nuevoFichero($file, $nombre, $descripcion, $idTarea)
{
    try
    {
        $con = conectaPDO();
        $stmt = $con->prepare("INSERT INTO ficheros (nombre, file, descripcion, id_tarea) VALUES (:nombre, :file, :descripcion, :idTarea)");
        $stmt->bindParam(':file', $file);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':idTarea', $idTarea);
        $stmt->execute();
        
        $stmt->closeCursor();

        return [true, null];
    }
    catch (PDOExcetion $e)
    {
        return [false, $e->getMessage()];
    }
    finally
    {
        $con = null;
    }
}
*/

    function nuevoFichero($fichero)
{
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

