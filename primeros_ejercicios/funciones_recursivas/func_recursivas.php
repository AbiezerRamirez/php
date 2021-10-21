<?php
function factorial($n)
{
    if ($n < 2) {
        return 1;
    } else {
        return $n * factorial($n - 1);
    }
}

function visualizarArray($a)
{
    foreach ($a as $clave => $valor) {
        if (is_array($valor)) {
            echo "clave: <strong>" . $clave . "</strong><br>";
            visualizarArray($valor);
        } else {
            echo $clave . ": " . $valor . "<br>";
        }
    }
    echo "<br>";
}

function arrayCiudades()
{
    $ciudades = array(
        "ciudad 1" => array(
            "nombre" => "Madrid", 
            "idioma" => "Español", 
            "pais" => "España", 
            "contienente" => "Europa"),
        "ciudad 2" => array(
            "nombre" => "París", 
            "idioma" => "Francés", 
            "pais" => "Francia", 
            "contienente" => "Europa"),
        "ciudad 3" => array(
            "nombre" => "Lima", 
            "idioma" => "Español", 
            "pais" => "Perú", 
            "contienente" => "América"),
        "ciudad 4" => array(
            "nombre" => "Sidney", 
            "idioma" => "Inglés", 
            "pais" => "Australia", 
            "contienente" => "Ocenía"),
    );

    return $ciudades;
}
