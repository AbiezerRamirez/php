<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <form action="validar.php" method="post">
        <label for="user">Nombre: </label>
        <input type="text" id="user" name="user" required><br>
        <label for="pass">Contraseña: </label>
        <input type="password" name="pass" id="pass" required><br>
        <input type="submit" value="Iniciar Sesión">
    </form>
    <?php
        if (isset($_COOKIE['error'])) {
            echo '<span style="color: red">Error contraseña no valida</span>';
            setcookie('error','',time()-1);
        }
    ?>
</body>

</html>