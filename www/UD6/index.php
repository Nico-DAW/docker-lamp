<?php

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