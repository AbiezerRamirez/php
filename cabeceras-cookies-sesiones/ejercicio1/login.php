<?php
// session_start();

// print_r($_POST);
/* isset($_POST['user']) && isset($_POST['pass']) && $_POST['user'] != '' && $_POST['pass'] != '' */
if (!empty($_POST['user']) && !empty($_POST['pass'])) {
    $user = $_POST['user'];
    $password = $_POST['pass'];
    echo $user;
    echo $password;
} else {
    echo '<font color="red">Error al iniciar sesion</font>';
}

if (!isset($user) && !isset($password)) {
    header('location: index.html');
}
