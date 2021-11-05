<?php
class Usuario
{
    // atributos
    public $apellido;
    public $nombre;
    public $fcreacion;
    protected $idioma = 'es_ES';

    public function __construct($nombre, $apellido)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->fcreacion = time();
    }

    // destructor
    public function __destruct()
    {
        echo '<p>Eliminado ' . $this->apellido . '</p>';
    }

    public function __toString()
    {
        return "Usuario: $this->nombre $this->apellido - {$this->formatearFecha()}";
    }
    
    public function definirIdioma($idioma)
    {
        $this->idioma = $idioma;
    }
    
    public function formatearFecha()
    {
        setlocale(LC_TIME, $this->idioma);
        return strftime('%c', $this->fcreacion);
    }
}

class usuarioTipo extends Usuario
{
    private $tipo;
    
    function __construct($nombre, $tipo)
    {
        parent::__construct($nombre, 'APE');
        $this->tipo = $tipo;
    }
    
    function getTipo()
    {
        return $this->tipo;
    }
    
    function __toString()
    {
        return parent::__toString() . " - $this->tipo";
        // return "Usuario: $this->nombre $this->apellido - " . $this->formatearFecha() . " - $this->tipo";
    }
}