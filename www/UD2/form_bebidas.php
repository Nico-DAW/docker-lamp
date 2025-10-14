<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bebidas</title>
</head>
<body>

    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST">
        <select name="bebida">
            <option value="coke">Coca-Cola</option>
            <option value="pepsi">Pepsi</option>
            <option value="fanta">Fanta</option>
            <option value="trina">Trina</option>
        </select>
        <input type="number" name="cantidad" value="cantidad">
        <input type="submit" value="Enviar">
    </form>
    <?php 
        $precio;
        $total;
        $drink=$_POST['bebida'];
        $cantidad=$_POST['cantidad'];
        //echo $drink;
        switch($drink){
            case 'coke': 
                $precio = 1.00; 
                break;
            case 'pepsi': 
                $precio = 0.80; 
                break;
            case 'fanta': 
                $precio = 0.90; 
                break;
            case 'trina': 
                $precio = 1.10; 
                break;
        }

        $total = $precio * $cantidad;
        echo "<p>TOTAL => ".$total."€ </p>"; 
    ?>
</body>
</html>