<?php

const X = 5;

$array = generarArray(X);
$arrayOrdenado = ordenarParImpar($array);

echo "Array<br>";
imprimirArray($array);
echo "<br>Array Ordenado<br>";
imprimirArray($arrayOrdenado);

function generarArray($size)
{
    for ($i = 0; $i < $size; $i++) {
        $array[$i] = rand(1, 10);
    }
    return $array;
}

function ordenarParImpar($array)
{
    $cPar = 1;
    $cImpar = sizeof($array);
    foreach ($array as $valor) {
        if ($valor % 2 == 0) {
            $arrayOrdenado[$cPar] = $valor;
            $cPar++;
        } else {
            $arrayOrdenado[$cImpar] = $valor;
            $cImpar--;
        }
    }
    ksort($arrayOrdenado);
    return $arrayOrdenado;
}

function imprimirArray($array)
{
    foreach ($array as $valor) {
        echo $valor . " ";
    }
}
