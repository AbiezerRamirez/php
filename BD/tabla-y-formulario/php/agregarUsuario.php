<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="../css/materialize.css">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined" rel="stylesheet">
    <!-- Js -->
    <script src="../js/materialize.js"></script>
    <title>Nuevo Usuario</title>
</head>

<body>
    <a class="waves-effect waves-light btn" href="../index.php"><i class="material-icons-outlined left">arrow_back</i>Volver al inicio</a>
    <h2 class="cyan-text lighten-3">Agregar Usuario</h2>
    <div class="row">
        <form id="form1" class="col s12" action="validarUsuario.php" method="post">
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons-outlined prefix">badge</i>
                    <input class="validate" type="text" id="fName" name="fName" required minlength="1" maxlength="30" pattern="[A-Za-z\sñÑ]{1,}" title="Solo letras y maximo 30 caracteres">
                    <label for="fName">Nombre</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons-outlined prefix"></i>
                    <input class="validate" type="text" id="lName" name="lName" required minlength="1" maxlength="80" pattern="[A-Za-z\sñÑ]{1,}" title="Solo letras y maximo 80 caracteres">
                    <label for="lName">Apellidos</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons-outlined prefix">email</i>
                    <input class="validate" type="email" name="mail" id="mail" required minlength="1" maxlength="100" pattern="[\w.%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$">
                    <label for="mail">Correo</label>
                </div>

            </div>
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons-outlined prefix">account_circle</i>
                    <input class="validate" type="text" name="user" id="user" required minlength="1" maxlength="20" pattern="[a-zA-Z0-9_-ñÑ]{1,}" title="Solo se admiten letras números, - y _">
                    <label for="user">Usuario</label>
                </div>
                <div class="input-field col s6">
                    <i class="material-icons-outlined prefix">password</i>
                    <input class="validate" type="password" name="passwd" id="passwd" required minlength="5" maxlength="20" pattern="[\wñÑ]{5,}" title="Solo letras números y _">
                    <label for="passwd">Contraseña</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <i class="material-icons-outlined prefix">phone</i>
                    <input class="validate" type="number" name="phone" id="phone" required min="0" pattern="[0-9]{1,10}" title="maximo 10 caracteres">
                    <label for="phone">Telefono</label>
                </div>
            </div>
        </form>
        <button class="btn waves-effect waves-light" type="submit" form="form1" value="Registrar">Registrar
            <i class="material-icons right">send</i>
        </button>
    </div>
    <?php
    if (isset($_GET['error'])) {
        if ($_GET['error'] == 1) echo '<span style="color: red">Error cadena vacia al enviar el formulario</span>';
        if ($_GET['error'] == 2) echo '<span style="color: red">El correo indicado ya se encuentra registrado</span>';
        if ($_GET['error'] == 3) echo '<span style="color: red">El usuario indicado ya se encuentra en uso</span>';
    }
    ?>
</body>

</html>