<?php
$dns = 'mysql:dbname=test;host=127.0.0.1';
$usuario = 'root';
$password = '';

// $cnx = new mysqli('localhost', 'root', '');

try {
    $gbd = new PDO($dns, $usuario, $password);
    $gbd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo 'Conectado Correctamente';

    $sql = 'select id, nombre, clave from users';
    $resultado = $gbd->query($sql);

    while($usuario = $resultado->fetch(PDO::FETCH_ASSOC)) {
        echo $usuario['id'] . ' - ';
        echo $usuario['nombre'] . ' - ';
        echo $usuario['clave'];
    }
} catch (PDOException $e) {
    echo 'No ha sido posible conectar con la base de datos ' . $e->getMessage();
}



$gbd = NULL;