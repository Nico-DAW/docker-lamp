<?php 
// Más de lo mismo... supongamos que la BBDD esta creada --> Creamos una conexion y ejecutamos la query almacenada en una variable
$conexion = mysqli_connect('db','root','test','myDBproc');
if(!$conexion){
    //Ojo aquí  mysqli_connect_error(); va sin argumento... (Dentro parentesis vacio)
    echo "Se ha producido un error al intentar crear la conexión.". mysqli_connect_error();
}
echo "La conexión se ha establecido con éxito<br>";
//Creamos la consulta y la almacenamos en una variable
$sql = "INSERT INTO Clientes (nombre, apellido, email) VALUES ('Juan', 'Perez', 'perez@daw.gal')";

if(mysqli_query($conexion,$sql)){
    echo "Se han insertado los datos en la tabla<br>";
};
//Aqui es mysqli_close($conexion); no --> mysqli_connect_close($conexion);
mysqli_close($conexion);
echo "Se ha cerrado la conexión.";
?>