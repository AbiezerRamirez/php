<?php
$dns = 'mysql:dbname=test2;host=127.0.0.1';
$usuario = 'root';
$password = '';

$nombre = 'platano';
$precio = 12.33;

try {
    $gbd = new PDO($dns, $usuario, $password);
    $gbd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = 'insert into articulos (texto, precio) values (:p1, :p2)';
    $st = $gbd->prepare($sql);
    $st->bindParam(':p1', $nombre);
    $st->bindParam(':p2', $precio);
    $st->execute();

    // bindParam acepta un tercer parametro para indicar el tipo de dato del parametro a recibir
    
    /*  
    PDO::PARAM_NULL
    PDO::PARAM_BOOL
    PDO::PARAM_INT
    PDO::PARAM_STR 
    */
    
} catch (PDOException $e) {
    echo 'No ha sido posible conectar con la base de datos ' . $e->getMessage();
}

$gbd = NULL;