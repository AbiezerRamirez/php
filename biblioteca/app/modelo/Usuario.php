<?php

class Usuario {

    use FiltrarTraitMatriz;    
    
    public static $usuario = array();

    public function __construct() {
        $this->conexion = Conectar::conexion();
        $this->usuario = array();
    }

    public static function clave($nombre, $clave) {
        try {
            $sql = "select fotoUsuario from usuarios where nombre=:nombre  and clave=:clave";
            $consulta = Conectar::conexion()->prepare($sql);
            $consulta->bindParam(':nombre', $nombre, PDO::PARAM_STR, 50);
            $consulta->bindParam(':clave', $clave, PDO::PARAM_STR, 50);
            $consulta->execute();
            if ($fila = $consulta->fetch(PDO::FETCH_ASSOC))
            return  self::$usuario = $fila['fotoUsuario'];            
        } catch (PDOException $e) {
            exit("Error: " . $e->getMessage());
        }
    }

}