<?php
require_once('model/bd.php');
$gbd = new GBD('login');
session_start();

if (!isset($_SESSION['user'])) {
    if (isset($_REQUEST['l'])) {
        if (trim($_POST['user']) == '' || trim($_POST['pass']) == '') {
            require_once('view/login.php');
            echo '<span style="color: red">Error usuario o contraseña vacia</span>';
        } else {
            if ($gbd->exists('usuarios', 'user', $_POST['user']) && password_verify($_POST['pass'], $gbd->getColumn('usuarios', 'password', 'user', $_POST['user']))) {
                $gbd->disconect();
                header('location: index.php');
                exit;
            } else {
                $gbd->disconect();
                header('location: index.php?error=1');
                exit;
            }
        }
    } else if (isset($_REQUEST['r'])) {
        if (trim($_POST['user']) == '' || trim($_POST['pass']) == '') {
            require_once('view/login.php');
            echo '<span style="color: red">Error usuario o contraseña vacia</span>';
        } else {
            unset($_REQUEST['r']);
            if (!$gbd->exists('usuarios', 'user', $_POST['user'])) {
                $gbd->insertKeyValuesArray('usuarios', array('user' => $_POST['user'], 'password' => $_POST['pass']));
                $gbd->disconect();
                // header('location: index.php?add=1');
                // exit;
            } else {
                $gbd->disconect();
                header('location: index.php?error=2');
                exit;
            }
        }
    } else {
        require_once('view/login.php');
        if (isset($_REQUEST['error'])) {
            if ($_REQUEST['error'] == 1) {
                echo '<span style="color: red">Usuario o contraseña no valido</span>';
            } else if ($_REQUEST['error'] == 2) {
                echo '<span style="color: red">El usuario indicado ya se encuentra registrado</span>';
            }
            unset($_REQUEST['error']);
        } else {
            if (isset($_REQUEST['add'])) {
                echo '<span style="color: green">El usuario hasido registrado correctamente</span>';
            }
        }
    }
} else {
    require_once('view/principal.php');
    $gbd->disconect();
}