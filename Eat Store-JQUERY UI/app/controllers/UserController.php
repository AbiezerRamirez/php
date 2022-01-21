<?php
require_once('funciones.php');
class UserController {

    // public function __construct()
    // {
    //     $this->conexion=Conexion::conexion();
    // }

    public static function register() {

        $data = array(
            'dni' => $_POST['dni'],
            'user' => $_POST['user'],
            'mail' => $_POST['mail'],
            'direction' => $_POST['direction'],
            'pass' => $_POST['pass']
        );
        
        if (!trimArray($data)) {

            $user = new User('hola', 'hola');
            echo 'hola1';
            // echo $_POST['dni'] . '<br>';
            // echo $_POST['user'] . '<br>';
            // echo $_POST['mail'] . '<br>';
            // echo $_POST['direction'] . '<br>';
            // echo $_POST['pass'] . '<br>';
        } else {
            echo 'hola';
        }
    }

}