<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="<?php htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="POST">
        Introduce un DNI: <input type="text" name="dni"/><br>
        <input type="submit" value="Enviar"/>
    </form>
<?php 


$inputdni=$_POST['dni'];

function comprobar_dni($id){
    $idnum=substr($id,0,8);
    //Convertir la letra a mayuscula
    $idchar=strtoupper(substr($id,8,1));
    $msg;
    $resto;
    $dniarr=[0=>'T',1=>'R',2=>'W',3=>'A',4=>'G',5=>'M',6=>'Y',7=>'F',8=>'P',9=>'D',10=>'X',11=>'B',12=>'N',13=>'J',14=>'Z',15=>'S',16=>'Q',17=>'V',18=>'H',19=>'L',20=>'C',21=>'K',22=>'E'];
    /*
    Comprobaciones
    echo $idnum."<br>";
    echo $dniarr[1]."<br>";
    */

    if(!ctype_digit($idchar)&&ctype_digit($idnum)){
        //"Número de DNI válido";
        $resto=$idnum%23;
            foreach($dniarr as $key=>$value){ 
                // Comprobaciones --> echo $key." ".$resto." ". $value."<br/>";
                /* 
                    Esta condición se cumple siempre... 
                    if($key===$resto&&$dniarr[$resto]==$value){
                */
                if($key===$resto&&$value==$idchar){
                    $msg="Número de DNI válido";
                    return $msg;
                }else{
                    $msg="La letra del DNI no se corresponde con el número facilitado";
                }
            }
    }else{
        //"Número de DNI inválido";
        $msg="Debe introducir un número de DNI válido";
    }
    return $msg;
}

echo comprobar_dni($inputdni);
?>
</body>
</html>