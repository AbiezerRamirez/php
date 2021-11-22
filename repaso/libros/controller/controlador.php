<?php
require_once('model/arrayLibros.php');
require_once('controller/funciones.php');


if (!isset($_REQUEST['c'])) {
    index();
    if (isset($_REQUEST['error']) && $_REQUEST['error'] == 1) {
        echo '<span style="color: red"> ERROR string vacio en el formulario</span>';
        unset($_REQUEST['error']);
    }
} else {
    accion($libros);
}

// foreach ($libros as $valores) {
//     echo $valores . '<br>';
// }

// var_dump($libros);