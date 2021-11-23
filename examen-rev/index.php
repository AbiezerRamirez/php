<?php



$map =  array(
    'nombre' => array(
        'param1' => 'valor',
        'param1' => 'valor'
    ),
    'nombre2' => array(
        'param1' => 'valor',
        'param1' => 'valor'
    ),
);

// -----


$conrolador = $map[$ruta];

if (method_exists($controlador['controller'], $controlador['action'])){
    call_user_func(
        array(
            new $controlador['controller'],
            $controlador['action']
            )
    );
} else {
    header('Status: 404 Not Found');
    echo '<html><body><h1>Error 404: El controlador <i>' . $controlador['controller'] . '->' . $controlador['action'] . ' no existe</i></h1></body></html>';
}