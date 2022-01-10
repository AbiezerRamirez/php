<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>App</title>
</head>
<body>
    <header>
        <?php 
            $dni = $_SESSION['dni'];
            $user = $gbd->executeQueryArray("select * from persona where dni = $dni");
            $user = $user[0];
        ?>
        <a href="?view=changeImg">
            <img src="<?php echo str_replace('../', '',$user['avatar']) ?>" alt="" width="100">
        </a>
        <a href="?view=changeAl">Cambiar Alias</a>
        <a href="?view=verNotas"">Ver notas 
            <?php 
            if ($user['tipo'] == 1) {
                echo 'Profesor';
            } else {
                echo 'Alumno';
            }
            ?>
        </a>
        <a href="controller/sesionController.php?action=logout">Cerrar Sesion <?php echo $user['Nombre'] . $user['Apellido1'] ?></a>

    </header>
    <main>
        {{content}}
    </main>
</body>
</html>
