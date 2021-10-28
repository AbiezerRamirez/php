<?php
setcookie('password', 'z80', time()+15*60);
if (!isset($_GET['error'])) {
    header('location: formulario.php');
    exit();
} else {
    header('location: formulario.php?error=1');
    exit();
}