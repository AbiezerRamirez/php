<?php

$array = generarArray();
mostrarArray($array);

function generarArray()
{
    $array = [];
    for ($i = 0; $i < 6; $i++) {
        $numero = rand(1, 49);
        while (in_array($numero, $array)) {
            $numero = rand(1, 49);
        }
        $array[$i] = $numero;
    }
    return $array;
}

function mostrarArray($array)
{
    foreach ($array as $numero) {
        echo $numero . " ";
    }
}
