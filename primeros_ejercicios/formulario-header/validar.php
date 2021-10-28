<?php
$user = $_POST["user"];
$pass = $_POST["pass"];

if ($pass == "z80") {
    echo "Bienvenido " . $user;
} else {
    header('location: inicio.php?error=1');
    exit();
}