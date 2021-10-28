<?php
if ($_POST['pass'] == $_COOKIE['password']) {
    echo "Bienvenido " . $_POST['user'];
} else {
    setcookie('error', 1, time()+15*60);
    header('location: inicio.php');
    exit();
}