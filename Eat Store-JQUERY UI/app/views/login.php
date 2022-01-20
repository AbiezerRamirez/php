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
        <label for="user">Correo:</label>
        <input type="text" name="user" id="user"><br>
        <label for="pass">Contraseña:</label>
        <input type="password" name="pass" id="pass"><br>
        <input type="submit" value="Inicias Sesion">
        <button formaction="?page=register">Registrarse</button>
    </form>
    <?php
    // $errores = array(
    //     1 => 'Usuario y contraseña no definidos',
    //     'Usuario o contraseña vacios al enviar el formulario',
    //     'El usuario indicado ya esta en uso',
    //     'Usuario o contraseña incorrectos'
    // );

    // if (isset($_REQUEST['error']) && key_exists($_REQUEST['error'], $errores)) {
    //     echo '<span style="color: red">' . $errores[$_REQUEST['error']] . '</span>';
    // } else if (isset($_REQUEST['succes']) && $_REQUEST['succes'] == 1) {
    //     echo '<span style="color: green">Usuario registrado con exito</span>';
    // }
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