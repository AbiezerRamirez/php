<?php
// require_once('bd.php');
class User extends Queries
{
    private $user;
    private $password;

    function __construct($user, $password)
    {
        parent::__construct();
        $this->password = $password;
        $this->user = $user;
    }

    function login()
    {
        if($this->userExists()) {
            $password = parent::executeQueryArray("select password from usuarios where user = '$this->user'");
            if (password_verify($this->password, $password[0]['password'])) {
                return true;
            }
        }
        return false;
    }
    
    function register()
    {
        if(!$this->userExists()) {
            $password = password_hash($this->password, PASSWORD_DEFAULT);
            parent::insertKeyValuesArray('usuarios', array('user' => $this->user, 'password' => $password));
            return true;
        }
        return false;
    }

    function userExists() {
        return parent::exists('usuarios', 'user', $this->user);
    }

    function getUser()
    {
        return $this->user;
    }

    function exit()
    {
        parent::disconect();
    }
}
