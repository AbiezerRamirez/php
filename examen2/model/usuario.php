<?php
require_once('bd.php');
require_once('persona.php');
class Usuario extends GBD
{
    private $user;
    private $password;
    private $dni;
    // private $persona;

    function __construct($user, $password)
    {
        parent::__construct('exdiciembre');
        $this->password = $password;
        $this->user = $user;
    }

    function login()
    {
        if($this->userExists()) {
            $password = parent::executeQueryArray("select clave, dni from alias_clave where alias = '$this->user'");
            if (password_verify($this->password, $password[0]['clave'])) {
                $this->dni = $password[0]['dni'];
                return true;
            }
        }
        return false;
    }

    function userExists() {
        return parent::exists('alias_clave', 'alias', $this->user);
    }

    function getUser()
    {
        return $this->user;
    }

    function getDNI()
    {
        return $this->dni;
    }

    // function getPersona()
    // {
    //     return $this->persona;
    // }

    function exit()
    {
        parent::disconect();
    }
}
