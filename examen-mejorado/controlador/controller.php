<?php
require_once('../modelo/bd.php');
require_once('funciones.php');

$gbd = new GBD('alimentos');

if(!isset($_REQUEST['action'])) {
    header('location: ../index.php');
    exit;
} else if ($_REQUEST['action'] == 'add') {
    $alimento = array(
        'nombre' => $_POST['nombre'], 
        'energia' => $_POST['energia'], 
        'proteina' => $_POST['proteina'], 
        'hidratocarbono' => $_POST['hc'], 
        'fibra' => $_POST['fibra'], 
        'grasatotal' => $_POST['grasa']
    );
    
    if (!trimArray($alimento)) {
        if (arrayNumeric(array($_POST['energia'], $_POST['proteina'], $_POST['hc'], $_POST['fibra'], $_POST['grasa']))) {
            $gbd->insertKeyValuesArray('alimentos', $alimento);
            $gbd ->disconect();
            // header('location: ../index.php');
            // exit;
        }
        // $gbd ->salir();
        // header('location: ../index.php?c=add&error=2');
        // exit;
    }
    
    // $gbd ->salir();
    
    // header('location: ../index.php?c=add&error=1');
    // exit;
}
