<?php
require_once('modelo/bd.php');
$gbd = new GBD('alimentos');

function cargarVista($vista) {
    ob_start();
    include_once("vista/$vista.php");
    return ob_get_clean();
}

function mostrarVista() {
    $vistas = array(
        'inicio' => 'inicio',
        'consult' => 'mostrarAlimentos',
        'add' => 'formInsertar',
        'buscarNombre' => 'buscarPorNombre',
        'buscarIde' => 'buscarPorCodigo'
    );

    $layout = cargarVista('diseño');
    
    if (!isset($_REQUEST['controller'])) {
        $content = cargarVista($vistas['inicio']);
    } else {
        $content = cargarVista($vistas[$_REQUEST['controller']]);
    }
    return str_replace('{{content}}', $content, $layout);
}

mostrarVista();


// if(!isset($_REQUEST['c']) || $_REQUEST['c'] =='inicio') {
//     require_once('vista/header.php');
//     require_once('vista/inicio.php');
//     require_once('vista/footer.php');
    
// } else if ($_REQUEST['c'] == 'consult') {
//     require_once('vista/header.php');
//     require_once('vista/mostrarAlimentos.php');
//     require_once('vista/footer.php');
    
// } else if ($_REQUEST['c'] == 'add') {
//     require_once('vista/header.php');
//     require_once('vista/formInsertar.php');    
//     require_once('vista/footer.php');

// } else if ($_REQUEST['c'] == 'buscarNombre') {
//     require_once('vista/header.php');
//     require_once('vista/buscarPorNombre.php');    
//     require_once('vista/footer.php');

// } else if ($_REQUEST['c'] == 'buscarId') {
//     require_once('vista/header.php');
//     require_once('vista/buscarPorCodigo.php');    
//     require_once('vista/footer.php');
// }


$gbd->disconect();