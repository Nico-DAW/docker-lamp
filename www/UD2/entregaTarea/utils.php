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
function guardar($title, $content, $progress){
    /*
    El punto 7.2 del enunciado de la tarea requiere que: 
    Filtrar el contenido de un campo para que no contenga caracteres especiales, espacios en blanco duplicados, etc. Recibe la variable y la devuelve filtrada.

    Para ello creamos una función... Que ya se ha visto en los apuntes... 
    */

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    
    $contenido = test_input($content);

    /*
    7.3 Comprobar que un campo contiene información de texto válida, devolviendo true si se cumplen todos los requisitos o false si no es así. Deberá filtrar con
    la función anterior previamente antes de comprobar si es válido.
    */
    
    $titulo = test_input($title);
     
    /* Creamos una funcion que filtra para asegurarnos que solo se trata de texto y espacios: */

    function validarTexto($texto) {
        if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$/", $texto)) {
            return false;
        }
         // Si pasa todas las validaciones, devolvemos true
    return true;
    }

    // Empleamos la función
    
    validarTexto($titulo);

    /*
    7.4 Guardar una tarea de forma simulada (se añade al array). Deberá hacer uso de las función de filtrado para no guardar información no válida y devolver true 
    simulando que se guarda o false si no se valida algún campo. Recibirá los 3 campos y creará un array clave-valor para la tarea, que almacenará en el array global.
    */
    
    $tarea =[
        //Cuidado aquí con la coma (no es punto y coma...)
        'id'=>$titulo,
        'descripcion'=>$contenido,
        'estado'=>$progress
    ];
    
    //array_push() en PHP es función que se diferencia del .push() de JS en que no le antece el nombre del array... 
    //Añadimos al array global $_SESSION['almacen'] los argumentos testados --> 
    array_push($_SESSION['almacen'], $tarea);
    echo "<div class=\"border d-flex align-items-center justify-content-center\" style=\"height: 100vh;\"><div class=\"text-center\"><p>Se ha almacenado la nueva tarea con éxito. </p><a href=\"nuevaForm.php\" class=\"btn btn-primary\">Volver</a></div></div>";
     /*
    1. Uso de $_SESSION
    La forma más sencilla y efectiva de mantener datos entre diferentes páginas es utilizar la sesión de PHP. Para hacer esto, debes iniciar la sesión donde necesites acceder a la variable.

    Al inicio de tu archivo, inicia la sesión usando session_start().
    Almacena el array en $_SESSION.
    */

    /*
    Pruebas para comprobar el almacenamiento... Se requiere persistencia en los datos de la variable almacen... 
    */
    echo "<pre>";
    print_r($_SESSION['almacen']);
    echo "</pre>";
}
/* 
7.1 -- Función que devuelve lista de tareas. Estarán previamente almacenadas en una variable global de tipo array (en este caso $_SESSION['almacen'])  que contenga en cada posición
a su vez un nuevo array para cada tarea (formato clave valor), que contenga: id, descripcion, estado (pendiente, en proceso o completada).
*/
function mostrarAlmacen(){
        foreach($_SESSION['almacen'] as $tarea){
            echo '<tr>';
            echo '<td>'.$tarea['id'].'</td>';
            echo '<td>'.$tarea['descripcion'].'</td>';
            echo '<td>'.$tarea['estado'].'</td>';
            echo '</tr>';
        }
}
  

?>
</body>
</html>