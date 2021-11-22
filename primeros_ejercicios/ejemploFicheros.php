<?php

// $_FILES['fichero_usuario']['name’]: El nombre original del fichero en la máquina 
// del cliente.

// $_FILES['fichero_usuario']['type’]: El tipo MIME del fichero, si el navegador 
// proporcionó esta información. Un ejemplo sería "image/gif". Este tipo MIME, sin 
// embargo, no se comprueba en el lado de PHP y por lo tanto no se garantiza su 
// valor.

// $_FILES['fichero_usuario']['size'] El tamaño, en bytes, del fichero subido.

// $_FILES['fichero_usuario']['tmp_name'] El nombre temporal del fichero en el 
// cual se almacena el fichero subido en el servidor.

// $_FILES['fichero_usuario']['error’]: El código de error asociado a esta subida.

// - - -

// ERROR

// UPLOAD_ERR_OK
// Valor: 0; No hay error, fichero subido con éxito.
// UPLOAD_ERR_INI_SIZE
// Valor: 1; El fichero subido excede la directiva upload_max_filesize de php.ini
// UPLOAD_ERR_FORM_SIZE
// Valor: 2; El fichero subido excede la directiva MAX_FILE_SIZE especificada en el formulario HTML.
// UPLOAD_ERR_PARTIAL
// Valor: 3; El fichero fue sólo parcialmente subido.
// UPLOAD_ERR_NO_FILE
// Valor: 4; No se subió ningún fichero.
// UPLOAD_ERR_NO_TMP_DIR
// Valor: 6; Falta la carpeta temporal.
// UPLOAD_ERR_CANT_WRITE
// Valor: 7; No se pudo escribir el fichero en el disco.
// UPLOAD_ERR_EXTENSION
// Valor: 8; Una extensión de PHP detuvo la subida de ficheros. PHP no proporciona una forma de determinar
// la extensión que causó la parada de la subida de ficheros.

/* 
$mi_error=$_FILES['mifoto']['error'];
switch ($mi_error) {
case 1:
$mensaje= "El fichero subido excede la directiva upload_max_filesize de php.ini";
break;
case 2:
$mensaje= "El fichero subido excede la directiva MAX_FILE_SIZE especificada en el formulario HTML";
break;
case 3:
$mensaje= "El fichero fue sólo parcialmente subido";
break;
case 4:
$mensaje= "No se subió ningún fichero";
break;
case 6:
$mensaje= "Falta la carpeta temporal";
break;
case 7:
$mensaje = "No se pudo escribir el fichero en el disco.";
break;
case 8:
$mensaje = "Una extensión de PHP detuvo la subida de ficheros";
break;
} 
*/

// - - -

// MOVER
/* 
Moverlo de la capeta temporal a la carpeta deseada y con un nombre diferente:

    • move_uploaded_file ( string $filename , string $destination ) : bool
    • pathinfo ( string $path [, int $options = PATHINFO_DIRNAME | PATHINFO_BASENAME | 
    PATHINFO_EXTENSION | PATHINFO_FILENAME ] ) : mixed
    • time ( void ) : int
    • exit ([ string $status ] ) : void

    $directorio_destino=‘misfotos’
    $nombre=$nombre_original.time().extensión_original
    $destination=$directorio_destino/$nombre
*/

// - - -

// PAH_INFO EJEMPLO

// $partes_ruta = pathinfo('/www/htdocs/inc/lib.inc.php');

// echo $partes_ruta['dirname'], "\n";
// echo $partes_ruta['basename'], "\n";
// echo $partes_ruta['extension'], "\n";
// echo $partes_ruta['filename'], "\n"; // desde PHP 5.2.0

/* 
/www/htdocs/inc
lib.inc.php
php
lib.inc 
*/