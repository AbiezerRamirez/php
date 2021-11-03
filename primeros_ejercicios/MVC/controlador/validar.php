<?php
session_start();

$pass = $_POST["pass"];

if ($pass == 'z80') {
    $_SESSION['user'] = $_POST['user'];
    echo "Bienvenido " . $_SESSION['user'];
} else {
    $_SESSION['error'] = 1;
    header('location: ../vista/formulario.php');
    exit();
}