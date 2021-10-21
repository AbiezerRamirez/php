<?php

$centro = array(
    "basico" => array("ingles" => 1, "frances" => 14, "aleman" => 8, "chino" => 3),
    "medio" => array("ingles" => 6, "frances" => 19, "aleman" => 7, "chino" => 2),
    "perfeccion" => array("ingles" => 1, "frances" => 13, "aleman" => 4, "chino" => 1)
);

foreach ($centro as $claveArray => $array) {
    if ($claveArray == "basico") {
        echo "Nivel Básico:<br>";
    } else if ($claveArray == "medio") {
        echo "Nivel Medio:<br>";
    } else {
        echo "Nivel Perfeccionamiento:<br>";
    }

    foreach ($array as $clave => $valor) {
        if ($clave == "ingles") {
            echo "Ingles: " . $valor . "<br>";
        } else if ($clave == "frances") {
            echo "Frances: " . $valor . "<br>";
        } else if ($clave == "aleman") {
            echo "Aleman: " . $valor . "<br>";
        } else {
            echo "Chino: " . $valor . "<br>";
        }
    }
    echo "<br>";
}
