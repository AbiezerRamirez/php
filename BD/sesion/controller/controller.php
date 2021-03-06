<?php
require_once('model/bd.php');
$gbd = new GBD('login');
session_start();

// compruba que no se haya definido el usuario de la sesion

if (!isset($_SESSION['user'])) {
    
    // evalua el tipo de operaicion del formulario L intenta iniciar sesion y R intenta registrar un nevo usuario
    
    // INICIAS SESION
    if (isset($_REQUEST['l'])) {
        if (trim($_POST['user']) == '' || trim($_POST['pass']) == '') {
            require_once('view/login.php');
            echo '<span style="color: red">Error usuario o contraseña vacia</span>';
        } else {
            if ($gbd->exists('usuarios', 'user', $_POST['user'])) {
                $password = $gbd->executeQueryArray('select password from usuarios where user = \'' . $_POST['user'] . "'");
                if(password_verify($_POST['pass'], $password[0]['password'])) {
                    $_SESSION['user'] = $_POST['user'];
                    $gbd->disconect();
                    header('location: index.php');
                    exit;
                }
            }
            $gbd->disconect();
            header('location: index.php?error=1');
            exit;
        }
        // REGISTRARSE
    } else if (isset($_REQUEST['r'])) {
        if (trim($_POST['user']) == '' || trim($_POST['pass']) == '') {
            require_once('view/login.php');
            echo '<span style="color: red">Error usuario o contraseña vacia</span>';
        } else {
            unset($_REQUEST['r']);
            if (!$gbd->exists('usuarios', 'user', $_POST['user'])) {
                $gbd->agregarUsuario($_POST['user'], password_hash($_POST['pass'], PASSWORD_DEFAULT));
                $gbd->disconect();
                header('location: index.php?add=1');
                exit;
            } else {
                $gbd->disconect();
                header('location: index.php?error=2');
                exit;
            }
        }
    } else {

        // Imprime de nuevo el login mostrando un mensaje con lo que el usuario hizo mal
        
        require_once('view/login.php');
        if (isset($_REQUEST['error'])) {
            if ($_REQUEST['error'] == 1) {
                echo '<span style="color: red">Usuario o contraseña no valido</span>';
            } else if ($_REQUEST['error'] == 2) {
                echo '<span style="color: red">El usuario indicado ya se encuentra registrado</span>';
            }
            unset($_REQUEST['error']);
        } else {

            // Muestra un mensaje si el usuario se registro correctamente

            if (isset($_REQUEST['add'])) {
                echo '<span style="color: green">El usuario se ha registrado correctamente</span>';
            }
        }
    }
} else {

    // incluye la pagina principal si el usuario inicia sesion
    
    require_once('view/principal.php');
    $gbd->disconect();
}