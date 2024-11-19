<?php
$servername ='db';
$username ='root';
$userpass ='test';
$ddbbname ='myDBop';

try{
$conexion = new PDO("mysql:host=$servername; dbname=$ddbbname",$username,$userpass);
// Forzamos excepciones
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// Si todo a ido bien 
echo "Se ha creado la conexiona a la BBDD con éxito<br>";
// Cremos la consulta la almacenamos en una variable y la ejecutamos. !!! La ejecutamos --> execute();
$stmt = $conexion->prepare("SELECT id,nombre,apellido FROM Clientes;");
$stmt->execute();

// Definimos el tipo modo de Fetch
$stmt->setFetchMode(PDO::FETCH_ASSOC);
// Volvamos todo el resultado en una variable con fetchAll(); 
$resultado = $stmt->fetchAll();

// fecthAll() devuelve un cursor que hay que recorrer. En PDO no se emplea el num_rows... 

foreach($resultado as $row){
    echo $row["id"]."-".$row["nombre"]."-".$row["apellido"]."<br>";
}

}catch(PDOException $e){
    echo "Se ha producido un error ".$e->getMessage(); 
}finally{
// Cerramos la conexion en PDO es null
    $conexion = null;
    echo "Se ha cerrado la conexion. ";
}
?>