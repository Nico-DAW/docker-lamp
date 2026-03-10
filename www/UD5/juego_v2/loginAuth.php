<?php 
require_once("config/utils.php");
/* 
Las funciones de compruebaSesion y compruebaLogin se pueden seguir manteniendo en utils.php. En el 
primero de los casos tiene más sentido porque se comprobará en todas las páginas si $_SESSION['username']
existe. En el segundo caso es una comprobación más exclusiva de loginAuth.php por lo que se podría eliminar 
y hacer la comprobación directamente en la página. Pero bueno... como ya está hecha trabajo que me ahorro.
*/
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(compruebaLogin($_POST['username'], $_POST['pass'])){
        header("Location:index.php?mensaje=".urlencode("Usuario logueado correctamente."));
        exit();
    }else{
        header("Location:login.php?mensaje=".urlencode("Se requiere login."));
        exit();
    }
}
?>