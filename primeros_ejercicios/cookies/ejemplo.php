<?php
// setcookie("cookie01", "Prueba", time() + 24 * 3600);

// echo "Esta es la cookie: ", $_COOKIE["cookie01"];

$colores = ["red", "green", "blue"];

setcookie("color", $colores[rand(0, 2)], time() + 0.5 * 3600);

echo '<h1 style="color: ' . $_COOKIE["color"] . '">Prueba Cookies</h1>';

?>