<?php
class GBD
{
    private $conexion;

    public function __construct($name)
    {
        try {
            $this->conexion = new PDO("mysql:dbname=$name;host=127.0.0.1", 'root', '');
            $this->conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // Ejecuta una consulta

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

    // Ejecuta una consulta devolviendo un Array Asociativo
    
    public function executeQueryArray($query)
    {
        try {
            $stm = $this->conexion->prepare($query);
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    public function agregarUsuario($user, $password)
    {
        $this->executeQuery("insert into usuarios (user, password) values ('$user', '$password')");
    }

    // Elimina un elemento de la tabla indicada
    
    public function delete($table, $row, $id)
    {
        try {
            $this->executeQuery("delete from $table where $row = $id");
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    // Compruba si existe una fila dada en la base de datos
    
    public function exists($table, $column, $value)
    {
        try {
            $element = $this->executeQueryArray("select $column from $table where $column = '$value'");
            if (empty($element)) return false;
            return true;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function disconect()
    {
        $this->conexion = null;
    }
}
