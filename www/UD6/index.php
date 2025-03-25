<?php
/*
declare(strict_types=1);

require_once 'flight/Flight.php';
// require 'flight/autoload.php';

Flight::route('/', function () {
    echo 'hello world!';
});

Flight::start();
*/
require_once 'flight/Flight.php';

$host = $_ENV['DATABASE_HOST'];
$dbname = $_ENV['DATABASE_TEST'];
$user = $_ENV['DATABASE_USER'];
$password = $_ENV['DATABASE_PASSWORD'];

Flight::register('db', 'PDO', array("mysql:host=$host;dbname=$dbname",$user, $password));
/*
Flight::route('GET /clientes', function(){
    $stm = Flight::db()->prepare("SELECT * from clientes");
    $stm->execute();
    $datos = $stm->fetchAll();
    Flight::json($datos);
});
*/
Flight::route('GET /clientes(/@id)', function($id=null){
    if($id){
        $stm = Flight::db()->prepare("SELECT * from clientes WHERE id = :id");
        $stm->bindParam(':id',$id);
        $stm->execute();
        $datos = $stm->fetch();
    }else{
        $stm = Flight::db()->prepare("SELECT * from clientes");
        $stm->execute();
        $datos = $stm->fetchAll();
    }
        Flight::json($datos);
});

Flight::start();
