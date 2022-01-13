<?php
class Autores {

    public static $conexion;

    public function __construct() {
        self::$conexion = Conectar::conexion();
    }

    public static function listarAutoresLibros() {
        try {
            self::$conexion = Conectar::conexion();
            $sql = "select * from autor order by id asc";

            //var_dump(self::$conexion);
            $consulta = self::$conexion->prepare($sql);
            $consulta->execute();
            while ($autor = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $autores[] = $autor;
            }
            $sql2 = "select libro.id, libro.titulo from libro, autor where libro.idAutor=autor.id and idAutor=:indice;";
            foreach ($autores as $uno => $contenido) {
                $indice = $contenido['id'];
                $consulta = self::$conexion->prepare($sql2);
                $consulta->bindParam(':indice', $indice);
                $consulta->execute();
                $obra = $consulta->fetchAll(PDO::FETCH_ASSOC);
                $autores[$uno]['obra'] = $obra;
            }
            return $autores;
        } catch (PDOException $e) {
            echo "<h1></h1><br>Fichero: " . $e->getFile();
            echo "<br>Linea: " . $e->getLine();
            exit("<br>Error: " . $e->getMessage());
        }
        self::$conexion = NULL;
    }

    public static function listarAutores() {
        try {
            self::$conexion = Conectar::conexion();
            $sql = "select * from autor order by id asc";
            $consulta = self::$conexion->prepare($sql);
            $consulta->execute();
            while ($autor = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $autores[] = $autor;
            }
            return $autores;
        } catch (PDOException $e) {
            echo "<h1></h1><br>Fichero: " . $e->getFile();
            echo "<br>Linea: " . $e->getLine();
            exit("<br>Error: " . $e->getMessage());
        }
        self::$conexion = NULL;
    }

    public static function buscarAutorNombre($nombre) {
        try {
            self::$conexion = Conectar::conexion();
            $sql = "select id from autor where nombre=:nombre";            
            $consulta = self::$conexion->prepare($sql);
            $consulta->bindParam(':nombre', $nombre);
            $consulta->execute();
            $autor = $consulta->fetch(PDO::FETCH_ASSOC); 
            return $autor;
        } catch (PDOException $e) {
            echo "<h1></h1><br>Fichero: " . $e->getFile();
            echo "<br>Linea: " . $e->getLine();
            exit("<br>Error: " . $e->getMessage());
        }
        self::$conexion = NULL;
    }

    public static function insertarAutor($nombre,$fotoAutor= 'sinFoto.png') {
        self::$conexion = Conectar::conexion();
        $sql = "INSERT INTO autor (nombre,fotoAutor) VALUES (:nombre,:fotoAutor)";
        try {
            $consulta =  self::$conexion->prepare($sql);
            $consulta->bindParam(':nombre', $nombre);
            $consulta->bindParam(':fotoAutor', $fotoAutor);
            $consulta->execute();
            return self::$conexion->lastInsertId();
        } catch (PDOException $e) {
            echo "<h1><br>Fichero: " . $e->getFile();
            echo "<br>Linea:" .  $e->getLine() . "<br>Mensaje : ";
            die($e->getMessage());
        }
    }
    
}