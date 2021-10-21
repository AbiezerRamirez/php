<?php

function mostrarCentro($c)
{
    for ($i = 0; $i < sizeof($c); $i++) {
        if ($i == 0) {
            echo "Nivel Básico: <br>";
        } else if ($i == 1) {
            echo "Nivel Medio: <br>";
        } else {
            echo "Nivel Perfeccionamiento: <br>";
        }

        for ($j = 0; $j < sizeof($c[$i]); $j++) {
            if ($j == 0) {
                echo "Iglés: " . $c[$i][$j] . "<br>";
            } else if ($j == 1) {
                echo "Francés: " . $c[$i][$j] . "<br>";
            } else if ($j == 2) {
                echo "Alemán: " . $c[$i][$j] . "<br>";
            } else {
                echo "Chino: " . $c[$i][$j] . "<br>";
            }
        }
        echo "<br>";
    }
}

/* A) */

echo "A)<br>";

$alumnos = [1, 14, 8, 3, 6, 19, 7, 2, 1, 13, 4, 1];

$n = 0;
for ($i = 0; $i < 3; $i++) {
    for ($j = 0; $j < 4; $j++) {
        $centro[$i][$j] = $alumnos[$n];
        $n++;
    }
}

$centro[0][0] = 1;
$centro[0][1] = 14;

mostrarCentro($centro);

/* B) */

$centro = array(
    array(1, 14, 8, 3),
    array(6, 19, 7, 2),
    array(1, 13, 4, 1)
);

echo "B)<br>";

mostrarCentro($centro);

/* c) */

echo "C)<br>";

$centro[0] = array(1, 14, 8, 3);
$centro[0] = array(6, 19, 7, 2);
$centro[0] = array(1, 13, 4, 1);

mostrarCentro($centro);