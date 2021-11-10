<?php
class Coche extends Terrestre
{
    private $aireAcondicionado;

    function __construct($matricula, $modelo, $nRuedas, $aireAcondicionado)
    {
        parent::__construct($matricula, $modelo, $nRuedas);
        $this->aireAcondicionado = $aireAcondicionado;
    }

    function setAireAcondicionado($aireAcondicionado)
    {
        $this->aireAcondicionado = $aireAcondicionado;
    }

    function getAireAcondicionado()
    {
        return $this->aireAcondicionado;
    }

    function __toString()
    {
        return parent::__toString() . " - $this->AireAcondicionado";
    }
}

class Moto extends Terrestre
{
    private $color;

    function __construct($matricula, $modelo, $nRuedas, $color)
    {
        parent::__construct($matricula, $modelo, $nRuedas);
        $this->color = $color;
    }

    function setColor($color)
    {
        $this->color = $color;
    }

    function getColor()
    {
        return $this->color;
    }

    function __toString()
    {
        return parent::__toString() . " - $this->color";
    }
}

class Barco extends Acuatico
{
    private $motor;

    function __construct($matricula, $modelo, $eslora, $motor)
    {
        parent::__construct($matricula, $modelo, $eslora);
        $this->motor = $motor;
    }

    function setMotor($motor)
    {
        $this->motor = $motor;
    }

    function getMotor()
    {
        return $this->motor;
    }

    function __toString()
    {
        return parent::__toString() . " - $this->motor";
    }
}

class Submarino extends Acuatico
{
    private $profundidadMaxima;

    function __construct($matricula, $modelo, $eslora, $profundidadMaxima)
    {
        parent::__construct($matricula, $modelo, $eslora);
        $this->profundidadMaxima = $profundidadMaxima;
    }

    function setProfundidadMaxima($profundidadMaxima)
    {
        $this->profundidadMaxima = $profundidadMaxima;
    }

    function getProfundidadMaxima()
    {
        return $this->profundidadMaxima;
    }

    function __toString()
    {
        return parent::__toString() . " - $this->profundidadMaxima";
    }
}

class Avion extends Aereo
{
    private $tiempoMaxVuelo;

    function __construct($matricula, $modelo, $nAsientos, $tiempoMaxVuelo)
    {
        parent::__construct($matricula, $modelo, $nAsientos);
        $this->tiempoMaxVuelo = $tiempoMaxVuelo;
    }

    function setTiempoMaxVuelo($tiempoMaxVuelo)
    {
        $this->tiempoMaxVuelo = $tiempoMaxVuelo;
    }
    
    function getTiempoMaxVuelo()
    {
        return $this->tiempoMaxVuelo;
    }

    function __toString()
    {
        return parent::__toString() . "$this->tiempoMaxVuelo";
    }
}

class Helicopero extends Aereo
{
    private $helices;

    function __construct($matricula, $modelo, $nAsientos, $helices)
    {
        parent::__construct($matricula, $modelo, $nAsientos);
        $this->helices = $helices;
    }

    function setHelices($helices)
    {
        $this->helices = $helices;
    }
    
    function getHelices()
    {
        return $this->helices;
    }

    function __toString()
    {
        return parent::__toString() . "$this->helices";
    }
}
