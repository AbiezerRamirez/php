<?php session_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitas con Sesiones</title>
</head>
<body>
    <?php
    if (empty($_SESSION['visitas'])) {
        $_SESSION['visitas'] = 1;
    } else {
        $_SESSION['visitas'] += 1;
    }
    echo 'Numero se visitas: ' . $_SESSION['visitas'];
    // $_SESSION = [];
    ?>
    <br>
    <a href="visitas2.php">Página 2</a>
</body>
</html>