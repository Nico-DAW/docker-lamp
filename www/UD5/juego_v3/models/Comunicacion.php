<?php
/**
 * Se encarga de la comunicación con la BBDD para operaciones CRUD
 */
class Comunica{
    private $conn;

    public function __construct(){
        $this->conn = Conexion::singleInst()->getConnection();
    }

    public function getGames(){
        $sql= "SELECT * from juegos";
        $this->conn->exec("USE juegos");
        $stmt = $this->conn->query($sql);

       return  $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>