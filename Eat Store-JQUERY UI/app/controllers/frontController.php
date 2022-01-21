<?php
    require_once('app/controllers/ViewController.php');

    $map = array(
        'home' => 'inicio',
        // 'login' => 'login',
        // 'register' => 'register'
    );

    $vc = new ViewController();

    !isset($_REQUEST['page']) ? $requestedPage = 'home' : $requestedPage = $_REQUEST['page'];

    if ($requestedPage != 'login' && $requestedPage != 'register') {
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
    
    //Iniciamos sesión sin datos
    // !isset ($_SESSION['nombre']) ? session_start(): NULL;