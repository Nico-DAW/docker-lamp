<?php 
require("abstractaVolumen.php");
require ("singleton.php");
$caja = new Cubo("Box","Cubo1","Rosa");
echo "El nombre del volumen es: ".$caja->getNombre()." y el color es: ". $caja->getColor();

$conn = Single::getConnection();
$sql ="SELECT * FROM Modulo";

/*
exec solo para INSERT, DELETE, UPDATE. Lo siguiente daría error:
$stmt = $conn->exec($sql);
*/
//query para SELECTS . Opción más segura prepare + execute y despues fetchAll
$stmt = $conn->query($sql);
$resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

var_dump($resultados);

?>