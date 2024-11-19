<?php
$sql = "SELECT id, nombre, apellido FROM clientes";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "id: " . $row["id"]. " - Nombre: " . $row["nombre"]. " " . $row["apellido"]. "<br>";
    }
}
else {
  echo "Sin resultados";
}
?>