<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Ejercicio Ciudades</h1>
    <?php 
    $informacion="Tokyo,Japan,Asia;Mexico City,Mexico,North America;New York City,USA,North America;Mumbai,India,Asia;Seoul,Korea,Asia;Shanghai,China,Asia;Lagos,Nigeria,Africa;Buenos Aires,Argentina,South America;Cairo,Egypt,Africa;London,UK,Europe";
    $filas=explode(";",$informacion);
    print_r($filas);
    $asoc=[];
    for($x=0; $x<count($filas)-1; $x++){
        print_r($filas[$x]);
        echo "<br>";
        $one=explode(",",$filas[$x]);
        /*
        Esto está mal no se puede []=...=>...;
        Y además está mal planteado. Tendría que ser con one[]
        $asoc[]=$filas[0]=>[$filas[1],$filas[2]];
        */
        $asoc[$one[0]]=[$one[1],$one[2]];
    }
    // var_dump($asoc);
    ?>
    <table>
        <thead>
            <tr>
                <th>Ciudad</th>
                <th>País</th>
                <th>Continente</th>
            </tr>
        </thead>
        <tbody>
            
                <!--<td><?php echo $filas[0]?></td>-->
                <?php
                    foreach($asoc as $key=>$info){
                        echo "<tr><td>".$key."</td><td>".$info[0]."</td><td>".$info[1]."</td></tr>";
                    }
                ?>
          
        </tbody>
    </table>
</body>
</html>