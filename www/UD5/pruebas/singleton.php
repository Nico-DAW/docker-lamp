<?php 
class Single{
    //El patrón Singleton sólo requiere que la propiedad de la instancia sea stático. 
   private $conn = null;
   private static $instance = null; 

   private $db = "db";
   private $dbname = "dbname";
   private $user = "root";
   private $pass = "test";

   private function __construct(){
    try{
       $this->conn = new PDO("mysql:host=$this->db;dbname=$this->dbname",$this->user,$this->pass);
       $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
       /* 
       Aquí se podrían crear tablas si fuese necesario. Suponiendo que tuviesemos el método createTables
       definido: $this->createTables(); 

       Ejemplo método crear tablas ->

       private function createTables() {
        // Tabla principal de deportistas
        $sql = "CREATE TABLE IF NOT EXISTS deportistas (
            id INT AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(100) NOT NULL,
            apellidos VARCHAR(100) NOT NULL,
            pais VARCHAR(50) NOT NULL,
            edad INT,
            genero VARCHAR(10),
            medallas_oro INT DEFAULT 0,
            medallas_plata INT DEFAULT 0,
            medallas_bronce INT DEFAULT 0,
            tipo_deporte VARCHAR(50) NOT NULL,
            fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
        self::$conn->exec($sql);
        
        // Tabla específica para Esquiadores
        $sql = "CREATE TABLE IF NOT EXISTS esquiadores (
            deportista_id INT PRIMARY KEY,
            disciplina VARCHAR(50),
            tipo_esqui VARCHAR(50),
            FOREIGN KEY (deportista_id) REFERENCES deportistas(id) ON DELETE CASCADE
        )";
        self::$conn->exec($sql);
        }
        // También se podría crear un método para poblar la tabla. 
       */
    }catch(PDOException $e){
        echo "Se ha producido un error".$e->getMessage();
    }
   }

   public static function getConnection(){
    /* 
    Aquí no compruebas la conexión. Aquí se comprueba la existencia de la instancia
    Lo siguiente daría error: 
    
    if($this->conn==null){
        self::$instance = new self();
    }
    return $this->conn; 
    */
    if(self::$instance == null){
        self::$instance = new self();
    }
    /* 
    En un método estático no se puede usar $this. Se debe devolver la conexión
    desde la instancia creada. Lo sigueinte daría error: 
    return $this->conn;
    */
    return self::$instance->conn;

   }
}
?>