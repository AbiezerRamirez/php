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

    // Inserta un array de pares clave=>valor en la base de datos (1-7)

    public function insertKeyValuesArray($table, $array)
    {
        try {
            $sql = array(
                "insert into $table (:k1) values (:v1)",
                "insert into $table (:k1, :k2) values (:v1, :v2)",
                "insert into $table (:k1, :k2, :k3) values (:v1, :v2, :v3)",
                "insert into $table (:k1, :k2, :k3, :k4) values (:v1, :v2, :v3, :v4)",
                "insert into $table (:k1, :k2, :k3, :k4, :k5) values (:v1, :v2, :v3, :v4, :v5)",
                "insert into $table (:k1, :k2, :k3, :k4, :k5, :k6) values (:v1, :v2, :v3, :v4, :v5, :v6)",
                "insert into $table (:k1, :k2, :k3, :k4, :k5, :k6, :k7) values (:v1, :v2, :v3, :v4, :v5, :v6, :v7)"
            );
            $i = 1;
            $query = $sql[sizeof($array)-1];
            foreach ($array as $key => $value) {
                $query = str_replace(':k'.$i, $key, $query);
                if (is_numeric($value)) 
                    $query = str_replace(':v'.$i++, $value, $query);
                else 
                    $query = str_replace(':v'.$i++, "'".$value."'", $query);
            }
            $this->executeQuery($query);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // Actualiza de la tabla los datos pasados atravez de un array de claves -> valores
    public function updateKeyValuesArray($table, $columns, $condition) 
    {
        try {
            $sql = array(
                "update $table set :k1 = ':v1' where $condition",
                "update $table set :k1 = ':v1', :k2 = ':v2' where $condition",
                "update $table set :k1 = ':v1', :k2 = ':v2', :k3 = ':v3' where $condition",
                "update $table set :k1 = ':v1', :k2 = ':v2', :k3 = ':v3', :k4 = ':v4' where $condition",
                "update $table set :k1 = ':v1', :k2 = ':v2', :k3 = ':v3', :k4 = ':v4', :k5 = ':v5' where $condition",
                "update $table set :k1 = ':v1', :k2 = ':v2', :k3 = ':v3', :k4 = ':v4', :k5 = ':v5', :k6 = ':v6' where $condition",
                "update $table set :k1 = ':v1', :k2 = ':v2', :k3 = ':v3', :k4 = ':v4', :k5 = ':v5', :k6 = ':v6', :k7 = ':v7' where $condition",
            );
            $i = 1;
            $query = $sql[sizeof($columns)-1];
            foreach ($columns as $key => $value) {
                $query = str_replace(':k'.$i, $key, $query);
                $query = str_replace(':v'.$i++, $value, $query);
            }
            $this->executeQuery($query);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    // Elimina un elemento de la tabla indicada
    
    public function deleteRow($table, $condition)
    {
        try {
            $this->executeQuery("delete from $table where $condition");
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    
    // Compruba si existe un valor dado en la base de datos
    
    public function exists($table, $column, $value, $like = false)
    {
        try {
            if ($like) $query = "select $column from $table where $column like '$value'";
            else $query = "select $column from $table where $column = '$value'";

            $element = $this->executeQueryArray($query);
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