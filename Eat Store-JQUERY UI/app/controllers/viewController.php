<?php
class ViewController {

    private $layout;
    private $content;

    public function __construct()
    {
        // $this->map = $map;
    }

    public function loadContentView($view)
    {
        ob_start();
        // $gbd = new GBD('alimentos');
        require_once("views/$view.html");
        // $gbd->disconect();
        $this->content = ob_get_clean();
    }
    
    public function loadLayout()
    {
        ob_start();
        require_once("views/layout.php");
        $this->layout = ob_get_clean();
    }

    public static function drawView($view)
    {
        // $layout = cargarVista('diseño');
        // if (!isset($_REQUEST['controller'])) $content = cargarVista('inicio');
        // else if (key_exists($_REQUEST['controller'], $vistas)) $content = cargarVista($vistas[$_REQUEST['controller']]);
        // else {
        //     http_response_code(404);
        //     $content = '<h2 style="text-align: center">ERROR 404: NOT FOUND<h2>';
        // }
        // return str_replace('{{content}}', $content, $layout);
    }
}
