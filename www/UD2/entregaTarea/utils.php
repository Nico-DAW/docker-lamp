<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UD2. Tarea</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
$almacen=[];
function guardar($title, $content, $progress){
    global $almacen;

    $tarea =[
        //Cuidado aquí con la coma (no es punto y coma...)
        'id'=>$title,
        'descripcion'=>$content,
        'estado'=>$progress
    ];
    //array_push() en PHP es función que se diferencia del .push() de JS en que no le antece el nombre del array... 
    array_push($almacen, $tarea);

    echo "<div class=\"border d-flex align-items-center justify-content-center\" style=\"height: 100vh;\"><div class=\"text-center\"><p>Se ha almacenado la nueva tarea con éxito. </p><a href=\"nuevaForm.php\" class=\"btn btn-primary\">Volver</a></div></div>";
    
    /*
    Pruebas para comprobar el almacenamiento... Se requiere persistencia en los datos de la variable almacen... 
    */
    /*
    echo "<pre>";
    print_r($almacen);
    echo "</pre>";
    */
}
  

?>
</body>
</html>