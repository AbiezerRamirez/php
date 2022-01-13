<?php
class ControllerUsuario {
    
    use FiltrarTraitMatriz;
    public function __construct() {
        $this->conexion = Conectar::conexion();
    }

    public static function validar() {
        $parametros = array(
            'nombre' => '',
            'clave' => '',
            'imagen' => '',
           
        );
       
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            self::filtrarM($_REQUEST);
            $parametros['nombre'] = $_POST['nombre'];
            $parametros['clave'] = $_POST['clave'];
            if ($parametros['clave'] != '' && $parametros['nombre'] != '') {
                $parametros['imagen'] = Usuario::clave( $parametros['nombre'], $parametros['clave']);
                if ($parametros['imagen']) {
                    self::inicarSesion($parametros['nombre'], $parametros['imagen']);
                    header('location:index.php?ctl=administrador');
                }
            }
        }   
       
        require 'app/vista/formularioValidar.php';
    }

    public static function cerrar() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            self::filtrarM($_REQUEST);
            $parametros['sesion'] = $_POST['sesion'];
            if ($_POST['sesion'] == 'cerrar') {
                $_SESSION = array();
                session_destroy();
                setcookie(session_name(),null,time()-99999,'/', $_SERVER['HTTP_HOST']);  
                header('location:index.php'); 
                exit;
            }
        } else {
            require 'app/vista/cerrarSesion.php';
        }
    }

    private static function inicarSesion($nombre,$imagen) {
        $_SESSION['nombre'] = $nombre;
        $_SESSION['imagen'] = 'web/img/Autores/' . $imagen;
    }

    public static function bienvenida(){
        $parametros = array(
            'mensaje' => '',
            'fecha' => date('d-m-Y'),
        );        
        isset($_SESSION['nombre']) ?
            require 'app/vista/formAdministrador.php' 
            :header('location:index.php');
    } 

}