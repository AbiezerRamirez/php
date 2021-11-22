<?php
// setcookie("cookie01", "Prueba", time() + 24 * 3600);

// echo "Esta es la cookie: ", $_COOKIE["cookie01"];

$colores = ["red", "green", "blue"];

setcookie("color", $colores[rand(0, 2)], time() + 0.5 * 3600);

echo '<h1 style="color: ' . $_COOKIE["color"] . '">Prueba Cookies</h1>';


// La primera cookie expira al final de la sesión. 
$ok1 = setcookie('nombre','Lourdes'); 

// Segunda cookie expira en 5 días. 
$ok2 = setcookie('apellido','Izquierdo',time()+(5*24*3600)); 


// Para borrar una cookie, simplemente se debe volver a crear la cookie con un
// tiempo de expiración anterior al presente.

// Esta cookie se borrará inmediatamente.
setcookie("nombre", "Lourdes Izquierdo", time() - 1);

?>