<?php
class Terrestre extends Vehiculo
{
    private $nRuedas;

    function __construct($matricula, $modelo, $nRuedas)
    {
        
        if($this->comprobarMatricula($matricula)){
            parent::__construct($matricula, $modelo);
            $this->nRuedas = $nRuedas;
        } else {
            echo 'Error matricula no valida';
        }
    }
    
    function getRuedas()
    {
        return $this->nRuedas;
    }

    function __toString()
    {
        return parent::__toString() . " - $this->nRuedas";
    }

    private function comprobarMatricula($matricula) {
        $letras = 'abcdefghijklmnñopqrstuvwxyz';
        $numeros = 0;
        $nLetras = 0;
        if (strlen($matricula) == 7) {
            for ($i = 0; $i < strlen($matricula); $i++) {
                if (str_contains($letras, strtolower($matricula[$i]))) {
                    $nLetras++;
                } else if (ctype_digit($matricula[$i])) {
                    $numeros++;
                } else {
                    break;
                }
            }
            if ($numeros == 4 || $nLetras == 3) return true;
        }
        return false;
    }
}

class Acuatico extends Vehiculo
{
    private $eslora;
    
    function __construct($matricula, $modelo, $eslora)
    {
        parent::__construct($matricula, $modelo);
        $this->eslora;
    }
    
    function getEslora()
    {
        return $this->eslora;
    }

    function __toString()
    {
        return parent::__toString() . " - $this->eslora";
    }
}

class Aereo extends Vehiculo
{
    private $nAsientos;
    
    function __construct($matricula, $modelo, $nAsientos)
    {
        parent::__construct($matricula, $modelo);
        $this->nAsientos = $nAsientos;
    }
    
    function getAsientos()
    {
        return $this->nAsientos;
    }
    
    function __toString()
    {
        return parent::__toString() . " - $this->nAsientos";
    }
}