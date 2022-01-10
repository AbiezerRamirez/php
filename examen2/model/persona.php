<?php
class Persona
{
    private $dni;
    private $tipo;
    private $nombre;
    private $avatar;


    public function __construct($dni, $tipo, $nombre, $avatar)
    {
        $this->dni;
        $this->tipo;
        $this->nombre;
        $this->avatar;
    }

    // SETTERS

    public function setDNI($dni)
    {
        $this->dni=$dni;
    }

    public function setTipo($tipo)
    {
        $this->tipo=$tipo;
    }

    public function setNombre($nombre)
    {
        $this->nombre=$nombre;
    }

    public function setAvatar($avatar)
    {
        $this->avatar=$avatar;
    }

    // GETTERS
    
    public function getDNI()
    {
        return $this->dni;
    }

    public function getTipo()
    {
        return $this->tipo;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getAvatar()
    {
        return $this->avatar;
    }
}
