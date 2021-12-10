<?php
require_once('../modelo/bd.php');
require_once('funciones.php');

$gbd = new GBD('alimentos');
$path = '../index.php';

if (isset($_REQUEST['action'])) {
    if ($_REQUEST['action'] == 'add') {
        $path .= addAlimento($gbd);
    } else if ($_REQUEST['action'] == 'searchName') {
        $path .= search($gbd, 'buscarNombre', 'nombre', true);
    } else if ($_REQUEST['action'] == 'searchId') {
        $path .= search($gbd, 'buscarId', 'id', true);
    } else if ($_REQUEST['action'] == 'update') {
        $path .= update($gbd);
    } else if ($_REQUEST['action'] == 'delete') {
        $path .= deleteAlimento($gbd);
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
        'grasatotal' => $_POST['grasa'],
    );

    $foto = $_FILES['imagen'];

    if (!trimArray($alimento)) {
        if (arrayNumeric(array($_POST['energia'], $_POST['proteina'], $_POST['hc'], $_POST['fibra'], $_POST['grasa']))) {
            if ($foto['error'] == 0) {
                if (str_contains($foto['type'], 'image')) {
                    $nombreImg = subirFotoServidor($foto, '../web/fotosAlimentos/');
                    if (!$nombreImg) {
                        return '?controller=add&error=5';
                    } 
                    $alimento['fotografia'] = $nombreImg;
                } else {
                    return '?controller=add&error=4';
                }
            } else if ($foto['error'] == 4) {
                $alimento['fotografia'] = 'alimentos.png';
            } else {
                return '?controller=add&error=3';
            }
            $gbd->insertKeyValuesArray('alimentos', $alimento);
            return '?controller=add&succes=1';
        }
        return '?controller=add&error=2';
    }
    return '?controller=add&error=1';
}

function search($gbd, $controller, $key, $like = false)
{
    $value = $_POST[$key];

    if (!trimString($value)) {
        if ($gbd->exists('alimentos', $key, $value, $like)) return "?controller=$controller&al=$value";
        return "?controller=$controller&error=2";
    }
    return "?controller=$controller&error=1";
}

function update($gbd)
{
    if (isset($_REQUEST['search']) && $_REQUEST['search'] == true) {
        return search($gbd, 'mod', 'nombre');
        
    } else if (isset($_POST['id']) && $gbd->exists('alimentos', 'id', $_POST['id'])) {

        $id = $_POST['id'];

        $alimentoPOST = array(
            'nombre' => $_POST['nombre'],
            'energia' => $_POST['energia'],
            'proteina' => $_POST['proteina'],
            'hidratocarbono' => $_POST['hc'],
            'fibra' => $_POST['fibra'],
            'grasatotal' => $_POST['grasa'],
        );
        
        $alimentoBD = $gbd->executeQueryArray("select * from alimentos where id = $id");
        $alimentoBD = $alimentoBD[0];
        
        $alimentoFinal = array();

        $foto = $_FILES['imagen'];

        if ($foto['error'] != 4) {
            if ($foto['error'] == 0) {
                if (str_contains($foto['type'], 'image')) {
                    $nombreImg = subirFotoServidor($foto, '../web/fotosAlimentos/');
                    if (!$nombreImg) {
                        return "?controller=mod&error=5&id=$id";

                    } else if ($alimentoBD['fotografia'] != '' && $alimentoBD['fotografia'] != 'alimentos.png') {
                        unlink('../web/fotosAlimentos/' . $alimentoBD['fotografia']);
                    }
                    $alimentoFinal['fotografia'] = $nombreImg;
                } else {
                    return "?controller=mod&error=4&id=$id";
                }
            } else {
                return "?controller=mod&error=3&id=$id";
            }
        }
    
        if (!trimArray($alimentoPOST)) {
            if (arrayNumeric(array($_POST['energia'], $_POST['proteina'], $_POST['hc'], $_POST['fibra'], $_POST['grasa']))) {
                foreach ($alimentoBD as $key => $value) {
                    if ($key != 'id' && $key != 'fotografia') {
                        if ($value != $alimentoPOST[$key]) {
                            $alimentoFinal = array_merge($alimentoFinal, array($key => $alimentoPOST[$key]));
                        }
                    }
                }
                if (sizeof($alimentoFinal) > 0) {
                    $gbd->updateKeyValuesArray('alimentos', $alimentoFinal, "id = $id");
                }
                return '?controller=mod&succes=1';
            }
            return "?controller=mod&error=2&id=$id";
        }
        return "?controller=mod&error=1&id=$id";
    }
}

function deleteAlimento($gbd)
{
    if (isset($_REQUEST['search']) && $_REQUEST['search'] == true) {
        return search($gbd, 'delete', 'nombre');

    } else if (isset($_REQUEST['id']) && $gbd->exists('alimentos', 'id', $_POST['id'])) {
        $gbd->delete('alimentos', 'id = \'' . $_REQUEST['id'] . '\'');
        return '?controller=delete$succes=1';
    }
}