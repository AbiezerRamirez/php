<?php
class Vehiculo
{
    private $matricula;
    private $modelo;

    public function __construct($matricula, $modelo)
    {
        $this->matricula = $matricula;
        $this->modelo = $modelo;
    }

    function getMatricula()
    {
        return $this->matricula;
    }

    function getModelo()
    {
        return $this->modelo;
    }

    function __toString()
    {
        return "$this->matricula - $this->modelo";
    }
}