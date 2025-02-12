<?php
    /*
    Aquí esto mal no hace falta
    require_once('../session.php');
    */
    session_start();
    require_once('../utils.php');
    //Pruebas --> echo var_dump($_SESSION);
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $fileUp = $_FILES['formFile'];

    $target_dir = "../files/";
    $target_file = $target_dir . basename($_FILES['formFile']['name']);

    $error = false;
    //verificar nombre
    if (!validarCampoTexto($nombre))
    {
        $error = true;
        echo '<div class="alert alert-danger" role="alert">El campo nombre es obligatorio y debe contener al menos 3 caracteres.</div>';
    }
    //verificar descripcion
    if (!validarCampoTexto($descripcion))
    {
        $error = true;
        echo '<div class="alert alert-danger" role="alert">El campo descripcion es obligatorio y debe contener al menos 3 caracteres.</div>';
    }
    //verificar fichero
    if (isset($fileUp))
    {
        $size = $fileUp['size'];
        $type = strtolower(pathinfo(basename($fileUp['name']), PATHINFO_EXTENSION));

        if ($size > 20000000) {
            $error = true;
            echo '<div class="alert alert-danger" role="alert">El tamaño máximo de archivo es de 20 MB.</div>';
        }
        else if($type != "jpg" && $type != "png" && $type != "pdf")
        {
            $error = true;
            echo '<div class="alert alert-danger" role="alert">El formato del archivo debe ser JPG, PNG o PDF.</div>';
        }
    }
    else
    {
        $error = true;
        echo '<div class="alert alert-danger" role="alert">Debes subir un fichero para el producto.</div>';
    }

    /* El siguiente código estaría bien si no creamos un nombre autogenerado para el archivo subido con bin2hex(random_bytes(8));
    Y empleamos el mismo nombre del archivo subido. Esta forma también permitiría comprobar e impedir que se vuelva a subir 
    un archivo con el mismo nombre

    if (!$error)
    {
        require_once('../modelo/mysqli.php');
        
        //strval($_SESSION['usuario']['id'])
        $resultado = nuevoFichero(filtraCampo($nombre), filtraCampo($fileUp['name']), filtraCampo($descripcion), strval($_SESSION['usuario']['id']));
        if ($resultado[0])
        {
            $_SESSION['usuario']['upMsg'] = '<div class="alert alert-success" role="alert">Fichero guardado correctamente en la BBDD.</div>';
        }
        else
        {
            $_SESSION['usuario']['upMsg'] = '<div class="alert alert-danger" role="alert">Ocurrió un error guardando el fichero en la BBDD: ' . $resultado[1] . '</div>';
        }
        
        if (!file_exists($target_file))
        {
            if (move_uploaded_file($_FILES['formFile']['tmp_name'], $target_file))
            {   
                $_SESSION['usuario']['upFl'] = '<div class="alert alert-success" role="alert">Fichero subido correctamente.</div>';
                header('Location: tarea.php?id=' . $_SESSION['usuario']['id']);
                exit();
                //echo "El fichero ". htmlspecialchars(basename( $_FILES['formFile']['name'])). " se ha sido subido.";
            }
            else
            {   
                
                $_SESSION['usuario']['upFl'] = '<div class="alert alert-danger" role="alert">Hubo un error subiendo el fichero</div>';
            }
        }
        else
        {  
           $_SESSION['usuario']['upFl'] = '<div class="alert alert-danger" role="alert">El fichero ya existe</div>';
        }
    }
    */

    if (!$error)
    {
        require_once('../modelo/mysqli.php');
        
        /*
        strval($_SESSION['usuario']['id']) ---> Este es el id del usuario de la sesion... Y para la consulta necesitamos de la tarea
        Las tablas se relacionan de la siguiente manera del id de la tarea (PK) con id_tarea(FK) de ficheros y usuario con tarea a través de id_usuario de 
        tareas(FK). Por lo tanto ---> 
        */
        $resultado = nuevoFichero(filtraCampo($nombre), filtraCampo($fileUp['name']), filtraCampo($descripcion), $_SESSION['usuario']['tarea']);
        //Esto está, ahora bien, como se muestran las tareas?
        if ($resultado[0])
        {
            $_SESSION['usuario']['upMsg'] = '<div class="alert alert-success" role="alert">Fichero guardado correctamente en la BBDD.</div>';
        }
        else
        {
            $_SESSION['usuario']['upMsg'] = '<div class="alert alert-danger" role="alert">Ocurrió un error guardando el fichero en la BBDD: ' . $resultado[1] . '</div>';
        }
        
        if (!file_exists($target_file))
        {   
            /*A diferencia del caso anterior en nombre del fichero subido debe ser alaetorio según el enunciado, este nombre 
            debe ser generado con bin2hex(random_bytes(8)) -->
            */
            //Seguir Aquí
            $type = strtolower(pathinfo(basename($fileUp['name']), PATHINFO_EXTENSION));
            $nombreAutogenerado = bin2hex(random_bytes(8)) . "." . $type;
            $destPath = $target_dir . $nombreAutogenerado;

            if (move_uploaded_file($_FILES['formFile']['tmp_name'], $destPath))
            {   
                $_SESSION['usuario']['upFl'] = '<div class="alert alert-success" role="alert">Fichero subido correctamente.</div>';
                //header('Location: tarea.php?id=' . $_SESSION['usuario']['id']);
                header('Location: tarea.php?id=' . $_SESSION['usuario']['tarea']);
                exit();
                //echo "El fichero ". htmlspecialchars(basename( $_FILES['formFile']['name'])). " se ha sido subido.";
            }
            else
            {   
                $_SESSION['usuario']['upFl'] = '<div class="alert alert-danger" role="alert">Hubo un error subiendo el fichero</div>';
                //Debug --> echo "Error al subir el fichero";
            }
        }
        /*Esta última comprobación del else se puede omitir porque el nombre de cada file será en principio siempre 
        diferente al ser autogenerado.
        */
        else
        {  
           $_SESSION['usuario']['upFl'] = '<div class="alert alert-danger" role="alert">El fichero ya existe</div>';
           //Debug --> echo "Error al subir el fichero dos";
        }
    }
?>