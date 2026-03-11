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

    public function logout(){
        session_start();
        session_unset();
        session_destroy();

        header("Location:login.php?mensaje=".urlencode("Se ha realizado el logout satisfactoriamente"));
        exit();
    }
}

?>