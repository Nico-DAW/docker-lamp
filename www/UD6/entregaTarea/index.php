<?php
/*
declare(strict_types=1);
*/

require_once 'flight/Flight.php';
// require 'flight/autoload.php';
/*
Flight::route('/', function () {
    echo 'hello world!';
});
*/
$host=$_ENV['DATABASE_HOST'];
$dbname=$_ENV['DATABASE_NAME'];
$user=$_ENV['DATABASE_USER'];
$pass=$_ENV['DATABASE_PASSWORD'];

Flight::register('db', 'PDO', array("mysql:host=$host;dbname=$dbname",$user,$pass));

Flight::route('POST /register', function(){
    //El id y created se generan automáticamente por lo que podemos eliminarlos en el INSERT
    //$id=Flight::request()->data->id;
    $nombre=Flight::request()->data->nombre;
    $email=Flight::request()->data->email;
    $password=password_hash((Flight::request()->data->password), PASSWORD_DEFAULT);

    //$token=Flight::request()->data->token;
    //El token se genera en el proceso de login, no en el momento de registro del usuario... Aqui no -->
    //$token = bin2hex(random_bytes(32));
    //$created=Flight::request()->data->created_at;

    $sql="INSERT INTO usuarios (nombre, email, password) VALUES (:nombre, :email, :password)";

    $stmt=Flight::db()->prepare($sql);
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':password', $password);
    //$stmt->bindParam(':token', $token);

    $stmt->execute(); 

    Flight::jsonp(['Usuario registrado correctamente.']);
});

/*
Flight::route('GET/agenda',function(){


});
*/

Flight::route('/', function () {
    echo 'TAREA UD6 - API AGENDA';
});

Flight::start();
