<?php
session_start();

if($_SERVER["REQUEST_METHOD"]=='POST'){
// echo "Pamplinas!";
$email = $_POST['correo'];
$pass = $_POST['pass'];
$_SESSION['email'] = $email;
/*
$to = $email; 
$subject = "Confirmación de cuenta";
$message = "Gracias por registrarte!";
$headers = "From: noreply@tudominio.com\r\n";
$headers .= "Content-Type: text/html; charset=UTF-8\r\n";

$check = "";

if(mail($to, $subject, $message, $headers)) {
    $check ="Correo enviado correctamente.";
} else {
    $check = "Error al enviar el correo.";
}
*/


$check = "Se han creado las variable de session correctamente";

    header("Location: index.php?mensaje=".$check);
    exit();
}else{
    // header("Location: ".$_SERVER['HTTP_REFERER']);
    header("Location: login.php");
    exit();
}
?>