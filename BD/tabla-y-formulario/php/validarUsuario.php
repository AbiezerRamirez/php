<?php
include('conexion.php');

if (trim($_POST['fName']) == "" || trim($_POST['lName']) == "") {
    header('location: agregarUsuario.php?error=1');
    exit;
} else {
    if (exists('correo', $_POST['mail'], $conexion)) {
        header('location: agregarUsuario.php?error=2');
        exit;
    } else if (exists('usuario', $_POST['user'], $conexion)) {
        header('location: agregarUsuario.php?error=3');
        exit;
    }
    $datos = array(
        trim($_POST['fName']),
        trim($_POST['lName']),
        strtolower($_POST['mail']),
        $_POST['user'],
        $_POST['passwd'],
        $_POST['phone']
    );
    agregarUsuario($datos, $conexion);
    header('location: ../index.php');
    exit;
}