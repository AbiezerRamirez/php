<?php
$dns = 'mysql:dbname=test;host=127.0.0.1';
$usuario = 'root';
$password = '';

// $cnx = new mysqli('localhost', 'root', '');

try {
    $gbd = new PDO($dns, $usuario, $password);
    $gbd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Conectado Correctamente';
} catch (PDOException $e) {
    echo 'No ha sido posible conectar con la base de datos ' . $e->getMessage();
}



$gbd = NULL;