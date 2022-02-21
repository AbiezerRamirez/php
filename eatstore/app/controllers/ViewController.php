<?php
require_once('app/db/conexion.php');

class ViewController
{
    private $layout;
    private $content;
// constructor, define un layout sobre el cual dibujara las vistas
    public function __construct($layout = 'layout')
    {
        ob_start();
        require_once("app/views/$layout.php");
        $this->layout = ob_get_clean();
    }
// funcion que carga una vista para posteriormente ser dibujada dentro del layout
    public function loadContent($view)
    {
        ob_start();
        require_once('app/controllers/errors.php');
        require_once("app/views/$view.php");
        $this->content = ob_get_clean();
    }
    // funcion que dibuja una vista por si sola sin necesidad del layout
    public function drawSingleView($view)
    {
        ob_start();
        require_once('app/controllers/errors.php');
        require_once("app/views/$view.php");
        return ob_get_clean();
    }
// funcion que dibuja la vista cargada previamente dentro del layout
    public function drawView()
    {
        return str_replace('{{content}}', $this->content, $this->layout);
    }
}
