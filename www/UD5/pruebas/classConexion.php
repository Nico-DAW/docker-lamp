<?php 
class DataClass{
    /* 
    Esto podría hacerse de varias maneras... Partamos de la base
    propiedades privadas, métodos publicos. 
    */

    private $servername = "db";
    //private $dbname;
    private $username = "root";
    private $password = "test";  
    private $conPDO;

    public function __construct(){
        /* 
        Moejoras --> Esto debemos hacerlo dentro de un bloque try/catch como se ha hecho en el método de abajo.
        Falta el charset -> "mysql:host=".$this->servername.";charset=utf8mb4"
        */
        $this->conPDO = new PDO("mysql:host=".$this->servername, $this->username, $this->password);
        $this->conPDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //$sql = "CREATE DATABASE IF NOT EXISTS ".$this->dbname;
    }

    public function creaDB($dbname){
        try{
            $con = $this->conPDO;
            //"classDB"
            $sql = "CREATE DATABASE IF NOT EXISTS ".$dbname;
            $con->exec($sql);
        }catch(Exception $e){
            echo "Se ha producido un error al intentar crear la BBDD ".$e->getMessage();
        }
    }

    /*
    Mejoras --> Si se va a usar la conexión en otras clases podríamos crear un método para devolver la connexión

    public function getConnection(){
        return $this->conPDO;
    }
    */
    /* 
    Conclusion --> Todo esto es muy bonito pero aquí lo que rules es 
    el patrón Singleton que garantiza que sólo vayamos a tener una conexión (una única instancia de la clase)
    */
}
?>