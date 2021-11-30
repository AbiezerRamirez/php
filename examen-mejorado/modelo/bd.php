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

            $query = $sql[sizeof($array)-1];


            $i = 1;
            $stm = $this->conexion->prepare($query);
            echo $query . '<br>';
            foreach ($array as $key => $value) {
                $k = ':k' . $i;
                $v = ':v' . $i;
                $stm->bindParam($k, $key);
                $stm->bindParam($v, $value);
                echo ':k' . $i . '<br>';
                echo $key  . '<br>';
                echo ':v' . $i++  . '<br>';
                echo $value  . '<br>';
            }
            // $stm->execute();
            // foreach ($array as $key => $value) {
            //     $query = str_ireplace(':k'.$i++, $key, $query);
            // } 
            // $stm = $this->conexion->prepare($query);
            
            // $i = 0;
            // while(current($array)) {
            //     $v = current($array);
            //     $k = key($array);
            //     $stm->bindParam(':k'.$i, $k);
            //     $stm->bindParam(':v'.$i, $v);
            //     $i++;
            //     next($array);
            // }

            // for ($i = 1; $i < sizeof($array)+1; $i++) {
            //     $v = current($array);
            //     $k = key($array);
            //     $stm->bindParam(':k'.$i, $k);
            //     $stm->bindParam(':v'.$i, $v);
            //     next($array);
            // }

            // while (current($array)) {
            //     $k = ':k' . $i++;
            //     $v = ':v' . $i++;
            //     // str_ireplace($k, key($array), $query);
            //     $stm->bindParam($k, key($array));
            //     $stm->
            //     next($array);
            // }
            
            // while (current($array)) {
            //     // echo $i++ . '<br>';
            //     echo ':k' .$i .'<br>';
            //     echo key($array) . '<br>';
            //     echo ':v' .$i++ .'<br>';
            //     echo current($array) . '<br>';
            //     next($array);
            // }
            
            // $stm->execute($array);
        } catch (Exception $e) {
            die($e->getMessage());
        }
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