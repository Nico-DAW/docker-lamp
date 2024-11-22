<?php 
echo "Hoy es " . date("Y/m/d") . "<br>";
echo "Hoy es " . date("Y.m.d") . "<br>";
echo "Hoy es " . date("d-m-Y") . "<br>";
echo "Hoy es " . date("l") . "<br>";

// Para insertar fechas en BBDD podríamos utilizar 

$date = date_create('2000-01-01');
echo date_format($date, 'Y-m-d H:i:s')."<br>";

//strtotime

$date = "2019-05-16";
$timestamp = strtotime($date);
echo $timestamp."<br>"; // Outputs: 1557964800

?>