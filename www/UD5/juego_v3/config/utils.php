<?php 

/*
Aquí la comprobación de login así como la definición de las variables de session se hace por medio de este php de 
utilidades. En orientación a objetos se debería de emplear una clase Usuarios y otra clase denominada autorización
que realice las comprobaciones necesarias. Esto se verá en la version v3
*/

session_start();

$usuarios = [
    [
        "Nombre"=>"Pepe",
        "Email"=>"pep@mail.com",
        "Username"=>"P12",
        "Password"=>"1234",
        "Rol"=>"Admin"
    ],

    [
        "Nombre"=>"Maria",
        "Email"=>"maria@mail.com",
        "Username"=>"MA",
        "Password"=>"qwer",
        "Rol"=>"User"
    ]
];

function compruebaSesion(){
    if(!isset($_SESSION['username'])&&empty($_SESSION['username'])){
        header("Location:login.php?mensaje=".urlencode("Se requiere login."));
        exit();
    }
}

function compruebaLogin($username, $password){
 //Comprobamos que los campos se hayan cumplimentado   
 global $usuarios;
 //Aquí pasamos la variable como global pero lo recomendable... es pasara la variable $usuarios como parámetro. 
 if(!empty($username)&&!empty($password)){
    foreach ($usuarios as $usuario){
         if($username == $usuario['Username']&&$password == $usuario["Password"]){
            $_SESSION['username'] = $usuario['Username'];
            $_SESSION['Rol'] = $usuario['Rol'];
            // "Se ha realizado el login con éxito";
            return true;
         }
    }
   
 }else{
    //"Es necesario introducir el usuario y la contraseña."
    return false;
 }
}

?>