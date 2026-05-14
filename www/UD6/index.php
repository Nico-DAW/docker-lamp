<?php
//Ejemplo de login. Creo una BBDD en PHPMYDAMIN y la pueblo con 5 registros. 
require_once("flight/Flight.php");

Flight::register('db', 'PDO', array("mysql:host=db;dbname=flightusers","root","test"));

//Ojo a este detalle -> En FlightPHP, Flight::request()->data normalmente se usa para POST/PUT, no para GET.
//Si pones GET aquí no devolverá datos

Flight::route('POST /login',function(){
    $id = Flight::request()->data->id;
    $sql = "SELECT * FROM users WHERE id=:id";
    $stmt = Flight::db()->prepare($sql);
    $stmt->bindParam(":id",$id); 
    $stmt->execute();
    $resultados = $stmt->fetch();
    //Aquí también se podría verificar el password 
    //Algo así como: if ($datos && password_verify($password, $datos['password'])){...}
    //Una vez comprobado que el usuario existe. Se genera un token y se almacena como pide el ejercicio
    if($resultados){
        $token = bin2hex(random_bytes(32));
        $sql = "UPDATE users SET token=:token WHERE id=:id";
        $stmt = Flight::db()->prepare($sql);
        $id = $resultados["id"];
        $stmt->bindParam(":token",$token);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        Flight::json(["Se ha actualizado el token"]);
        return;
    }
    Flight::json(["No hay ususarios con ese id"]);
});

Flight::start();
/*
//Repaso GET con mensaje si no encuentra el registro
require_once("flight/Flight.php");

Flight::register('db', 'PDO', array("mysql:host=db;dbname=dbname","root","test"));

Flight::route('GET /@id',function($id){
    $sql = "SELECT * FROM Modulo WHERE id=:id";
    $stmt = Flight::db()->prepare($sql);
    $stmt->bindParam(":id",$id);
    $stmt->execute();

    $resultado = $stmt->fetchAll();
    if($resultado==null){
        Flight::json("No hay resultados para el id");
        return;
    }
    Flight::json($resultado);
});

Flight::start();

//Repaso DELETE
require("flight/Flight.php");
Flight::register('db', 'PDO', array("mysql:host=db;dbname=dbname","root","test"));

Flight::route('DELETE /',function(){
    $sql = "DELETE FROM Modulo WHERE id=:id";
    $stmt = Flight::db()->prepare($sql);
    $id = Flight::request()->data->id;
    $stmt->bindParam(":id",$id);

    $stmt->execute();
});

Flight::start();
*/

/*
require("flight/Flight.php");

Flight::register('db','PDO',array("mysql:host=db;dbname=dbname","root","test"));


Flight::route('POST /',function(){
    $id = Flight::request()->data->id;
    $nombre = Flight::request()->data->nombre;
    $alias = Flight::request()->data->abreviatura; 

    $sql = "INSERT INTO Modulo (id, nombre, abreviatura) VALUES (:id, :nombre, :abreviatura)";
    $stmt = Flight::db()->prepare($sql);

    $stmt->bindParam(":id",$id);
    $stmt->bindParam(":nombre",$nombre);
    $stmt->bindParam(":abreviatura",$alias);

    $stmt->execute();

    //echo "Apples!!!"; 
});

Flight::start();



First aproach -> 

//Incluimos la librería de flight
require 'flight/Flight.php';

Flight::register('db','PDO',array("mysql:host=db;dbname=dbname","root","test"));

//Defimimos la ruta que vamos a utilizar y la función que vamos a invocar 
Flight::route('GET /', function () {
    // echo 'hello world!';
    $stmt=Flight::db()->prepare("SELECT * FROM Modulo");
    $stmt->execute();
    $datos=$stmt->fetchAll();
    Flight::json($datos);
});

/*
Flight::route('POST /', function() {
    $request = Flight::request();
    Flight::json($request);
});
*/
/*
Flight::route('POST /', function() {
    $id = Flight::request()->data->id;
    $nombre = Flight::request()->data->nombre;
    $abreviatura = Flight::request()->data->abreviatura;

    $sql="INSERT INTO Modulo (id,nombre,abreviatura) VALUES (:id,:nombre,:abreviatura)";
    $stmt=Flight::db()->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":nombre", $nombre);
    $stmt->bindParam(":abreviatura", $abreviatura);
    $stmt->execute();

    Flight::json(["Modulo agragado correctamente"]);
});

//Iniciamos el servicio 
Flight::start();

*/

/*
Ejemplo con GET ->

require ("flight/Flight.php");

Flight::register('db', 'PDO', array("mysql:host=db; dbname=dbname", "root", "test"));

Flight::route('GET /', function(){
    $sql = "SELECT * FROM Modulo";
    $stmt = Flight::db()->prepare($sql);
    $stmt->execute();
    $data = $stmt->fetchAll();

    echo Flight::json($data);
});

Flight::start();
*/ 

/*
Ejemplo con INSERT -> 

require("flight/Flight.php");

Flight::register('db', 'PDO', array("mysql:host=db; dbname=dbname", "root", "test"));

Flight::route('POST /', function(){
    //Para los INSERT necesitamos REQUEST
    $id = Flight::request()->data->id;
    $nombre = Flight::request()->data->nombre;
    $abreviatura = Flight::request()->data->abreviatura; 

    $sql="INSERT INTO Modulo(id,nombre,abreviatura) VALUES(:id,:nombre,:abreviatura)";
    // prepare justo despué de la ssentancia sql... 
    $stmt = Flight::db()->prepare($sql);
    // esto mal -> 
    /*
    Flight::db()->bindParam(':id',$id);
    Flight::db()->bindParam(':id',$nombre);
    Flight::db()->bindParam(':id',$abreviatura);
    */
/*
    $stmt->bindParam(':id',$id);
    $stmt->bindParam(':nombre',$nombre);
    $stmt->bindParam(':abreviatura',$abreviatura);
    $stmt->execute();

    echo "Inserción realizada con éxito.";
});

Flight::start(); 
*/

/*
Ejemplo con DELETE -> 

require("flight/Flight.php");

Flight::register('db', 'PDO', array("mysql:host=db;dbname=dbname", "root", "test"));

Flight::route('DELETE /', function(){
    $id=Flight::request()->data->id;
    $sql="DELETE FROM Modulo WHERE id=?";
    $stmt=Flight::db()->prepare($sql);
    $stmt->bindParam(1,$id);

    $stmt->execute();
    Flight::json(["Se ha elimnado el registro correctamente"]);
});

Flight::start();
*/

/*

require("flight/Flight.php");

Flight::register('db','PDO',array("mysql:host=db;dbname=dbname","root","test"));
Flight::route('PUT /', function(){
    $sort=Flight::request()->data->abreviatura;
    $id=Flight::request()->data->id;
    $sql="UPDATE Modulo SET abreviatura=:abreviatura WHERE id=:id";
    $stmt=Flight::db()->prepare($sql);
    $stmt->bindParam(":abreviatura",$sort); 
    $stmt->bindParam(":id",$id); 
    $stmt->execute();

    Flight::json(["Se ha actualizado el registro"]);
});

Flight::start();


require_once("flight/Flight.php");

Flight::register('db', 'PDO', array("mysql:host=db; dbname=dbname", "root", "test"));

Flight::route('GET /@id',function($id){
    $sql="SELECT * FROM Modulo WHERE id=:id";
    $stmt=Flight::db()->prepare($sql);
    $stmt->bindParam(':id',$id);
    $stmt->execute();
    $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    Flight::json([$datos]);
});

Flight::start();
*/