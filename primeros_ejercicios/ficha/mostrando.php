<?php
include 'funciones.php';

$arrayImagenes = generarArrayImagenes();
$arrayRutas = [];
$err = false;

if (sizeof($arrayImagenes) == 0) {
        include 'misdatos.html';
} else {
    foreach ($arrayImagenes as $clave => $valor) {
        if ($valor['error'] != 0) {
            comrpobarError($valor['error']);
            if ($valor['error'] == 1) {
                $err = true;
                break;
            }
        } else if (!str_contains($valor['type'], 'image')) {
            echo 'ERROR El archivo subido no es una imagen';
            $err = true;
            break;
        } else {
            $rutaImg = 'fotoservidor/' . basename($valor['name'], ".jpg") . time() . ".jpg";
            if (move_uploaded_file($valor['tmp_name'], $rutaImg)) {
                array_push($arrayRutas, $rutaImg);
            }
        }
    }
    if (!$err) {
        tabla(sizeof($arrayRutas), $arrayRutas);
    } else {
        include 'misdatos.html';
    }
}