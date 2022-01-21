<?php
    spl_autoload_register(function ($clase) {
        $pathContorllers = $clase . '.php';
        $pathBD = '../db/' . $clase . '.php';
        $pathModels = '../models/' . $clase . '.php';
        if (file_exists($pathContorllers)) {
            require_once $pathContorllers;
        } elseif (file_exists($pathBD)) {
            require_once $pathBD;
        } elseif (file_exists($pathModels)) {
            require_once $pathModels;
        }
    });

$actions = array(
    'register' => array(
        'controller' => 'UserController',
        'action' => 'register'
    ),
    'login' => array(
        'controller' => 'UserController',
        'action' => 'login'
    )

);

if (isset($_REQUEST['action']) && isset($actions[$_REQUEST['action']])) {
        $action = $_REQUEST['action'];
} else {
    header('location: ../../index.php?page=404');
    exit;
}

$controller = $actions[$action];

if (method_exists($controller['controller'], $controller['action'])) {
    call_user_func(
        array(
            $controller['controller'],
            $controller['action']
        )
    );
} 