<?php
function tabla($filas, $contenido) {
    echo '<table border="1"';
    for ($i = 0; $i < $filas; $i++) {
        echo '<tr><td><img src="' . $contenido[$i] . '" width="100" heigth="150"></td></tr>';
    }
    echo '</table>';
}
    
function generarArrayImagenes() {
    $array = [];
    foreach ($_FILES as $clave => $valor) {
        if ($valor['error'] != 4) {
            $array[$clave]= $_FILES[$clave];
        } 
    }
    return $array;
}

function comrpobarError($error) {
    switch ($error) {
        case 0:
            echo "Fichero subido con exito";
            echo "<br>";
            break;
        case 1:
            echo "El fichero exede el tamaño maximo permitido por php.ini";
            echo "<br>";
            break;
        case 2:
            echo "El fichero exede el tamaño maximo permitido por el formulario";
            echo "<br>";
            break;
        case 3:
            echo "El fichero sue parcialmente subido";
            echo "<br>";
            break;
        case 4:
            echo "Fichero no encontrado";
            echo "<br>";
            break;
        case 6:
            echo "No se ha encontrado la carpeta temporal";
            echo "<br>";
            break;
        case 7:
            echo "No se puedo escribir el fichero en el disco";
            echo "<br>";
            break;
        case 8:
            echo "Una extensión de PHP detuvo la subida de ficheros";
            echo "<br>";
            break;
            }
}