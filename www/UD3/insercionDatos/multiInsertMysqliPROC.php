<?php
$conexion = mysqli_connect('db','root','test','myDBproc');

if(!$conexion){
    //Ojo aquí  mysqli_connect_error(); va sin argumento... (Dentro parentesis vacio)
    die("Error al intentar establecer la conexion".mysqli_connect_error());
}

echo "La conexion se ha establecido con éxito";

//Creamos la consulta
$sql ="INSERT INTO Clientes (nombre,apellido,email) VALUES ('Pedro','Machado','pedro@daw.gal');";
$sql .="INSERT INTO Clientes (nombre,apellido,email) VALUES ('Marco','Jimenez','marcos@daw.gal');";
$sql .="INSERT INTO Clientes (nombre,apellido,email) VALUES ('Federico','Rodriguez','fede@daw.gal');";
//Si aquí no pones multi_query no va a funcionar...
if(mysqli_multi_query($conexion,$sql)){
    do{
        $ultimo = mysqli_insert_id($conexion);
        echo "Se ha creado un nuevo registro con id: ".$ultimo."<br>";
        // acordarse next_result()
    }while(mysqli_next_result($conexion));
}

?>