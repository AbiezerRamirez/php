<?php
// require_once('bd.php');
class Client extends Queries
{
    private $data;

    function __construct(array $data)
    {
        parent::__construct();
        $this->data = $data;
    }

    function getData()
    {
        return $this->data;
    }

    function login()
    {
        if ($this->clientExists('correoe', $this->data['correoe'])) {
            $client = parent::executeQueryArray("select * from cliente where correoe = '" . $this->data['correoe'] . "'");
            $client = $client[0];
            if (password_verify($this->data['password'], $client['contras'])) {
                $this->data =  array(
                    'id' => $client['idcliente'],
                    'dni' => $client['dni'],
                    'nombre' => $client['nombre'],
                    'correoe' => $client['correoe'],
                    'direccion' => $client['direccion']
                );
                return true;
            }
        }
        return false;
    }

    function register()
    {
        if (!$this->clientExists('correoe', $this->data['correoe'])) {
            parent::insertKeyValuesArray('cliente', $this->data);
            return true;
        }
        return false;
    }

    function update($id)
    {
        if ($this->clientExists('idcliente', $id)) {
            parent::updateKeyValuesArray('cliente', $this->data, "idcliente = $id");
            $client = parent::executeQueryArray("select * from cliente where idcliente = '$id'");
            $client = $client[0];
            $this->data =  array(
                'id' => $client['idcliente'],
                'dni' => $client['dni'],
                'nombre' => $client['nombre'],
                'correoe' => $client['correoe'],
                'direccion' => $client['direccion']
            );
            return true;
        }
        return false;
    }

    function getFacturas($id)
    {
        return parent::executeQueryArray("select * from compra where idcliente = '$id'");
    }

    function clientExists($column, $value)
    {
        return parent::exists('cliente', $column, $value);
    }

    function exit()
    {
        parent::disconect();
    }
}
