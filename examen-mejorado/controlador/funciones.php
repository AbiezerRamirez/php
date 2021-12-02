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

function motrarErrorFichero($file)
{
    $errores = array(
        'fichero subido con exito',
        'el ifchero subido exede el tamaño maximo permitido',
        'Elfichero exede el tamaño maximo permitido por el formulario',
        'fichero parcialmente subido',
        'no se subio ningun fichero',
        'falta la carpeta temporal del fichero',
        'no se pudo escribir el fichero en el disco',
        'una extension de php detuvo la subida del fihero'
    );
    return $errores[$file['error']];
}