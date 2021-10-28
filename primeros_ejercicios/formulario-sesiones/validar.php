<?php
session_start();

$_SESSION['password'] = 'z80';
$pass = $_POST["pass"];

if ($pass == $_SESSION['password']) {
    $_SESSION['user'] = $_POST['user'];
    echo "Bienvenido " . $_SESSION['user'];
} else {
    $_SESSION['error'] = 1;
    header('location: inicio.php');
    exit();
}