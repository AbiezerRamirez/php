<?php
require_once('../modelo/bd.php');
require_once('funciones.php');

$gbd = new GBD('alimentos');
$path = '../index.php';

if (isset($_REQUEST['action'])) {
    if ($_REQUEST['action'] == 'add') {
        $path .= addAlimento($gbd);
    } else if ($_REQUEST['action'] == 'searchName') {
        $path .= searchName($gbd);
    } else if ($_REQUEST['action'] == 'searchId') {
        $path .= searchId($gbd);
    } else if ($_REQUEST['action'] == 'update') {
    } else if ($_REQUEST['action'] == 'delete') {
    }
}

$gbd->disconect();
header('location: ' . $path);
exit;

// - - - - - - - - - - - - FUNCIONES - - - - - - - - - - - -

function addAlimento($gbd)
{
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
            return '?controller=add&succes=1';
        }
        return '?controller=add&error=2';
    }
    return '?controller=add&error=1';
}

function searchName($gbd)
{
    $nombre = $_POST['nombre'];

    if (!trimString($nombre)) {
        if ($gbd->exists('alimentos', 'nombre', $nombre, true)) return "?controller=buscarNombre&al=$nombre";
        return '?controller=buscarNombre&error=2';
    }
    return '?controller=buscarNombre&error=1';
}

function searchId($gbd)
{
    $id = $_POST['id'];

    if (!trimString($id)) {
        if ($gbd->exists('alimentos', 'id', $id, true)) return "?controller=buscarId&al=$id";
        return '?controller=buscarId&error=2';
    }
    return '?controller=buscarId&error=1';
}

function update($gbd)
{
    
}

function delete($gbd)
{
    
}