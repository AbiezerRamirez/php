<?php
const FILAS = 2;
const COLUMNAS = 3;

$array1 = generarArray(FILAS, COLUMNAS);
$array2 = generarArray(FILAS, COLUMNAS);
$array3 = sumarArrays($array1, $array2);

imprimirArrayTabla($array3);

function generarArray($r, $c)
{
    for ($i = 0; $i < $r; $i++) {
        for ($j = 0; $j < $c; $j++) {
            $array[$i][$j] = rand(-10, 10);
        }
    }
    return $array;
}

function sumarArrays($a1, $a2)
{
    for ($i = 0; $i < sizeof($a1); $i++) {
        for ($j = 0; $j < sizeof($a1[$i]); $j++) {
            $array[$i][$j] = $a1[$i][$j] + $a2[$i][$j];
        }
    }
    return $array;
}

function imprimirArrayTabla($array)
{
    print '<table border="1" style="border-collapse: collapse">';
    for ($i = 0; $i < sizeof($array); $i++) {
        print "<tr>";
        for ($j = 0; $j < sizeof($array[$i]); $j++) {
            print '<td style="text-align: center">' . $array[$i][$j] . "</td>";
        }
        print "</tr>";
    }
    print "</table>";
}
