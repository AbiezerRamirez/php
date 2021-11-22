<?php
require_once('model/bd.php');
session_start();

if (!isset($_SESSION['user'])) {
    if (isset($_REQUEST['l'])) {
        if (trim($_POST['user']) == '' || trim($_POST['pass']) == '') {
            require_once('view/login.php');
            echo '<span style="color: red">Error usuario o contraseña vacia</span>';
        } else {
            if (validar($_POST['user'], $_POST['pass'], $conexion)) {
                header('location: index.php');
                exit;
            } else {
                header('location: index.php?error=1');
                exit;
            }
        }
    } else {
        require_once('view/login.php');
        if (isset($_REQUEST['error'])) {
            echo '<span style="color: red">Usuario o contraseña no valido</span>';
            unset($_REQUEST['error']);
        } 
    }
} else {
    require_once('view/principal.php');
    $conexion = null;
}