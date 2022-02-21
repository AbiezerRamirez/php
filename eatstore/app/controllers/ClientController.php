<?php
require_once('funciones.php');
// include_once('Regex.php');
class ClientController
{
    // metodo para registrar un nuevo usuario
    public static function register()
    {
        $data = array(
            'dni' => strtoupper($_POST['dni']),
            'nombre' => $_POST['user'],
            'correoe' => strtolower($_POST['mail']),
            'direccion' => $_POST['direction'],
            'contras' => password_hash($_POST['pass'], PASSWORD_DEFAULT)
        );
        $message = 'error=2';
// comprueba que los datos no esten vaios
        if (!trimArray($data)) {
            if (preg_match(Regex::$dniPattern, $data['dni'])) { // regex para comprobar el dni
                echo 'funciona';
                if (preg_match(Regex::$emailPattern, $data['correoe'])) { // regex para comprobar el correo
                    $client = new Client($data);

                    if (!$client->clientExists('dni', $data['dni'])) {
                        $client->register() ? $message = 'succes=1' : $message = 'error=1';
                    } else {
                        $message = 'error=7';
                    }

                    $client->disconect();
                } else {
                    $message = 'error=6';
                }
            } else {
                echo 'no funciona';
                $message = 'error=5';
            }
        }
        header("location: ../../index.php?page=register&$message");
        exit;
    }
// metodo para actualizar los datos del usuario
    public static function update()
    {
        $dataPost = array(
            'dni' => strtoupper($_POST['dni']),
            'nombre' => $_POST['name'],
            'correoe' => strtolower($_POST['mail']),
            'direccion' => $_POST['direction'],
        );
        $finalData = array();
        if ($_POST['pass'] != '') {
            $finalData['contras'] = password_hash($_POST['pass'], PASSWORD_DEFAULT);
        }
        $message = 'error=2';
// comprobacion de que los datos no esten vacios
        if (!trimArray($dataPost)) {
            if (preg_match(Regex::$dniPattern, $dataPost['dni'])) { // regex para comprobar el dni
                if (preg_match(Regex::$emailPattern, $dataPost['correoe'])) { // regex para comprobar el correo
                    session_start();
                    foreach ($_SESSION['client'] as $key => $value) {
                        if ($key != 'id') {
                            if ($value != $dataPost[$key]) {
                                $finalData = array_merge($finalData, array($key => $dataPost[$key]));
                            }
                        }
                    }
                    if (!empty($finalData)) {
                        $client = new Client($finalData);
                        if ($client->update($_SESSION['client']['id'])) {
                            $_SESSION['client'] = $client->getData();
                            $client->disconect();
                            header("location: ../../index.php?page=profile");
                            exit;
                        }
                        $client->disconect();
                        $message = 'error=4';
                    } else {
                        header("location: ../../index.php?page=profile");
                        exit;
                    }
                } else {
                    $message = 'error=6';
                }
            } else {
                $message = 'error=5';
            }
        }
        header("location: ../../index.php?page=updateProfile&$message");
        exit;
    }
// metodo para iniciar sesion
    public static function login()
    {
        $data = array(
            'correoe' => $_POST['mail'],
            'password' => $_POST['pass']
        );
        $message = 'error=2';
// compruba losdatos recibidos
        if (!trimArray($data)) {
            $client = new Client($data);
// en caso de que login retorne true inicia sesion y almacena los datos del cliente dentro de la sesion
            if ($client->login()) {
                session_start();
                $_SESSION['client'] = $client->getData();
                $_SESSION['facturas'] = $client->getFacturas($_SESSION['client']['id']);
                $client->disconect();
                header("location: ../../index.php");
                exit;
            }

            $message = 'error=3';
            $client->disconect();
        }
        header("location: ../../index.php?page=login&$message");
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
