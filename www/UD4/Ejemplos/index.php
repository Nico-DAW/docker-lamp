<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    echo "Página de Inicio <br>";
    echo "Logueado correctamente";
    ?>
<p> Es administrador? </p>
<?php 
if($_SESSION['rol']=="admin"){
    echo "SI";
}else{
    echo "NO";
}
?>
</body>
</html>