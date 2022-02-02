<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        body {
            display: flex;
            align-items: center;
            flex-direction: column;
        }

        h2 {
            margin-top: 4em;
            margin-bottom: 2em;
        }

        form {
            padding: 1em;
            margin-top: 2em;
            text-align: center;
            border: 1px solid #000;
        }

        input,
        button {
            padding: .3em;
        }

        input,
        button {
            margin-top: 1em;
        }

        span {
            margin-top: 1em;
        }
    </style>
</head>

<body>
    <h2>Inicia sesion o registrate</h2>
    <a href="?page=home">Volver al Inicio</a>
    <form action="app/controllers/BackController.php?action=login" method="POST">
        <label for="mail">Correo:</label>
        <input type="email" name="mail" id="mail"><br>
        <label for="pass">Contraseña:</label>
        <input type="password" name="pass" id="pass"><br>
        <input type="submit" value="Inicias Sesion">
        <button formaction="?page=register">Registrarse</button>
    </form>
    <?php

        require_once('app/controllers/errors.php');

        if (isset($_GET['error'])) {
            echo $message['error'][$_GET['error']];
        }
    ?>
</body>

</html>


<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="backController.php" method="post">
        
    </form>
</body>
</html> -->