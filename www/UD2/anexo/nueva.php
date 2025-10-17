<?php
$arr=[];
$mensaje="";
$description=$_POST['descripcion']??null;
$flow=$_POST['estado']; 
$verify=false;

function check($campo){
    $campo=htmlspecialchars($campo);
    $campo=trim($campo);
    $campo=stripslashes($campo);
    return $campo;
}

function valida($description, $flow){
    if(!empty($description)&&!empty($flow)){
        $description=check($description);
        $estado=check($flow);
        $mensaje="Los campos contienen información validada";
        $arr=[true,$mensaje];
    }else{
       if(empty($description)){
        $mensaje="Debe definir un descripción";
        $arr=[false,$mensaje];
       }else{
        $mensaje="Debe definir un estado";
        $arr=[false,$mensaje];
       }
    }
    return $arr;
}

$arr=valida($description, $flow);

$verify=$arr[0];
$mensaje=$arr[1];

header("Location: http://localhost/UD2/anexo/nuevaForm.php?mensaje=".urlencode($mensaje));
exit();
?>