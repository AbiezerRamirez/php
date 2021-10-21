<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $n = 2;

    // Funcion que muestra las potencias de 2

    function potencias_de_2()
    {
        global $n;
        $n *= 2;
        return $n;
    }
    
    echo potencias_de_2() . " ";
    echo potencias_de_2() . " ";
    echo potencias_de_2() . " ";
    echo potencias_de_2() . " ";

    // Funcion que concatena un nombre conformado pro 3 palabras

    $nombreCompleto = "";

    function nombre_completo($a, $b, $c)
    {
        global $nombreCompleto;

        $nombreCompleto = $a . " " . $b . " " . $c;
    }

    // nombre_completo("Abiezer Josue", "Ramirez", "Ceballos");

    // echo ("Nombre: $nombreCompleto");

    // funcion que junta e imprime etiquetas html
    $res = "";
    function imprimir_etiquetas_html($a, $b, &$c)
    {
        $c = $a . $b;
    }

    // imprimir_etiquetas_html("<br>","<head>",$res);
    // echo htmlspecialchars($res);
    ?>
</body>
</html>