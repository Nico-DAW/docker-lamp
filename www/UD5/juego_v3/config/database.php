<?php 
/* 
El patrón singleton garantiza que sólo vayamos a tener una 
única instancia de la clase y por lo tanto una única conexión.

Para ello emplearemos propiedades y métodos estáticos.
*/

class Conexion{
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
    
    //Solo públic y no estátic porque la conexión pertence al objeto no a la clase.
    public function getConnection(){
        return self::$con;
    }

    public function creaDB($db){
        try{
            $con = self::$con;
            $sql = "CREATE DATABASE IF NOT EXISTS ".$db;
            $con->exec($sql);
            $this->creaTablas();
        }catch(Exception $e){
            echo "Se ha producido un error al intentar crear la BBDD ".$e->getMessage();
        }
    }

    // Cerramos igualando a null conexion e instancia.

    public static function close(){
        self::$con = null;
        self::$instancia = null; 
    }

    /* 
    Los métodos que vayamos a llamar desde fuera de la clase los declaramos public y con los que vayamos a realizar operaciones internas
    en la clase private. En el ejercicio de Villa Olimpica a continuación de estos métodos definidos se crean métodos privados para la 
    creación de tablas y la inserción de datos.
    */

    private function creaTablas(){
            self::$con->exec("USE juegos");

            $sql = "CREATE TABLE IF NOT EXISTS jugadores(
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(100),
            pass VARCHAR(25),
            rol VARCHAR(25)
            )";
            
            self::$con->exec($sql);

            $sql = "CREATE TABLE IF NOT EXISTS juegos(
            id INT AUTO_INCREMENT PRIMARY KEY,
            titulo VARCHAR(100),
            descripcion VARCHAR(255),
            horas INT,
            id_jugador INT,
            FOREIGN KEY (id_jugador) REFERENCES jugadores(id) ON DELETE CASCADE
            )";
            //execute() mal requiere prepare para consultas con parámetros => exec()
            //self::$con->execute($sql);
            self::$con->exec($sql);
    }

}

?>
