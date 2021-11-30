<?php
require_once('../modelo/bd.php');
require_once('funciones.php');

$gbd = new GBD('alimentos');
$path = '../index.php';

if(isset($_REQUEST['action'])) {
    if ($_REQUEST['action'] == 'add') {
        addAlimento($gbd, $path);
    } else if ($_REQUEST['action'] == 'searchName') {
        searchName($gbd, $path);
    }
} 

$gbd ->disconect();
header('location: ' . $path);
exit;

// - - - - - - - - - - - - FUNCIONES - - - - - - - - - - - -

function addAlimento($gbd, &$path) {
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
        } else
            $path .= '?controller=add&error=2';
    } else 
        $path .= '?controller=add&error=1';
}

function searchName($gbd, &$path) {
    $nombre = $_POST['nombre'];

    if (!trimString($nombre)) {
        if (str_contains($nombre, '%')) {

        } else {
            if ($gbd->exists('alimentos', 'nombre', $nombre)) {
                $path .= "?controller=buscarNombre&al=$nombre";
            }

        }

        
        
        // $resul = $gbd->buscarNombre($nombre);

            
        // if (true) {
            // include_once('../vista/header.php');
            // include_once('../vista/buscarPorNombre.php');
            // include_once('../vista/footer.php');
            // $gbd->salir();
        // } else {
            // $gbd->salir();
            // header('location: ../index.php?c=bNombre&error=2');
            // exit;
        // }
    } else {
        $path .= '?controller=buscarNombre&error=1';
        // $gbd->salir();
        // header('location: ../index.php?c=bNombre&error=1');
        // exit;
    }
}