<?php
class ControllerAutores {
    
    public static $conexion;

    public function __construct() {
        self::$conexion = Conectar::conexion();
    }

    public static function listarAutoresLibros() {
        //Si no se ha podido subir la imagen, llegará la url mensaje=1
        //En ese caso se muestra el mensaje sobre la imagen
        $mensaje = 'Autores modicados';
        isset($_GET['mensaje']) ? $mensaje : $mensaje = '';

        $parametros = array(
            'autores' => Autores::listarAutoresLibros(),
            'mensaje' => $mensaje,
        );

        require 'app/vista/VmostrarAutores.php';
    }
   
}