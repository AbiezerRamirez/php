<?php
session_start();

$_SESSION['password'] = 'z80';

$user = $_POST["user"];
$pass = $_POST["pass"];

if ($pass == $_SESSION['password']) {
    echo "Bienvenido " . $user;
} else {
    $_SESSION['error'] = 1;
    header('location: inicio.php');
    exit();
}