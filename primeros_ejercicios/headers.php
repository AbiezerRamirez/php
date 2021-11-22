<?php
// RUTAS ABSOLUTAS

// Para obtener una URL absoluta se emplean:

// • $_SERVER[’HTTP_HOST’] que devuelve el nombre del servidor.

// • $_SERVER[’PHP_SELF’] que devuelve la ruta relativa al fichero actual que se está ejecutando.

// • dirname() que devuelve la parte correspondiente al directorio indicado en una ruta a un fichero.

// echo "nombre del servidor: ".$_SERVER['HTTP_HOST']."<br>"; 
// echo "nombre del script en ejecución: ".$_SERVER['PHP_SELF']."<br>";
// echo "nombre del directorio del script en ejecución: ".dirname($_SERVER['PHP_SELF'])."<br>";


// REFRESH

// header("refresh:5;url=https://www.php.net/manual/es/function.header.php");
// echo "Serás redirigido en 5 segundos...";
// exit;
