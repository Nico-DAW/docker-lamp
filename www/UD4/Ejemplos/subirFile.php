<?php 
$target_dir="uploads/";
//Función para comprobar si existe la carpeta de uploads.
if(!is_dir($target_dir)){
    // En el caso de que la carpeta no exista la creamos con los permisos necesarios. 
    mkdir($target_dir, 0777, true);
}

if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_FILES["fileToUpload"])){
    // echo "Apples!";
    $target_file = $target_dir.basename($_FILES["fileToUpload"]["name"]);

    if(!file_exists($target_file)){
        /* 
        En este punto se podrían hacer otro tipo de comprobaciones como las siguientes
              if ($_FILES["fileToUpload"]["size"] > 500000)
      {
          if (
            $imageFileType != "jpg"
            && $imageFileType != "png"
            && $imageFileType != "jpeg"
            && $imageFileType != "gif" )
          {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file))
            {
        */
        move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],$target_file);
        /*
        Tener en cuenta un par de cuestiones: 

        1. Las propiedades de $_FILES[] son: 
            - $_FILES["..."]["name"]
            - $_FILES["..."]["size"]
            - $_FILES["..."]["tmp_name"]
            - $_FILES["..."]["error"]
            - $_FILES["..."]["type"]

        2. Para obtener la extensión del archivo: 
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        3. Ver ejemplo apuntes Anxo
        */
        echo "El fichero se ha subido correctamente"; 
    }else{
        echo "El fichero ya existe";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- Aquí el action es necesario meterlo entre comillas -->
    <form action="<?php $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload"/>
        <input type="submit" name="Enviar" id="enviar" value="Enviar"/>
    </form>
</body>
</html>