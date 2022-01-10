<?php
function trimArray($array)
{
    foreach ($array as $valor) {
        $valor = trim($valor);
        if ($valor == '') return true;
    }
    return false;
}

function arrayNumeric($array)
{
    foreach ($array as $valor) {
        if (!is_numeric($valor)) return false;
    }
    return true;
}

function trimString($str)
{
    $str = trim($str);
    if ($str == '') return true;
    return false;
}

function subirFotoServidor($foto, $path)
{
    $extension = pathinfo($foto['name'], PATHINFO_EXTENSION);
    $nombre_base = basename($foto['name'], ".$extension");
    $nombre_aleatorio = $nombre_base . time() . ".$extension";
    
    $path .= $nombre_aleatorio;
    if (move_uploaded_file($foto['tmp_name'], $path)) {
        return $nombre_aleatorio;
    }
    return false;
}