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
            margin-top: 3em;
            margin-bottom: 2em;
        }

        form {
            display: flex;
            flex-direction: column;
            padding: 3em;
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
    </style>
</head>

<body>
    <h2>Registrate</h2>
    <a href="?page=home">Volver al Inicio</a>
    <form action="app/controllers/BackController.php?action=register" method="POST">
        <label for="dni">DNI:</label>
        <input type="text" name="dni" id="dni"><br>
        <label for="user">Usuario:</label>
        <input type="text" name="user" id="user"><br>
        <label for="mail">Correo:</label>
        <input type="email" name="mail" id="mail"><br>
        <label for="direction">Direccion:</label>
        <input type="text" name="direction" id="direction"><br>
        <label for="pass">Contraseña:</label>
        <input type="password" name="pass" id="pass"><br>
        <input type="submit" value="Completar Registro">
        <button formaction="?page=login">Iniciar Sesion</button>
    </form>
</body>
</html>