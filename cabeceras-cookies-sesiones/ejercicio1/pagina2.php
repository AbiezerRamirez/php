<?php session_start() ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina 2</title>
</head>
<body>
    <p style="color: green">Ha iniciado sesion correctamente <?php echo $_SESSION['name']; ?></p>
    <a href="pagina3.php">Pagina 3</a>
</body>
</html>