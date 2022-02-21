<?php
    require_once('app/controllers/ViewController.php');

    !isset ($_SESSION['client']) ? session_start(): NULL;
// mapa del sitio, define todas las vistas que hay en la web
    $map = array(
        'home' => 'inicio',
        'profile' => 'profile',
        'updateProfile' => 'profile',
        'facturas' => 'profile',
        'plato' => 'plato'
    );
// carga de las vistas, determina si una vista existe o no dentro del mapa y si existe la carga utilizando el viewController
    $vc = new ViewController();

    !isset($_REQUEST['page']) ? $requestedPage = 'home' : $requestedPage = $_REQUEST['page'];

    if ($requestedPage != 'login' && $requestedPage != 'register' && $requestedPage != 'nosotros') {
        if (key_exists($requestedPage, $map)) {
            $vc->loadContent($map[$requestedPage]);
        } else {
            http_response_code(404);
            $vc->loadContent('404');
        }

        echo $vc->drawView();
    } else {
        echo $vc->drawSingleView($requestedPage);
    }