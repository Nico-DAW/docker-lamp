<?php
class MyMiddleWare {
    public function before($params){
        $token=Flight::request()->getHeader('X-Token');
        $sql="SELECT * from usuarios WHERE token=:token";
        $stmt=Flight::db()->prepare($sql);
        $stmt->bindParam(':token', $token);
        $stmt->execute();
        $usuario=$stmt->fetch(PDO::FETCH_ASSOC);
        if (!$usuario) {
            Flight::halt(401, 'Token inválido o usuario no encontrado.');
        }
    
        Flight::set('user', $usuario);
    }
}
?>