<?php

print_r($_FILES);

foreach ($_FILES as $clave => $valor) {
    if ($valor['error'] != 0) {
        comrpobarError($valor['error']);
    } else if (!str_contains($valor['type'], 'image')) {
        echo 'El archivo subido no es una imagen';
    }
}


// var_dump($_FILES);

// foreach ($_FILES as $key => $value) {
//     $uploaddir = 'fotoservidor/';
//     $uploadfile = $uploaddir . basename($_FILES[$key]['name'], ".jpg") . time() . ".jpg";
//     if (move_uploaded_file($_FILES[$key]['tmp_name'], $uploadfile)) {
    //         echo "File is valid, and was successfully uploaded.<br>";
//     } else {
//         echo "Possible file upload attack!<br>";
//     }
// }


function comprobarVacio($array) {
    foreach ($array as $valor) {
        if ($valor['error'] != 4) {
            return false;
        }
    }
    return true;
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