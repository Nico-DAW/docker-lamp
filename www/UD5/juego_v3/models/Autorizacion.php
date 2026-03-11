<?php 

class Autoriza{
    private static $usuarios;
    //Función que incializa los usuarios
    private static function inicializa(){
        self::$usuarios = [
            new Usuario("P12", "1234", "Admin"),
            new Usuario("MA", "qwer", "User")
        ];
    }

    public static function login($username, $pass){
        self::inicializa();

        foreach(self::$usuarios as $usuario){
            if($usuario->getUsername()==$username && $usuario->getPass()==$pass){
                //session_start();
                $_SESSION['username'] = $username;
                $_SESSION['rol'] = $usuario->getRol();
                return true;
            }
        }
        return false;
    }

    public static function logout(){
        session_start();
        session_unset();
        session_destroy();

        header("Location:login.php?mensaje=".urlencode("Se ha realizado el logout satisfactoriamente"));
        exit();
    }

    //El resto de funciones de comprobación también podríamos definirlas en esta clase
    public static function compruebaSesion(){
        if(!isset($_SESSION['username'])&&empty($_SESSION['username'])){
            header("Location:login.php?mensaje=".urlencode("Se requiere login."));
            exit();
        }
    }

    public static function compruebaAdmin(){
        //var_dump($_SESSION['rol']);
        if($_SESSION['rol'] != "Admin"){
            header("Location:index.php?mensaje=".urlencode("Se requiere ser administrador."));
            exit();
        }
    }
}

?>