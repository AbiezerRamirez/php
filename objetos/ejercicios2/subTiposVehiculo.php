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
    
}
