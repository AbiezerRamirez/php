<?php
include ('misclases.php');

$abiezer = new Usuario('Abiezer', 'Ramirez');

echo $abiezer;


$hijo = new usuarioTipo("Abiezer", "hola");

echo '<br>'  . $hijo;