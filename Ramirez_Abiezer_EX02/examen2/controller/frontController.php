<?php
session_start();
require_once('model/bd.php');

function cargarVista($view)
{
    ob_start();
    // session_start();
    // $user = unserialize($_SESSION['user']);
    $gbd = new GBD('exdiciembre');
    require_once("view/$view.php");
    $gbd->disconect();
    return ob_get_clean();
}

function mostrarVista()
{
    $vistas = array(
        'inicio' => '',
        'changeImg' => 'cambiarImagen',
        'changeAl' => 'cambiarAlias',
        'verNotas' => 'verNotas',
    );

    $layout = cargarVista('diseño');
    if (!isset($_REQUEST['view'])) {
        $content = '';
    } 
    else if (key_exists($_REQUEST['view'], $vistas)) {
        if ($_REQUEST['view'] != 'inicio') {
            $content = cargarVista($vistas[$_REQUEST['view']]);
        } else {
            $content = '';
        }
    }
    else {
        http_response_code(404);
        $content = '<h2 style="text-align: center">ERROR 404: NOT FOUND<h2>';
    }
    return str_replace('{{content}}', $content, $layout);
}

if (!isset($_SESSION['user'])) {
    echo cargarVista('login');
} else {
    echo mostrarVista();
}