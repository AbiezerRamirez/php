<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitas3</title>
</head>
<body>
    <?php
    echo 'Numero se visitas: ' . $_SESSION['visitas'];
    ?>
    <br>
    <a href="visitas.php">Página de Inicio</a>
    
</body>
</html>