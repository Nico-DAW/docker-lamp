<?php
 $username = '';
 $nombre = '';
 $apellidos = '';
 $contrasena = '';
 $msgs=[];


if(isset($_POST['username'])&&!empty($_POST['username'])){
 $username = $_POST['username'];
}else{
 $msgs[] = "Debe definir un username";
}

if(isset($_POST['nombre'])&&!empty($_POST['nombre'])){
 $nombre = $_POST['nombre'];
}else{
 $msgs[] = "Debe definir un nombre";
}

if(isset($_POST['apellidos'])&&!empty($_POST['apellidos'])){
 $apellidos = $_POST['apellidos'];
}else{
 $msgs[] = "Debe definir unos apellidos";
}


if(isset($_POST['contrasena'])&&!empty($_POST['contrasena'])){
 $contrasena = $_POST['contrasena'];
}else{
 $msgs[] = "Debe definir una contrasena";
}

/* 
A ver... así por defecto no se va a poder hacer... Ya que no se puede enviar arrays directamente a través de la URL


if(!empty($msgs)){
    header('Location:http://localhost/UD3/Anexo2/nuevoUsuarioForm.php?msgs='.$msgs);
    exit();
}

para poder hacerlo es necesario convertir el array en una query string (cadena de consulta) para una URL. Para ello 
podemos emplear la función http_build_query(['msgs'=>$msgs]); Por tanto nos quedaría algo así:
*/

if(!empty($msgs)){
    $query =  http_build_query(['msgs'=>$msgs]);
    header('Location:http://localhost/UD3/Anexo2/nuevoUsuarioForm.php?msgs='.$query);
    exit();
}

/*
Los mensajes los recuperariamos en la vista con un bucle. El código aquí es muy repetitivo y se puede optimizar ver nuevoUsuario2.php
*/