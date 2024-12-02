<?php
// 2.Creacion de BBDD con mysqli (procedimental)
//2.1 Establecemos una conexion sin escoger BBDD-->
$conexion = mysqli_connect('db','root','test');
//2.2 Comprobamos con un if() que la contraseña se ha realizado correctamente -->
if(!$conexion){
    die("No se ha podido establecer la conexion " .mysqli_connect_error(). "<br>");
}
echo "La conexion se ha realizado con éxito<br>";
//2.3 Creamos una variable con la instruccion --> 
$sql = "CREATE DATABASE myDBproc";
//2.4 Comprobamos si se puede crear -->
if(mysqli_query($conexion, $sql)){
    echo "Se ha creado la BBDD correctamente<br>";
}else{
    echo "Se ha producido un error al crear la BBDD<br>". mysqli_error($conexion) ."<br>"; 
}
mysqli_close($conexion);
echo "Conexion cerrada"

?>