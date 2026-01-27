<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h2>Ejemplo Formulario Subida Archivo </h2>

<form action = "subirArchivo.php" method = "POST" enctype = "multipart/form-data">
    <label for = "nombre"> Nombre: </label><br>
        <input type = "text" name = "nombre" id ="nombre"><br>
    <label for = "imagen"> Sube una imagen </label><br>
        <input type = "file" name = "uploadImage" id="uploadImage"><br>
        <input type = "submit" name = "enviar" value="Enviar">

</form>

<?php 
    $target_dir = "uploads/";
    $target_file = $target_dir.basename($_FILES["uploadImage"]["name"]);
    $file_type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Pruebas ---------
    // echo $target_file; 
    // echo $file_type;

    // print_r($_FILES["uploadImage"]);

    //var_dump($_FILES["uploadImage"]);
    
    if(!file_exists($target_file)){
        if($_FILES["uploadImage"]["size"]>50000){
            echo "El archivo no puede ser mayor de 50000 KB";
        }else{
            if($file_type!="png"){
                echo "El archivo debe ser png";
            }else{
                if(move_uploaded_file($_FILES["uploadImage"]["tmp_name"], $target_file)){
                //Recordar que es necesario dar permisos a de escritura a la carpeta a la que se vaya a subir el archivo --> chmod 777 uploads
                echo "El fichero ".htmlspecialchars(basename($_FILES["uploadImage"]["name"])). "ha sido subido satisfactoriamente";
                }else{
                    echo "Se ha producido un error al intentar subir el archivo.";
                }
            }
        }
    }else{
        echo "El archivo ya existe";
    }

?>
    
</body>
</html>