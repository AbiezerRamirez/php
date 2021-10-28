<?php
if ($_POST['pass'] == $_COOKIE['password']) {
    echo "Bienvenido " . $_POST['user'];
} else {
    header('location: inicio.php?error=1');
    exit();
}