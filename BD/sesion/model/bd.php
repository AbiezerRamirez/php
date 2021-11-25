<?php
$conexion = new PDO('mysql:dbname=login;host=127.0.0.1', 'root', '');
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


function validar($user, $password, $conexion)
{
    try {
        $stm = $conexion->prepare('select * from usuarios where user = :p1');
        $stm->bindParam(':p1', $user);
        $stm->execute();
        
        $array = $stm->fetch(PDO::FETCH_ASSOC);
        
        if ($array > 0) {
            if ($password == $array['password']) {
                $_SESSION['user'] = $user;
                return true;
            }
        }
        return false;
        
    } catch (Exception $e) {
        die($e->getMessage());
    }
}

class GBD {
    private $conexion;
    
    public function __construct($name)
    {
        try {
            $conexion = new PDO("mysql:dbname=$name;host=127.0.0.1", 'root', '');
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            die($e->getMessage());
        }
        
    }
    
    public function executeQuery($query)
    {
        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute();
            // return true;??? PROBAR
        } catch (Exception $e) {
            die($e->getMessage());
        }
        
    }
    
    public function add()
    {
        
    }

    public function getElementsArray($query)
    {
        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute();
            return $stm->fetch(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    


    public function disconect()
    {
        $this->conexion = null;
    }
}