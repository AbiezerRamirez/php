<?php
include('banco.php');
class CuentaCorriente
{
    private $limite;
    private $nombre;
    private $saldo;
    private $banco;
    private $dni;

    public function __construct()
    {
        $params = func_get_args();
        $num_params = func_num_args();
        $constructor = '__construct' . $num_params;

        if (method_exists($this, $constructor)) {
            call_user_func_array(array($this, $constructor), $params);
        }
    }

    public function __construct1($saldo)
    {
        $this->saldo = $saldo;
        $this->nombre = '';
        $this->limite = 0;
        $this->dni = '';
    }

    public function __construct2($nombre, $dni)
    {
        $this->nombre = $nombre;
        $this->limite = 50;
        $this->dni = $dni;
        $this->saldo = 0;
    }

    public function __construct3($saldo, $limite, $dni)
    {
        $this->limite = $limite;
        $this->saldo = $saldo;
        $this->nombre = '';
        $this->dni = $dni;
    }

    public function setBanco($banco)
    {
        $this->banco = (object) $banco;
    }

    public function getBanco()
    {
        return $this->banco;
    }

    public function sacarDinero($dinero)
    {
        if ($this->saldo - $dinero < $this->limite * (-1)) {
            echo 'no se ha podido realizar la operacion';
        } else {
            $this->saldo -= $dinero;
            echo 'operacion realizada con exito';
        }
    }

    public function ingresarDinero($dinero)
    {
        if ($dinero < 1) {
            echo 'error operacion no valida';
        } else {
            $this->saldo += $dinero;
        }
    }

    public function mostrarBanco() {
        echo $this->banco;
    }

    public function mostrarInformacion()
    {
        echo "$this->saldo - $this->limite - $this->nombre - $this->dni";
    }
}

