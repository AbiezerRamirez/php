<?php
session_start();
$_SESSION['nombre'] = 'Abiezer';
$_SESSION['info'] = array('profesion' => 'Nada', 'edad' => '21');

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo $_SESSION['nombre']; ?>
    <br>
    <a href="sesion01pag2.php">Página 2</a>
</body>
</html>