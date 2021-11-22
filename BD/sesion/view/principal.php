<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principal</title>
</head>
<body>
    <h2>Bienvenido <?php echo $_SESSION['user'];?></h2>
    <a href="controller/logout.php">Cerrar sesion</a>
</body>
</html>