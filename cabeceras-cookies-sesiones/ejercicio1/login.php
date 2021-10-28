<?php
session_start();

$nombre = 'abiezer';
$contrasena = 'abiezer';

if (!empty($_POST['user']) && !empty($_POST['pass']) && $_POST['user'] == $nombre && $_POST['pass'] == $contrasena) {
    $_SESSION['name'] = $_POST['user'];
    header('location: pagina2.php');
    exit();
} else {
    setcookie('error', 1, time()+15*60);
    header('location: index.php');
    exit();
}
