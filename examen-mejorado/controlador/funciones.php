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