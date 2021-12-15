<?php

try {
	$conexion = new PDO('mysql:host=localhost;dbname=curso_paginacion', 'root', '');
} catch (PDOException $e) {
	echo 'ERROR! No ha sido posible la conexión: '. $e->getMessage();
	die();
}

