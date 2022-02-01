<?php
class Conexion
{
    public static function conexion()
    {
        try {
            $conexion = new PDO('mysql:host=localhost;dbname=eatstore;port=3306;charset=utf8mb4' , 'root', '');
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "<br>Error: " . $e->getMessage();
            echo "<br>Código del error: " . $e->getCode();
            echo "<br>Fichero error: " . $e->getFile();
            echo "<br>Línea del error: " . $e->getLine();
            exit;
        }
        return $conexion;
    }
}