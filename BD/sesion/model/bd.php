<?php
// $conexion = new PDO('mysql:dbname=login;host=127.0.0.1', 'root', '');
// $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


// function validar($user, $password, $conexion)
// {
//     try {
//         $stm = $conexion->prepare('select * from usuarios where user = :p1');
//         $stm->bindParam(':p1', $user);
//         $stm->execute();

//         $array = $stm->fetch(PDO::FETCH_ASSOC);

//         if ($array > 0) {
//             if ($password == $array['password']) {
//                 $_SESSION['user'] = $user;
//                 return true;
//             }
//         }
//         return false;
//     } catch (Exception $e) {
//         die($e->getMessage());
//     }
// }

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

    // public function mostrarAlumnos()
    // {
    //     $usuarios = $this->executeQueryArray("select * from alumnos");
    //     echo '<table class="highlight" border="1">';
    //     echo "<tr>";
    //     foreach ($usuarios[0] as $clave => $valor) {
    //         echo '<th>' . $clave . '</th>';
    //     }
    //     echo "</tr>";
    //     foreach ($usuarios as $usuario) {
    //         echo "<tr>";
    //         foreach ($usuario as  $valor) {
    //             echo '<td>' . $valor . '</td>';
    //         }
    //         echo '<td class="material-icons"><a href="php/eliminarUsuario.php?id=' . $usuario['id'] . '">delete</a></td>';
    //         echo "</tr>";
    //     }
    //     echo '</table>';
    // }

    public function disconect()
    {
        $this->conexion = null;
    }
}
