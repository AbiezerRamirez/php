<?php
// Recoleccion de variables del formulario

$numModulos = $_GET["modulos"];
$numAlumnos = $_GET["alumnos"];
$notaMinima = $_GET["notaMin"];
$notaMaxima = $_GET["notaMax"];

// Llamadas a las funciones

$arrayClase = generarNotas($numAlumnos, $numModulos, $notaMinima, $notaMaxima);
imprimirArrayNotas($arrayClase);

// Funciones

function generarNotas($nAlumnos, $nModulos, $notaMin, $notaMax)
{
    for ($i = 0; $i < $nAlumnos; $i++) {
        for ($j = 0; $j < $nModulos; $j++) {
            $arrayClase["Alumno " . $i + 1]["Modulo " . $j + 1] = rand($notaMin, $notaMax);
        }
    }
    return $arrayClase;
}

function imprimirNota($nota)
{
    if ($nota < 5) {
        return '<font color="red">' . $nota . '</font>';
    }
    return $nota;
}

function imprimirArrayNotas($array)
{
    echo '<table border="1" style="border-collapse: collapse">';
    echo "<tr>";
    for ($i = 0; $i < sizeof($array["Alumno 1"]) + 1; $i++) {
        if ($i != 0) {
            echo '<th> Modulo ' . $i . '</th>';
        } else {
            echo "<th>DAW</th>";
        }
    }
    echo "</tr>";
    foreach ($array as $nombreAlumno => $subArray) {
        echo "<tr>";
        echo '<td style="text-align: center">' . $nombreAlumno . "</td>";
        foreach ($subArray as $nota) {
            echo '<td style="text-align: center">' . imprimirNota($nota) . "</td>";
        }
        echo "</tr>";
    }
    echo '</table>';
}
