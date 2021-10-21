<?php

$cromosRepetidos = array("1" => 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
$totalCromos = 0;

$cromos["Temporada 1"] = completarCromos($cromosRepetidos, $totalCromos);
$cromos["Temporada 2"] = completarCromos($cromosRepetidos, $totalCromos);
$cromos["Temporada 3"] = completarCromos($cromosRepetidos, $totalCromos);
$cromos["Temporada 4"] = completarCromos($cromosRepetidos, $totalCromos);
$cromos["Temporada 5"] = completarCromos($cromosRepetidos, $totalCromos);

echo "Cromos Repetidos:<br>";
foreach ($cromosRepetidos as $clave => $valor) {
    echo "cromo " . $clave . ": " . $valor . "<br>";
}
echo "<br>Total Cromos Comprados:<br>";
echo $totalCromos;

function completarCromos(&$cromosRepetidos, &$totalCromos)
{
    $array = [];
    while (sizeof($array) < 10) {
        $cromo = rand(1, 10);
        $totalCromos++;
        while (in_array($cromo, $array)) {
            foreach($cromosRepetidos as $clave => $valor) {
                if ($clave == $cromo) {
                    $cromosRepetidos[$clave] += 1;
                }
            }
            $cromo = rand(1, 10);
            $totalCromos++;
        }
        array_push($array, $cromo);
    }

    asort($array);
    return $array;
}
