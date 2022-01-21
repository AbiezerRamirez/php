<?php
require_once('funciones.php');
class ClientController
{
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
            $user = new Client($data['correoe'], $data['contras']);

            if ($user->register($data)) {
                $path = 'succes=1';
            } else {
                $path = 'error=1';
            }

            $user->disconect();
        }
        header("location: ../../index.php?page=register&$path");
        exit;
    }

    public static function update()
    {
        $data = array(
            'dni' => $_POST['dni'],
            'nombre' => $_POST['name'],
            'correoe' => $_POST['mail'],
            'direccion' => $_POST['direction'],
        );
        if ($_POST['pass'] != '') {
            $data['contras'] = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        }

        if (!trimArray($data)) {
            $client = new Client();
        }
    }

    public static function login()
    {
        $mail = $_POST['mail'];
        $password = $_POST['pass'];
        $path = 'error=2';

        if (!trimString($mail) && !trimString($password)) {
            $user = new Client($mail, $password);

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

    public static function logout()
    {
        session_start();
        $_SESSION = array();
        session_destroy();
        header("location: ../../index.php");
    }
}
