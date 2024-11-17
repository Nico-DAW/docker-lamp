<?php 
/* Si en la tabla tenemos algun campo con AUTO_INCREMENT podemos 
consultar cual es el último insert después de realizar la inserción*/

// Por ejemplo en mysqli (oo) lo haríamos de la siguiente manera : 

if($conexion->query($sql)){
    $ultima = $conexion->insert_id;
    echo "Se han insertado los datos en la tabla. Inserción con id: ".$ultima;
}

//En mysqli insert_id es una propiedad o campo del objeto. 

//En mysqli procedimental sería:

if(mysqli_query($conexion,$sql)){
    // En procedimental es una funcion con argumento. 
    $ultima = mysqli_insert_id($conexion);
    echo "Se han insertado los datos en la tabla. Inserción con id: ".$ultima;
}

// Y en PDO sería --> 

$conexion->exec($sql);
// Después de la inserción comprobaríamos con un método
$ultima = $conexion->lastInsertId();
echo "Se han insertado los datos en la tabla. Inserción con id: ".$ultima;

?>