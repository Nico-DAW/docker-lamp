<?php 

//Ejercicio clase estática apuntes: 

class Data
{
private static $calendario = "Calendario gregoriano";
private static $hora;
//private static $data;
private static $instance;

 public static function getData()
 {
 $ano = date('Y'); //Nos da el año actual 
 $mes = date('m');
 $dia = date('d');
 return $dia . '/' . $mes . '/' . $ano;
 }
/* Podriamos utilizarlo para patron singleton

 public static function getInstance(){
    if(self::$instance===null){
        self::$instance = new self();
    }
    return self::$instance;
 }
*/
 public static function getCalendar(){
    //self::getInstance();
    return self::$calendario;
 }

 public static function getHora(){
    //self::getInstance();
    self::$hora = time();
    return self::$hora;
 }

}

$ejFechas = Data::getCalendar();
$ejHoras = Data::getHora();
$ejData = Data::getData();

echo $ejFechas."<br>";
echo $ejHoras."<br>";
echo $ejData."<br>";

/*
  //Método que devuelve la hora actual
  public static function getHora(){
      $hora = date("H:i:s");
      return $hora;
  }
*/

?>