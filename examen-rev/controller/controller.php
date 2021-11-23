<?php
class Controller
{
    public function inicio()
    {
        $params = array(
            'mensaje' => '',
            'fecha' => date('d-m-y')
        );
        require 'app/vista/inicio.php';
    }

    public function listar()
    {
        // $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario, Config::$mvc...);
        $params = array (
            // 'alimentos' => $m->dameAlimentos(),
        );
        require 'app/vista/mostrarAlimentos.php';
    }

    // public function 
}
