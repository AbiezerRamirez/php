<?php
$fotografias = array(
    "Fotografia 1" => array(
        "orden" => "orden 1",
        "autor" => "autor 1",
        "titulo" => "titulo 1",
        "ciudad" => "ciudad 1",
        "url" => "url1"
    ),
    "Fotografia 2" => array(
        "orden" => "orden 2",
        "autor" => "autor 2",
        "titulo" => "titulo 2",
        "ciudad" => "ciudad 2",
        "url" => "url 2"
    )
);

imprimirArrayTabla($fotografias);

function imprimirArrayTabla($array)
{
    echo '<table border="1"';
    echo "<tr>";
    echo "<th>Fotografias</th>";
    foreach ($array["Fotografia 1"] as $clave => $valor) {
        echo '<th>' . $clave . '</th>';
    }
    echo "</tr>";
    foreach ($array as $clave => $subArray) {
        echo "<tr>";
        echo '<td style="text-align: center">' . $clave . "</td>";
        foreach ($subArray as $valor) {
            echo '<td style="text-align: center">' . $valor . "</td>";
        }
        echo "</tr>";
    }
    echo '</table>';
}
