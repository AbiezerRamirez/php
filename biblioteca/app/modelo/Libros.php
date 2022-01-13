<?php 
class Libros {

    public static $conexion;
    public static $libros=array();

    public function __construct() {
        self::$conexion = Conectar::conexion();
    }

    public static function listarLibros() {
        try {
            self::$conexion = Conectar::conexion();
            $sql = "select libro.id,titulo,nombre,editorial,tema,portada from libro,autor where libro.idAutor=autor.id order by libro.id asc";
           
            //var_dump(self::$conexion);
            $consulta= self::$conexion->prepare($sql);
            $consulta->execute();
            while ($libro = $consulta->fetch(PDO::FETCH_ASSOC) ) {
                $libros[] = $libro;
            }
            return $libros;
        } catch (PDOException $e) {
            echo "<h1></h1><br>Fichero: " . $e->getFile();
            echo "<br>Linea: " . $e->getLine();
            exit("<br>Error: " . $e->getMessage());
        }
        self::$conexion = NULL;
    }

    public static function dameLibro($id) {
        try {
            self::$conexion = Conectar::conexion();
            $sql = "select titulo,nombre,editorial,tema,portada,fotoAutor from libro,autor where libro.idAutor=autor.id and libro.id=:indice ";
            
            $consulta = self::$conexion->prepare($sql);
            $consulta->bindParam(':indice', $id);
            $consulta->execute();
            $libro = $consulta->fetchAll(PDO::FETCH_ASSOC);             
            return $libro[0];
        } catch (PDOException $e) {
            echo "<h1></h1><br>Fichero: " . $e->getFile();
            echo "<br>Linea: " . $e->getLine();
            exit("<br>Error: " . $e->getMessage());
        }
        self::$conexion = NULL;
    }

    public static function insertarLibro($titulo,$editorial,$tema,$idAutor, $portada='sinPortada.png') {
        self::$conexion = Conectar::conexion();
        $sql = "INSERT INTO libro (titulo,editorial,tema,idAutor,portada) VALUES (:titulo,:editorial,:tema,:idAutor,:portada)";
        try {
            $consulta =  self::$conexion->prepare($sql);
            $consulta->bindParam(':titulo', $titulo);
            $consulta->bindParam(':editorial', $editorial);
            $consulta->bindParam(':tema', $tema);
            $consulta->bindParam(':idAutor', $idAutor);
            $consulta->bindParam(':portada', $portada);
            $consulta->execute();
            return self::$conexion->lastInsertId();
        } catch (PDOException $e) {
            echo "<h1><br>Fichero: " . $e->getFile();
            echo "<br>Linea:" .  $e->getLine() . "<br>Mensaje : ";
            die($e->getMessage());
        }
        self::$conexion = NULL;
    }

    public static function listarTemas() {
        try {
            self::$conexion = Conectar::conexion();
            $sql = "select DISTINCT tema from libro order by tema asc";
            $consulta = self::$conexion->prepare($sql);
            $consulta->execute();
            while ($tema = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $temas[] = $tema;
            }
            return $temas;
        } catch (PDOException $e) {
            echo "<h1></h1><br>Fichero: " . $e->getFile();
            echo "<br>Linea: " . $e->getLine();
            exit("<br>Error: " . $e->getMessage());
        }
        self::$conexion = NULL;
    }

    public static function listarEditoriales() {
        try {
            self::$conexion = Conectar::conexion();
            $sql = "select DISTINCT editorial from libro order by tema asc";
            $consulta = self::$conexion->prepare($sql);
            $consulta->execute();
            while ($editorial = $consulta->fetch(PDO::FETCH_ASSOC)) {
                $editoriales[] = $editorial;
            }
            return $editoriales;
        } catch (PDOException $e) {
            echo "<h1></h1><br>Fichero: " . $e->getFile();
            echo "<br>Linea: " . $e->getLine();
            exit("<br>Error: " . $e->getMessage());
        }
        self::$conexion = NULL;
    }

    public static function  buscarTituloAutor($titulo, $idAutor) {
        try {
            self::$conexion = Conectar::conexion();
            $sql = "select libro.id  from libro where titulo=:titulo and idAutor=:idAutor";
            $consulta = self::$conexion->prepare($sql);
            $consulta->bindParam(':titulo', $titulo);
            $consulta->bindParam(':idAutor', $idAutor);
            $consulta->execute();
            $existe = $consulta->fetch(PDO::FETCH_ASSOC);
            return  $existe;
        } catch (PDOException $e) {
            echo "<h1></h1><br>Fichero: " . $e->getFile();
            echo "<br>Linea: " . $e->getLine();
            exit("<br>Error: " . $e->getMessage());
        }
        self::$conexion = NULL;
    }
    
}



?>