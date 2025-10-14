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
    $idchar=substr($id,8,1);
    $msg;

    $dniarr=[0=>'T',1=>'R',2=>'W',3=>'A',4=>'G',5=>'M',6=>'Y',7=>'F',8=>'P',9=>'R',10=>'R',11=>'R',12=>'R',13=>'R',14=>'R',15=>'R',16=>'R',17=>'R',18=>'R',2=>'R',18=>'R',20=>'R',21=>'R',22=>'R',23=>'R'];



    echo $idnum."<br>";
    echo $dniarr[1]."<br>";

    if(!ctype_digit($idchar)&&ctype_digit($idnum)){
        /*if(){

        }
        */
        $msg="Número de DNI válido";
    }else{
        $msg="Debe introducir un número de DNI válido";
    }
    return $msg;
}

echo comprobar_dni($inputdni);
?>
</body>
</html>