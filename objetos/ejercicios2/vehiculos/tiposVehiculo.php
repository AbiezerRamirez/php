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
        if ($this->comprobarMatricula($matricula)) {
            parent::__construct($matricula, $modelo);
            $this->eslora = $eslora;
        } else {
            echo 'matricula no valida';
        }
    }
    
    function getEslora()
    {
        return $this->eslora;
    }
    
    function __toString()
    {
        return parent::__toString() . " - $this->eslora";
    }

    private function comprobarMatricula($matricula) {
        $letras = 'abcdefghijklmnñopqrstuvwxyz';
        $nLetras = 0;
        if (strlen($matricula) < 11 && strlen($matricula) > 2 ) {
            for ($i = 0; $i < strlen($matricula); $i++) {
                if (!str_contains($letras, strtolower($matricula[$i]))) {
                    return false;
                }
            }
            return true;
        }
        return false;
    }
}

class Aereo extends Vehiculo
{
    private $nAsientos;
    
    function __construct($matricula, $modelo, $nAsientos)
    {
        if ($this->comprobarMatricula($matricula)) {
            parent::__construct($matricula, $modelo);
            $this->nAsientos = $nAsientos;
        } else {
            echo 'Matricula no valida';
        }
    }
    
    function getAsientos()
    {
        return $this->nAsientos;
    }
    
    function __toString()
    {
        return parent::__toString() . " - $this->nAsientos";
    }

    private function comprobarMatricula($matricula) {
        $letras = 'abcdefghijklmnñopqrstuvwxyz';
        $numeros = 0;
        $nLetras = 0;
        if (strlen($matricula) == 10) {
            for ($i = 0; $i < strlen($matricula); $i++) {
                if (str_contains($letras, strtolower($matricula[$i]))) {
                    $nLetras++;
                } else if (ctype_digit($matricula[$i])) {
                    $numeros++;
                } else {
                    break;
                }
            }
            if ($numeros == 6 || $nLetras == 4) return true;
        }
        return false;
    }
}