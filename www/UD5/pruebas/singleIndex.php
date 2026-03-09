<?php 
require_once("classSingleton.php");
$inst = SingCon::singleInst();
//$con = $inst::getConnection();
$inst::creaDB("singleDB");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Se esta creando la BBDD singleDB</p>
</body>
</html>