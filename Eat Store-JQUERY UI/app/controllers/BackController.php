<?php

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

// Parseo de la ruta
if (isset($_REQUEST['ctl'])) {
    if (isset($map[$_REQUEST['ctl']])) {
        $ruta = $_REQUEST['ctl'];            
    } else {
        header('Status: 404 Not Found');
        echo '<p><h1>Error 404: No existe la ruta <i>' . $_REQUEST['ctl'] .'</h1></p>';
        exit;
    }
} else {
    $ruta = 'presentacion';
}
$controlador = $map[$ruta];

// Ejecución del controlador asociado a la ruta
if (method_exists($controlador['controller'], $controlador['action'])) {
    call_user_func(
        array(
            $controlador['controller'],
            $controlador['action']
        )
    );
} 

// echo $_POST['mail'];