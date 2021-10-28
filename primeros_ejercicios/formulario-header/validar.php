<?php
$user = $_POST["user"];
$pass = $_POST["pass"];

if ($pass == "z80") {
    echo "Bienvenido " . $user;
} else {
    $error = 1;
    header('location: inicio.php?error=' . $error);
    exit();
}