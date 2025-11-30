<?php
require_once('modelo/pdo.php');
// Como comenté en nuevoUsuario1.php el código es muy repetitivo y se puede optimizar... 
 $username = '';
 $nombre = '';
 $apellidos = '';
 $contrasena = '';
 $msgs=[];

 //var_dump($_POST);

 $required=['username','nombre','apellidos','contrasena'];

 foreach($required as $field){
    if(isset($_POST[$field])&&!empty($_POST[$field])){
        $$field = $_POST[$field];
 }else{
    $msgs[] = "Debe definir un ".$field;
 }
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
    header('Location:http://localhost/UD3/Anexo2/nuevoUsuarioForm.php?'.$query);
    exit();
}

/* 
OJO!!! con -> header('Location:http://localhost/UD3/Anexo2/nuevoUsuarioForm.php?'.$query);
Si después del interrogante metes msgs= -> 'Location:http://localhost/UD3/Anexo2/nuevoUsuarioForm.php?msgs=' no se mostrará el primer valor
porque la query string se estaría creando de forma incorrecta. Es por eso por lo que justo después del ? se concatena directamente la $query.

Los mensajes los recuperariamos en la vista con un bucle. El código aquí es muy repetitivo y se puede optimizar ver nuevoUsuario2.php
*/
$success ='';

if(isset($_GET['edit'])&&!empty($_GET['edit'])){
    //var_dump($_GET['id']);
    $actualizaUsuario = actualizaUsuario($_GET['id'],$username, $nombre, $apellidos, $contrasena);
    $success = http_build_query(['success'=>$actualizaUsuario]);
}else{
    $registraUsuario = nuevoUsuario($username, $nombre, $apellidos, $contrasena);
    $success = http_build_query(['success'=>$registraUsuario]);
};



header('Location:http://localhost/UD3/Anexo2/nuevoUsuarioForm.php?'.$success);
