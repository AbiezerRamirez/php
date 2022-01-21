<?php
// require_once('bd.php');
class User extends Queries
{
    private $data;
    private $mail;
    private $password;

    function __construct($mail, $password)
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
            // var_dump($client);
            // // $password = parent::executeQueryArray("select contras from cliente where correoe = '$this->mail'");
            if (password_verify($this->password, $client['contras'])) {
                $this->data =  array(
                    $client['dni'],
                    $client['nombre'],
                    $client['correoe'],
                    $client['direccion']
                );
                return true;
            }
            // if (password_verify($pswd, $password[0]['password'])) {
            //     return true;
            // }
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
