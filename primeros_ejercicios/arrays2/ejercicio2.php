<?php

const FILAS = 2;
const COLUMNAS = 3;

$array = generarArray(FILAS, COLUMNAS);
$arrayTraspuesto = trasponerArray($array);

echo "Array <br>";
imprimirArrayTabla($array);
echo "<br> Array Traspuesto <br>";
imprimirArrayTabla($arrayTraspuesto);

function generarArray($r, $c)
{
    for ($i = 0; $i < $r; $i++) {
        for ($j = 0; $j < $c; $j++) {
            $array[$i][$j] = rand(1, 10);
        }
    }
    return $array;
}

function trasponerArray($array)
{
    foreach ($array as $clave1 => $subArray) {
        foreach ($subArray as $clave2 => $Valor) {
            $arrayTraspuesto[$clave2][$clave1] = $array[$clave1][$clave2];
        }
    }
    return $arrayTraspuesto;
}

function imprimirArrayTabla($array) {
    echo '<table border="1" style="border-collapse: collapse">';
    foreach ($array as $subArray) {
        echo "<tr>";
        foreach ($subArray as $valor) {
            echo '<td style="text-align: center">' . $valor . "</td>";
        }
        echo "</tr>";
    }
    echo '</table>';
}
