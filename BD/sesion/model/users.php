<?php

class User
{

    private $conexion;

    function __construct()
    {
        try {
            $this->conexion = new PDO('mysql:host=localhost;dbname=usuarioej', 'root', '');
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die($e->getMessage()); // como exit
        }
    }

    function validate($user, $password)
    {
        try {
            $stm = $this->conexion->prepare("select * from usuarios where user = :user");
            $stm->bindParam(':user', $user);
            $stm->execute();

            $array = $stm->fetchAll(PDO::FETCH_ASSOC);

            if (sizeof($array) > 0) {
                if ($array['password'] == $password) {
                    session_start();
                    $_SESSION['name'] = $user;
                }
            } else {
                // header('') ?????????
            }

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
