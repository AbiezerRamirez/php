<?php
class Vehiculo
{
    private $matricula;
    private $modelo;

    protected function __construct($matricula, $modelo)
    {
        $this->matricula = $matricula;
        $this->modelo = $modelo;
    }

    protected function getMatricula()
    {
        return $this->matricula;
    }

    protected function getModelo()
    {
        return $this->modelo;
    }

    function __toString()
    {
        return "$this->matricula - $this->modelo";
    }
}