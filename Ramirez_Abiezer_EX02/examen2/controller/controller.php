<?php
session_start();
require_once('../model/bd.php');
require_once('funciones.php');

$gbd = new GBD('exdiciembre');
$path = '../index.php';
$dni = $_SESSION['dni'];

if ($_REQUEST['action'] == 'changeImg') {
    $path .= cambiarImagen($gbd, $dni);
} else if ($_REQUEST['action'] == 'changeAlias') {
    $path .= cambiarAlias($gbd, $dni);
}

$gbd->disconect();
header('location: ' . $path);
exit;

function cambiarImagen($gbd, $dni)
{
    $avatar = $gbd->executeQueryArray("select avatar from persona where dni = $dni");
    $avatar = $avatar[0]['avatar'];
    $foto = $_FILES['foto'];

    if ($foto['error'] != 4) {
        if ($foto['error'] == 0) {
            if (str_contains($foto['type'], 'image')) {
                $nombreImg = subirFotoServidor($foto, '../recursos/avatar/');
                if (!$nombreImg) {
                    return "?view=changeImg&error=19";

                } else if ($avatar != '') {
                    unlink("../recursos/avatar/$avatar");
                }
                $gbd->updateKeyValuesArray('persona', array('avatar' => "../recursos/avatar . $nombreImg"), "dni = $dni");
                return "?view=changeImg&error=21";
            } else {
                return "?view=changeImg&error=20";
            }
        } else {
            return "?view=changeImg&error=19";
        }
    }
}

function cambiarAlias($gbd, $dni)
{
    if (!trimString($_POST['alAct']) && !trimString($_POST['newAlias']) && !trimString($_POST['newAlias2'])) {
        $alAct = $_POST['alAct'];
        $newAlias = $_POST['newAlias'];
        if (strlen($newAlias) > 3) {
            if ($alAct == $_SESSION['user']) {
                if ($newAlias == $_POST['newAlias2']) {
                    if ($gbd->exists('alias_clave', 'alias', $newAlias)) {
                        return '?view=changeImg&error=1';
                    } else {
                        $_SESSION['user'] = $newAlias;
                        $gbd->updateKeyValuesArray('alias_clave', array('alias' => $newAlias) ,"dni = $dni");
                        return '?view=changeImg&suscces=true';
                    }
                    return '?view=changeImg&error=5';
                }
                return '?view=changeImg&error=7';
            }
            return '?view=changeImg&error=5';
        }
        return '?view=changeImg&error=6';
    }
    return '?view=changeImg&error=8';
}