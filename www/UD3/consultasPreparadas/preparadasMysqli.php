<?php 
//Partimos de la base de siempre... creada la conexion...
$conexion = new mysqli('db','root','test','myDBoo');
//!!! El error es connect_errno... no errno a secas
$error = $conexion->connect_errno;

if($error!=null){
    die("Se ha producido un error an intentar crear laconexion a la BBDD. <br>".$conexion->error." Error con número ". $error);
}

//Si no ha dado error se continua con la ejecución del programa.
echo "Se ha establecido la conexión a la base de datos con éxito.<br>";

//Creamos la consulta preparada... En el caso de mysqli con ? -->$conexion->prepare();

$stmt = $conexion->prepare("INSERT INTO Clientes(nombre, apellido, email) VALUES(?,?,?);");
//Detallamos los tipos de datos con bind_param() -->
$stmt->bind_param("sss",$nombre,$apellido,$email);

//Se definen las variables...

$nombre = 'Matias';
$apellido = 'Prats';
$email = 'matias@daw.gal';

//Ejecutamos
$stmt->execute();

//Y podemos volver a ejecutarlo con otros valores --> 

$nombre = 'Loyola';
$apellido = 'Palacio';
$email = 'loyola@daw.gal';

//Ejecutamos
$stmt->execute();

//Si la ejecución llega aquí maravixa

echo "Las inserciones se han realizado con éxito.<br>";

//Debemos cerrar la variable y la conexion 
//Cerramos la varibale
$stmt->close();
echo "Hemos cerrado la variable.<br>";
//Cerramos la conexión
$conexion->close();
echo "Hemos cerrado la conexion.<br>";
?>