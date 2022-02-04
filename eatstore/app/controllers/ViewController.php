<?php
require_once('app/db/conexion.php');

class ViewController
{
    private $layout;
    private $content;

    public function __construct($layout = 'layout')
    {
        ob_start();
        require_once("app/views/$layout.php");
        $this->layout = ob_get_clean();
    }

    public function loadContent($view)
    {
        ob_start();
        // $gbd = new GBD('alimentos');
        require_once('app/controllers/errors.php');
        require_once("app/views/$view.php");
        // $gbd->disconect();
        $this->content = ob_get_clean();
    }
    
    public function drawSingleView($view)
    {
        ob_start();
        require_once('app/controllers/errors.php');
        require_once("app/views/$view.php");
        return ob_get_clean();
    }

    public function drawView()
    {
        return str_replace('{{content}}', $this->content, $this->layout);
    }
}
