<?php include('php/conexion.php'); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="./css/materialize.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
    <!-- Js -->
    <script src="./js/materialize.js"></script>
    <title>Ejercicio 7</title>
</head>

<body>
    <h2 class="cyan-text lighten-3">Usuarios Registrados</h2>
    <form id="agregar" action="php/agregarUsuario.php">
        <?php
        mostrarUsuarios($conexion);
        ?>
        <button class="btn waves-effect waves-light" form="agregar" type="submit" value="Agregar Usuario">Agregar Usuario
            <i class="material-icons right">send</i>
        </button>
    </form>
</body>

</html>