<?php
require_once('../modelo/bd.php');
require_once('funciones.php');

$gbd = new GBD();

$alimento = array($_POST['nombre'], $_POST['energia'], $_POST['proteina'], $_POST['hc'], $_POST['fibra'], $_POST['grasa']);

if (!trimArray($alimento)) {
    if (arrayNumeric(array($_POST['energia'], $_POST['proteina'], $_POST['hc'], $_POST['fibra'], $_POST['grasa']))) {
        $gbd->insertar($alimento);
        $gbd ->salir();
        header('location: ../index.php');
        exit;
    }
    $gbd ->salir();
    header('location: ../index.php?c=add&error=2');
    exit;
}

$gbd ->salir();

header('location: ../index.php?c=add&error=1');
exit;