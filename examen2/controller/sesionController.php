<?php
require_once('../model/usuario.php');
require_once('funciones.php');

$path = '../index.php';

if (isset($_POST['user']) && isset($_POST['pass'])) {
    if (!trimString($_POST['user']) && !trimString($_POST['pass'])) {
        $user = new Usuario($_POST['user'], $_POST['pass']);

        if ($_REQUEST['action'] == 'login') {
            $path .= login($user);
        }

        $user->exit();
    } else {
        $path .= '?error=2';
    }
} else if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'logout') {
    session_start();
    $_SESSION = array();
    session_destroy();
} else {
    $path .= '?error=1';
}

header('location: ' . $path);
exit;

function login($user)
{
    if ($user->login()) {
        session_start();
        $_SESSION['user'] = $user->getUser();
        $_SESSION['dni'] = $user->getDNI();
    } else {
        return '?error=4';
    }
}