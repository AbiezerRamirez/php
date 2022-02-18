<?php
require_once('funciones.php');
// include_once('Regex.php');
class ClientController
{
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

        if (!trimArray($data)) {
            if (preg_match(Regex::$dniPattern, $data['dni'])) {
                echo 'funciona';
                if (preg_match(Regex::$emailPattern, $data['correoe'])) {
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

        if (!trimArray($dataPost)) {
            if (preg_match(Regex::$dniPattern, $dataPost['dni'])) {
                if (preg_match(Regex::$emailPattern, $dataPost['correoe'])) {
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

    public static function login()
    {
        $data = array(
            'correoe' => $_POST['mail'],
            'password' => $_POST['pass']
        );
        $message = 'error=2';

        if (!trimArray($data)) {
            $client = new Client($data);

            if ($client->login()) {
                session_start();
                $_SESSION['client'] = $client->getData();
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
