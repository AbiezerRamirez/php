<?php

    // spl_autoload_register(function ($clase) {
    //     $pathContorllers = 'app/controlador/' . $clase . '.php';
    //     // $pathBD = 'bd/' . $clase . '.php';
    //     $pathModels = 'app/modelo/' . $clase . '.php';
    //     if (file_exists($pathContorllers)) {
    //         require_once $pathContorllers;
    //     // } elseif (file_exists($pathBD)) {
    //         // require_once $pathBD;
    //     } elseif (file_exists($pathModels)) {
    //         require_once $pathModels;
    //     }
    // });


    $map = array(
        'home' => 'home'
    );


    //Iniciamos sesión sin datos
    // !isset ($_SESSION['nombre']) ? session_start(): NULL;

    // $map = array(
    //     'presentacion' => array(
    //         'controller' => 'ControllerLibros',
    //         'action' => 'presentacion',
    //     ),
    //     'listarLibros' => array(
    //         'controller' => 'ControllerLibros',
    //         'action' => 'listarLibros',
    //     ),
    //     'listarAutores' => array(
    //         'controller' => 'ControllerAutores',
    //         'action' => 'listarAutoresLibros',
    //     ),
    //     'buscarLibro' => array(
    //         'controller' => 'ControllerLibros',
    //         'action' => 'buscarLibro',
    //     ),
    //     'actualizarLibro' => array(
    //         'controller' => 'ControllerLibros',
    //         'action' => 'actualizarLibro',
    //     ),
    //     'buscarAutor' => array(
    //         'controller' => 'ControllerAutores',
    //         'action' => 'buscarAutor',
    //     ),
    //     'actualizarAutor' => array(
    //         'controller' => 'ControllerAutores',
    //         'action' => 'actualizarAutor',
    //     ),
    //     'ver' => array(
    //         'controller' => 'ControllerLibros',
    //         'action' => 'ver',
    //     ),
    //     'insertarLibro' => array(
    //         'controller' => 'ControllerLibros',
    //         'action' => 'insertarLibro',
    //     ),
    //     'borrar' => array(
    //         'controller' => 'ControllerLibros',
    //         'action' => 'borrar',
    //     ),
    //     'areaPrivada' => array(
    //         'controller' => 'ControllerUsuario',
    //         'action' => 'validar',
    //     ),
    //     'cerrarSesion' => array(
    //         'controller' => 'ControllerUsuario',
    //         'action' => 'cerrar',
    //     ),
        
    //     'administrador' => array(
    //         'controller' => 'ControllerUsuario',
    //         'action' => 'bienvenida',
    //     )
    // );

    // Parseo de la ruta
    // if (isset($_REQUEST['ctl'])) {
    //     if (isset($map[$_REQUEST['ctl']])) {
    //         $ruta = $_REQUEST['ctl'];            
    //     } else {
    //         header('Status: 404 Not Found');
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
    