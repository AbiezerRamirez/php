<?php
require_once('modelo/bd.php');
$gbd = new GBD('alumnos');
session_start();

if (!isset($_SESSION['user'])) {
    if (isset($_REQUEST['l'])) {
        if (trim($_POST['user']) == '' || trim($_POST['pass']) == '') {
            require_once('vista/login.php');
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
    } else if (isset($_REQUEST['r'])) {
        if (trim($_POST['user']) == '' || trim($_POST['pass']) == '') {
            require_once('vista/login.php');
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
        require_once('vista/login.php');
        if (isset($_REQUEST['error'])) {
            if ($_REQUEST['error'] == 1) {
                echo '<span style="color: red">Usuario o contraseña no valido</span>';
            } else if ($_REQUEST['error'] == 2) {
                echo '<span style="color: red">El usuario indicado ya se encuentra registrado</span>';
            }
            unset($_REQUEST['error']);
        } else {
            if (isset($_REQUEST['add'])) {
                echo '<span style="color: green">El usuario se ha registrado correctamente</span>';
            }
        }
    }
} else {
    require_once('controlador/controlador.php');
    $gbd->disconect();
}