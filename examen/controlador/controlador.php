<?php
require_once('modelo/bd.php');

$gbd = new GBD();


if(!isset($_REQUEST['c']) || $_REQUEST['c'] =='inicio') {
    require_once('vista/header.php');
    require_once('vista/inicio.php');
    require_once('vista/footer.php');
    
} else if ($_REQUEST['c'] == 'consult') {
    require_once('vista/header.php');
    require_once('vista/mostrarAlimentos.php');
    require_once('vista/footer.php');
    
} else if ($_REQUEST['c'] == 'add') {
    require_once('vista/header.php');
    require_once('vista/formInsertar.php');    
    require_once('vista/footer.php');

} else if ($_REQUEST['c'] == 'bNombre') {
    require_once('vista/header.php');
    require_once('vista/buscarPorNombre.php');    
    require_once('vista/footer.php');

} else if ($_REQUEST['c'] == 'bCodigo') {
    require_once('vista/header.php');
    require_once('vista/buscarPorCodigo.php');    
    require_once('vista/footer.php');
}


$gbd->salir();