<?php
session_start();
require_once('modelo/bd.php');

function cargarVista($vista)
{
    ob_start();
    $gbd = new GBD('alimentos');
    require_once("vista/$vista.php");
    $gbd->disconect();
    return ob_get_clean();
}

function mostrarVista()
{
    $vistas = array(
        'inicio' => 'inicio',
        'consult' => 'mostrarAlimentos',
        'add' => 'formInsertar',
        'buscarNombre' => 'buscarPorNombre',
        'buscarId' => 'buscarPorId',
        'mod'   => 'modificar',
        'delete' => 'eliminar'
    );

    $layout = cargarVista('diseño');
    if (!isset($_REQUEST['controller'])) $content = cargarVista('inicio');
    else if (key_exists($_REQUEST['controller'], $vistas)) $content = cargarVista($vistas[$_REQUEST['controller']]);
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