<html>
    <head>
        <title>Welcome to LAMP Infrastructure</title>
        <meta charset="utf-8">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="container-fluid">
            <?php
                echo "<h1>¡Bienvenido!</h1>";
                //$x=1;
                for($x=1; $x<5; $x++){
                    echo "<li>Fila {$x}</li>";
                }
            ?>            
        </div>
    </body>
</html>
