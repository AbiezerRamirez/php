<?php
// require_once('bd.php');
class Client extends Queries
{
    private $data;
    private $mail;
    private $password;

    function __construct()
    {
        $params = func_get_args();
        $num_params = func_num_args();
        $funcion_constructor = '__construct' . $num_params;
        if (method_exists($this, $funcion_constructor)) {
            call_user_func_array(array($this, $funcion_constructor), $params);
        }
    }
    // function __construct($mail, $password)
    // {
    //     parent::__construct();
    //     $this->password = $password;
    //     $this->mail = $mail;
    // }

    function __construct0()
    {
        parent::__construct();
    }

    function __construct2($mail, $password)
    {
        parent::__construct();
        $this->password = $password;
        $this->mail = $mail;
    }

    function login()
    {
        if ($this->userExists()) {
            $client = parent::executeQueryArray("select * from cliente where correoe = '$this->mail'");
            $client = $client[0];
            if (password_verify($this->password, $client['contras'])) {
                $this->data =  array(
                    'dni' => $client['dni'],
                    'nombre' => $client['nombre'],
                    'correo' => $client['correoe'],
                    'direccion' => $client['direccion']
                );
                return true;
            }
        }
        return false;
    }

    function register($data)
    {
        if (!$this->userExists()) {
            parent::insertKeyValuesArray('cliente', $data);
            return true;
        }
        return false;
    }

    function getData()
    {
        return $this->data;
    }

    function userExists()
    {
        return parent::exists('cliente', 'correoe', $this->mail);
    }

    function exit()
    {
        parent::disconect();
    }
}
