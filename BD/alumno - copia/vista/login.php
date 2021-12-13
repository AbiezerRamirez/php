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
        }

        form {
            margin-top: 2em;
            border: 1px solid #000;
            padding: 1em;
            text-align: center;
        }

        input, button {            
            padding: .3em;
        }

        input, button {
            margin-top: 1em;
        }

        span {
            margin-top: 1em;
        }
    </style>
</head>
<body>
    <h2>Inicia sesion o registrate</h2>
    <span>Me dio flojera hacer otro formulario asi que se registra con este mismo</span>
    <span>Inserta los datos y presiona registrar para registrarte o login para iniciar sesion</span>
    <span>Tiene que haber una tabla usuarios (user, password) en la BD junto a la tabla alumnos del ejercicio original</span>
    <form action="?l=1" method="POST">
        <label for="user">Usuario:</label>
        <input type="text" name="user" id="user"><br>
        <label for="pass">Contraseña:</label>
        <input type="password" name="pass" id="pass"><br>
        <input type="submit" value="Login">
        <button formaction="?r=1">Registrarse</button>
    </form>
</body>
</html>