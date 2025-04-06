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

Flight::register('db', 'PDO', array("mysql:host=$host,dbname=$dbname",$user,$pass));

Flight::route('GET/agenda',function(){


});

Flight::route('/', function () {
    echo 'TAREA UD6 - API AGENDA';
});

Flight::start();
