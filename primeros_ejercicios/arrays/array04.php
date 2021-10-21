<?php

$temperaturas = rellenarArray($media);
$tempMaxima = temperaturaMaxima($temperaturas);
$tempMinima = temperaturaMinima($temperaturas);

echo "Temperaturas del mes: <br>";
echo mostrarTemperaturas($temperaturas);

echo "<br>Temperatura máxima: " . $tempMaxima;

echo "<br>Dias con la temperatura máxima: ";
echo diasTempMax($temperaturas, $tempMaxima);

echo "<br>Temperatura mínima: " . $tempMinima;

echo "<br>Dias con la temperatura mínima: ";
echo diasTempMin($temperaturas, $tempMinima);

echo "<br>Media del mes: " . round($media, 2);

echo "<br>Dias que superan la media: ";
echo diasSupMedia($temperaturas, $media);

function rellenarArray(&$media)
{
    $arrayTemp = [];

    for ($i = 0; $i < 30; $i++) {
        $arrayTemp[$i] = rand(-5, 35);
        $media += $arrayTemp[$i];
    }
    $media /= 30;
    return $arrayTemp;
}

function temperaturaMaxima($arrayTemp)
{
    return max($arrayTemp);
}

function diasTempMax($arrayTemp, $tMax)
{
    foreach ($arrayTemp as $dia => $temp) {
        if ($temp == $tMax) {
            echo $dia + 1 . " ";
        }
    }
}

function temperaturaMinima($arrayTemp)
{
    return min($arrayTemp);
}

function diasTempMin($arrayTemp, $tMin)
{
    foreach ($arrayTemp as $dia => $temp) {
        if ($temp == $tMin) {
            echo $dia + 1 . " ";
        }
    }
}

function diasSupMedia($arrayTemp, $media)
{
    foreach ($arrayTemp as $dia => $temp) {
        if ($temp > $media) {
            echo $dia + 1 . " ";
        }
    }
}

function mostrarTemperaturas($arrayTemp)
{
    foreach ($arrayTemp as $dia => $temp) {
        echo "dia " . $dia + 1 . ": " . $temp . "<br>";
    }
}
