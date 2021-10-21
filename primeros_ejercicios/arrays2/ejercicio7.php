<?php
$array = cuadradoMagico(5);
imprimirArrayTabla($array);

function imprimirArrayTabla($array)
{
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

function cuadradoMagico($dimension)
{   
    $columna = round($dimension / 2);
    $fila = 1;

    for ($i = 1; $i <= pow($dimension, 2); $i++) {
        if ($i % $dimension != 0) {
            $cuadradoMagico[$fila--][$columna++] = $i;
        } else {
            $cuadradoMagico[$fila++][$columna] = $i;
        }
        if ($columna == $dimension + 1) {
            $columna = 1;
        }
        if ($fila == 0) {
            $fila = $dimension;
        }
    }
    ksort($cuadradoMagico);
    for ($i = 1; $i <= sizeof($cuadradoMagico); $i++) {
        ksort($cuadradoMagico[$i]);
    }
    return $cuadradoMagico;
}
