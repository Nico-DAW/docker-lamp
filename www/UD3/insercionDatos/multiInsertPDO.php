<?php 
//La inserción multiple en PDO se hace por medio de una transacción

$servername='db';
$dbname='myDBop';
$username='root';
$userpass='test';

try{
$conexion = new PDO("mysql:host=$servername; dbname=$dbname",$username,$userpass);
//Forazamos excepciones
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
echo "La conexion se ha realizado con éxito.<br>";

//Iniciamos la transaccion con beginTransaction();
$conexion->beginTransaction();

//!!! Ojo aqui los campos de las tablas van sin comillas... git add
$sql ="INSERT INTO Clientes(nombre,apellido,email) VALUES ('Pedro','Machado','pedro@daw.gal');";
$conexion->exec($sql);

$sql ="INSERT INTO Clientes (nombre,apellido,email) VALUES ('Marco','Jimenez','marcos@daw.gal');";
$conexion->exec($sql);

$sql ="INSERT INTO Clientes (nombre,apellido,email) VALUES ('Federico','Rodriguez','fede@daw.gal');";
$conexion->exec($sql);

//Una vez hemos finalizado las inserciones hacemos un commit
$conexion->commit();

//Si la ejecución prosigue es que la inserción se ha realizado con éxito
echo "La inserción de datos se ha realizado correctamente<br>"; 

}catch(PDOException $e){
    // Si por cualquier caso la inserción no prospera se revierten los cambios con rollback()
    // Para ello comprobamos primero que la conexion esté vacia... 
    if($conexion!=null)
    $conexion->rollback();
    echo "Se ha producido un error en la conexion.".$e->getMessage();
}finally{
    //Recordar que en PDO la conexion se cierra con null... no con $conexion->close();
    $conexion = null;
    echo "Se ha cerrado la conexion.";
}
?>