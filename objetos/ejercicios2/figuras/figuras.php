<?php
include('interfaceFiguras.php');

class Cuadrado implements Figura
{
    private $lado;

    function __construct($lado)
    {
        $this->lado = $lado;
    }

    public function perimetro()
    {
        return $this->lado*4;
    }

    public function area()
    {
        return $this->lado * $this->lado;
    }

    public function escalar($escala)
    {
        $this->lado = $this->lado * $escala;
    }
    
    public function imprimir()
    {
        echo $this->lado;
    }
}

class Rectangulo implements Figura
{
    private $ancho;
    private $alto;

    function __construct($ancho, $alto)
    {
        $this->ancho = $ancho;
        $this->alto = $alto;
    }

    public function perimetro()
    {
        return ($this->ancho * 2) + ($this->alto * 2);
    }

    public function area()
    {
        return $this->ancho * $this->alto;
    }

    public function escalar($escala)
    {
        $this->ancho = $this->ancho * $escala;
        $this->alto = $this->alto * $escala;
    }
    
    public function imprimir()
    {
        echo "Ancho: $this->ancho - Alto: $this->alto";
    }
}

class Triangulo implements Figura
{
    private $ancho;
    private $alto;

    function __construct($ancho, $alto)
    {
        $this->ancho = $ancho;
        $this->alto = $alto;
    }

    public function perimetro()
    {
        return $this->ancho + ($this->alto * 2);
    }

    public function area()
    {
        return ($this->ancho * $this->alto) / 2;
    }

    public function escalar($escala)
    {
        $this->ancho = $this->ancho * $escala;
        $this->alto = $this->alto * $escala;
    }
    
    public function imprimir()
    {
        echo "Ancho: $this->ancho - Alto: $this->alto";
    }
}

class Circulo implements Figura
{
    private $radio;

    function __construct($radio)
    {
        $this->radio = $radio;
    }

    public function perimetro()
    {
        return (3.1415 * $this->radio * 2);
    }

    public function area()
    {
        return (3.1415 * pow($this->radio, 2));
    }

    public function escalar($escala)
    {
        $this->radio = $this->radio * $escala;
    }
    
    public function imprimir()
    {
        echo $this->radio;
    }
}

// Forzar tipos de variables:

/* 
settype($variable,"nuevo_tipo");

    Elementos que acepta "nuevo_tipo·:
        "integer"
        "double"
        "string"
        "array"
        "object" 
*/

// O

/* 
$variable = "23";
$variable = (int) $variable; 

    Que acepta los tipos de dato:
        (int), (integer) - fuerza a entero (integer)
        (real), (double), (float) - fuerza a número con decimales (coma flotante)
        (string) - fuerza a cadena (string)
        (array) - fuerza a array (array)
        (object) - fuerza a objeto (object)
        (unser) - fuerza a null
        (binary) - fuerza a "binary string"
*/