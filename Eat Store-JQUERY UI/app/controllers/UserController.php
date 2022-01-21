<?php
require_once('funciones.php');
class UserController
{

    // public function __construct()
    // {
    //     $this->conexion=Conexion::conexion();
    // }

    public static function register()
    {
        $data = array(
            'dni' => $_POST['dni'],
            'nombre' => $_POST['user'],
            'correoe' => $_POST['mail'],
            'direccion' => $_POST['direction'],
            'contras' => password_hash($_POST['pass'], PASSWORD_DEFAULT)
        );
        $path = 'error=2';

        if (!trimArray($data)) {
            $user = new User($data['correoe'], $data['contras']);

            if ($user->register($data)) {
                $path='succes=1';
            } else {
                $path = 'error=1';
            }

            $user->disconect();
        }
        header("location: ../../index.php?page=register&$path");
        exit;
    }
    
    public static function login()
    {
        $mail = $_POST['mail'];
        $password = $_POST['pass'];
        $path = 'error=2';
        
        if (!trimString($mail) && !trimString($password)) {
            $user = new User($mail, $password);
            
            if ($user->login($password)) {
                session_start();
                $_SESSION['client'] = $user->getData();
                $user->disconect();
                header("location: ../../index.php");
                exit;
            }
            
            $path = 'error=3';
            $user->disconect();
        }
        header("location: ../../index.php?page=login&$path");
        exit;
    }
}