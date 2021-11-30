<?php
require_once('../modelo/bd.php');
require_once('funciones.php');

$gbd = new GBD();

$nombre = $_REQUEST['nombre'];

if (!trimString($nombre)) {
    $resul = $gbd->buscarNombre($nombre);

    if (sizeof($resul) > 0) {
        include_once('../vista/header.php');
        include_once('../vista/buscarPorNombre.php');
        include_once('../vista/footer.php');
        $gbd->salir();
    } else {
        $gbd->salir();
        header('location: ../index.php?c=bNombre&error=2');
        exit;
    }
} else {
    $gbd->salir();
    header('location: ../index.php?c=bNombre&error=1');
    exit;
}