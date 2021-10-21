<?php

$array = generarArray();

echo $array[10][7];

function generarArray()
{
    for ($i = 1; $i < 13; $i++) {

        $dias = 0;
        $mes = "";
        if ($i == 1 || $i == 3 || $i == 5 || $i == 7 || $i == 8 || $i == 10 || $i == 12) {
            $dias = 31;
        } else if ($i == 4 || $i == 6 || $i == 9 || $i == 11) {
            $dias = 30;
        } else {
            $dias = 28;
        }

        switch ($i) {
            case 1:
                $mes = "Enero";
                break;
            case 2:
                $mes = "Febrero";
                break;
            case 3:
                $mes = "Marzo";
                break;
            case 4:
                $mes = "Abril";
                break;
            case 5:
                $mes = "Mayo";
                break;
            case 6:
                $mes = "Junio";
                break;
            case 7:
                $mes = "Julio";
                break;
            case 8:
                $mes = "Agosto";
                break;
            case 9:
                $mes = "Septiembre";
                break;
            case 10:
                $mes = "Octubre";
                break;
            case 11:
                $mes = "Noviembre";
                break;
            case 12:
                $mes = "Diciembre";
                break;
        }

        for ($j = 1; $j < $dias + 1; $j++) {
            $array[$i][$j] = $j . " de " . $mes;
        }
    }
    return $array;
}
