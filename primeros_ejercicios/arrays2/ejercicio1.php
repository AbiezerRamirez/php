<?php

$array = generarArrayAleatorio(15);
var_dump($array);

function generarArrayAleatorio($elementos)
{
    for ($i = 0; $i < $elementos; $i++) {
        $array[$i] = rand(1, 100);
    }
    return $array;
}
