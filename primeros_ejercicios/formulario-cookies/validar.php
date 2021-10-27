<?php
setcookie('user', $_POST["user"], time()+15);
setcookie('password', $_POST["pass"], time()+15);


if ($_COOKIE['password'] == "z80") {
    echo "Bienvenido " . $_COOKIE['user'];
} else {
    header('location: formulario.html');
}