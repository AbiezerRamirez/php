<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        form {
            width: 15vw;
            padding: 1rem;
            border: 1px solid #000;
            text-align: center;
        }

        input[type="submit"] {
            margin-top: 1rem;
        }
    </style>
</head>
<body>
    <form action="login.php" method="post">
        <label for="user">Ususario</label>
        <input type="text" id="user" name="user" ><br>
        <label for="pass">Contraseña</label>
        <input type="password" name="pass" id="pass" ><br>
        <input type="submit" value="Iniciar Sesion">
    </form>
    <?php 
    if (isset($_COOKIE['error'])) {
        echo '<span style="color: red">Error usuario o contraseña no valida</span>';
        setcookie('error', 1, time()-1);
    } 
    ?>
</body>
</html>