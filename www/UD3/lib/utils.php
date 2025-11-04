<?php 

function check($campo){
    $campo=htmlspecialchars($campo);
    $campo=trim($campo);
    $campo=stripslashes($campo);
    return $campo;
}

function valida($name, $sname, $age, $district){
    if(!empty($name)&&!empty($sname)&&!empty($age)&&!empty($district)){
        $name=check($name);
        $sname=check($sname);
        $age=check($age);
        $district=check($district);
        $mensaje="Los campos contienen información validada";
        $arr=[true,$mensaje];
    }else{
       if(empty($name)){
        $mensaje="Debe definir un nombre";
        $arr=[false,$mensaje];
       }elseif (empty($sname)){
        $mensaje="Debe definir un apellido";
        $arr=[false,$mensaje];
       }elseif (empty($edad)){
        $mensaje="Debe definir una edad";
        $arr=[false,$mensaje];
       }else{
        $mensaje="Debe definir una provincia";
        $arr=[false,$mensaje];
       }
    }
    return $arr;
}

?>