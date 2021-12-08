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
    }
}

$gbd->disconect();
// header('location: ' . $path);
// exit;

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

        $alimento = array(
            // 'nombre' => $_POST['nombre'],
            // 'energia' => $_POST['energia'],
            // 'proteina' => $_POST['proteina'],
            // 'hidratocarbono' => $_POST['hc'],
            // 'fibra' => $_POST['fibra'],
            // 'grasatotal' => $_POST['grasa'],
        );
        
        $alimentoBD = $gbd->executeQueryArray("select * from alimentos where id = $id");
        $alimentoBD = $alimentoBD[0];
        
        $foto = $_FILES['imagen'];

        if ($foto['error' != 4]) {
            if ($foto['error'] == 0) {
                if (str_contains($foto['type'], 'image')) {
                    $nombreImg = subirFotoServidor($foto, '../web/fotosAlimentos/');
                    if (!$nombreImg) {
                        return '?controller=add&error=5';

                    } else if ($alimentoBD['fotografia'] != 'alimentos.png') {
                        unlink('../web/fotosAlimentos/' . $alimentoBD['fotografia']);
                    }
                    $alimento['fotografia'] = $nombreImg;
                } else {
                    return '?controller=add&error=4';
                }
            } else {
                return '?controller=add&error=3';
            }
        }

        foreach ($alimentoBD as $key => $value) {
            if ($value != $_POST[$key]) {
                echo 'hola';
            }
        }
        var_dump($alimento);
        echo '<br>';
        var_dump($alimentoBD);
    
        if (!trimArray($alimento)) {
            if (arrayNumeric(array($_POST['energia'], $_POST['proteina'], $_POST['hc'], $_POST['fibra'], $_POST['grasa']))) {
                // if ($foto['error'] == 0) {
                //     if (str_contains($foto['type'], 'image')) {
                //         $nombreImg = subirFotoServidor($foto, '../web/fotosAlimentos/');
                //         if (!$nombreImg) {
                //             return '?controller=add&error=5';
                //         } 
                //         $alimento['fotografia'] = $nombreImg;
                //     } else {
                //         return '?controller=add&error=4';
                //     }
                // } else if ($foto['error'] == 4) {
                //     $alimento['fotografia'] = 'alimentos.png';
                // } else {
                //     return '?controller=add&error=3';
                // }
                // $gbd->insertKeyValuesArray('alimentos', $alimento);
                // return '?controller=mod&succes=1';
            }
            // return '?controller=mod&error=2';
        }
        // return '?controller=mod&error=1';
    }
}

function delete($gbd)
{
    
}