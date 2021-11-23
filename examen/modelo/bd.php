<?php
class GBD
{
    private $conexion;

    function __construct()
    {
        try {
            $this->conexion= new PDO('mysql:host=localhost;dbname=alimentos;charset=utf8', 'root', '');
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);	
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    function consultar()
    {
        try {
            $stm = $this->conexion->prepare('select * from alimentos');
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    function insertar($alimento)
    {
        try {
            $stm = $this->conexion->prepare('insert into alimentos (nombre, energia, proteina, hidratocarbono, fibra, grasatotal) values (?, ?, ?, ?, ?, ?)');
            $stm->execute($alimento);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    function buscarNombre($nombre)
    {
        try {
            $stm = $this->conexion->prepare('select * from alimentos where nombre = ?');
            $stm->execute(array($nombre));

            $result = $stm->fetchAll(PDO::FETCH_ASSOC);

            return $result;

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    function buscarCodigo($codigo)
    {
        try {
            $stm = $this->conexion->prepare('select * from alimentos where id = ?');
            $stm->execute(array($codigo));

            $result = $stm->fetchAll(PDO::FETCH_ASSOC);

            return $result;

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    function salir()
    {
        $this->conexion = null;
    }
}