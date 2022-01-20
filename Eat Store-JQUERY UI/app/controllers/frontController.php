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


    // Parseo de la ruta
    // if (isset($_REQUEST['ctl'])) {
    //     if (isset($map[$_REQUEST['ctl']])) {
    //         $ruta = $_REQUEST['ctl'];            
    //     } else {
    //         echo '<p><h1>Error 404: No existe la ruta <i>' . $_REQUEST['ctl'] .'</h1></p>';
    //         exit;
    //     }
    // } else {
    //     $ruta = 'presentacion';
    // }
    // $controlador = $map[$ruta];

    // Ejecución del controlador asociado a la ruta
    // if (method_exists($controlador['controller'], $controlador['action'])) {
    //     call_user_func(
    //         array(
    //             $controlador['controller'],
    //             $controlador['action']
    //         )
    //     );
    // } else {
    //     header('Status: 404 Not Found');
    //     echo '<p><h1>Error 404: El controlador <i>' . $controlador['controller'] . '->' . $controlador['action'] .
    //         '</i> no existe</h1></p>';
    // }
    