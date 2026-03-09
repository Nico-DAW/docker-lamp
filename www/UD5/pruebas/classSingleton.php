<?php 

/* 
El patrón singleton garantiza que sólo vayamos a tener una 
única instancia de la clase y por lo tanto una única conexión.

Para ello emplearemos propiedades y métodos estáticos.
*/

class SingCon{
    private static $con;
    private static $instancia = null;
    private static $servername = "db";
    private static $username = "root";
    private static $password = "test";
    private static $charset = "utf8mb4";
    
    // En el patrón Singleton el constructor es privado.
    private function __construct(){
        try{
            //A las propiedades staticas accedemos con self::
            self::$con = new PDO("mysql:host=".self::$servername.";charset=".self::$charset,self::$username,self::$password);
            self::$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch(PDOException $e){
            die("Se ha producido un error al intentar conectarse a la BBDD ".$e->getMessage());
        }
    }

    /*
    
    */
    // Esto es lo que garantizará que sólo se cree una instancia. 
    public static function singleInst(){
        if(self::$instancia === null){
            self::$instancia = new self();
        }
        return self::$instancia; 
    }

    public static function getConnection(){
        return self::$con;
    }

    public static function creaDB($db){
        try{
            $con = self::$con;
            $sql = "CREATE DATABASE IF NOT EXISTS ".$db;
            $con->exec($sql);
        }catch(Exception $e){
            echo "Se ha producido un error al intentar crear la BBDD ".$e->getMessage();
        }
    }
}

?>