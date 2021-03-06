<?php
class banco
{
    private $direccion;
    private $capital;
    private $nombre;

    public function __construct()
    {
        $params = func_get_args();
        $numParams = func_num_args();
        $constructor = '__construct' . $numParams;
    
        if (method_exists($this, $constructor)) {
            call_user_func_array(array($this, $constructor), $params);
        }
    }
    
    public function __construct1($nombre)
    {
        $this->capital = 5200000;
        $this->nombre = $nombre;
        $this->direccion = '';
    }
    
    public function __construct2($nombre, $capital)
    {
        $this->capital = $capital;
        $this->nombre = $nombre;
        $this->direccion = '';
    }
    
    public function __construct3($nombre, $capital, $direccion)
    {
        $this->capital = $capital;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
    }

    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    public function setCapital($capital)
    {
        $this->capital = $capital;
    }

    public function __toString()
    {
        return "$this->nombre - $this->capital";
    }
}