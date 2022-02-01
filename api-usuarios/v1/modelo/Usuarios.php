<?php
include_once 'Conexion.php';
class Usuarios extends Conexion
{
    public function  __construct()
    {
        parent::__construct();
    }

    public function buscar_todas_fotos()
    {
        try {

            $sql = "Select id,nombre,apellido,foto from usuarios";
            $enlace_datos = $this->conexion->prepare($sql);
            $enlace_datos->execute();
            $array = $enlace_datos->fetchAll(PDO::FETCH_ASSOC);
            $enlace_datos->closeCursor();
            return $array;
        } catch (PDOException $e) {
            exit("Error: " . $e->getMessage());
        }
    }
    public function buscar_paginado($inicio,$cantidad)
    {
        try {
            $objeto = new Usuarios();
            $maximo= $objeto->contar_usuarios();           
            if ($inicio< $maximo)
            {
                $cantidad=($cantidad+$inicio)>$maximo?$maximo:$cantidad;           
                $sql = "Select id,nombre,apellido,foto from usuarios limit $inicio,$cantidad";
                $enlace_datos = $this->conexion->prepare($sql);
                $enlace_datos->execute();
                $array = $enlace_datos->fetchAll(PDO::FETCH_ASSOC);
                $enlace_datos->closeCursor();
                return $array;
            }
            else
            {
            return $array=[];
            }
        } catch (PDOException $e) {
            exit("Error: " . $e->getMessage());
        }
    }
    public  function contar_usuarios()
    {
        $sql = "Select count(*) as total from usuarios ";
        $enlace_datos = $this->conexion->prepare($sql);        
        $enlace_datos->execute();
        $total = $enlace_datos->fetch(PDO::FETCH_ASSOC);
        $enlace_datos->closeCursor();        
        return $total['total'];
        
    }

    public function nombre($id)
    {
        $sql = "Select nombre from usuarios where id=:id";
        $enlace_datos = $this->conexion->prepare($sql);
        $enlace_datos->bindParam(':id', $id);
        $enlace_datos->execute();
        $array = $enlace_datos->fetch(PDO::FETCH_ASSOC);
        $enlace_datos->closeCursor();
        return $array['nombre'];
    }

    public function buscarDatoConcreto($id)
    {
        $sql = "Select id,nombre,apellido,foto from usuarios where id=:id";
        $enlace_datos = $this->conexion->prepare($sql);
        $enlace_datos->bindParam(':id', $id);
        $enlace_datos->execute();
        $array = $enlace_datos->fetch(PDO::FETCH_ASSOC);
        $enlace_datos->closeCursor();
        return $array;
    }
    public function buscarNombre($nombre,$orden)
    {
        $array=[];
        $cadenaBusqueda="$nombre%";        
        $sql="Select id,nombre,apellido,foto from usuarios where nombre like ? order by nombre $orden";
        //$sql = "Select id,nombre,apellido,foto from usuarios where nombre like ? orden by nombre $orden";
        $enlace_datos = $this->conexion->prepare($sql);
        $enlace_datos->bindValue(1, $cadenaBusqueda, PDO::PARAM_STR);        
        $enlace_datos->execute();
        $array = $enlace_datos->fetchALL(PDO::FETCH_ASSOC);
        $enlace_datos->closeCursor();
        return $array;
    }

    public function insertarDatos($datos)
    {
        $sql = "INSERT INTO usuarios (nombre, apellido) VALUES ( :nombre, :apellido)";
        $enlace_datos = $this->conexion->prepare($sql);
        $enlace_datos->bindParam(':nombre', $datos["nombre"]);
        $enlace_datos->bindParam(':apellido', $datos["apellido"]);
        $enlace_datos->execute();
        $id = $this->conexion->lastInsertId();
        $enlace_datos->closeCursor();
        return $id;
    }
    
    public function borrarUsuario($id)
    {

        $sqlConsulta = "select * from usuarios where id=:id";
        $ed = $this->conexion->prepare($sqlConsulta);
        $ed->bindParam(':id', $id);
        $ed->execute();
        $fila = $ed->fetch(PDO::FETCH_ASSOC);

        if ($fila) {
            $sql = "DELETE FROM usuarios WHERE id=:id";
            $enlace_datos = $this->conexion->prepare($sql);
            $enlace_datos->bindParam(':id', $id);
            $enlace_datos->execute();
            //compruebo si ese usuario tiene una imagen
            //la borro del servidor cuando lo elimino
            if ($fila['foto'] != null) {
                $nombre = $fila['foto'];
                unlink("./fotos/$nombre");
            }
            return true;
        } else {
            return false;
        }
        $ed->closeCursor();
    }


    public function actualizarUsuario($id, $datos)
    {
        $sqlConsulta = "select id from usuarios where id=:id";
        $ed = $this->conexion->prepare($sqlConsulta);
        $ed->bindParam(':id', $id);
        $ed->execute();
        $fila = $ed->fetch(PDO::FETCH_ASSOC);
        if ($fila) {
            $sql = "UPDATE usuarios SET nombre=:nombre, apellido=:apellido WHERE id=:id";
            $enlace_datos = $this->conexion->prepare($sql);
            $enlace_datos->bindParam(':nombre', $datos["nombre"]);
            $enlace_datos->bindParam(':apellido', $datos["apellido"]);
            $enlace_datos->bindParam(':id', $id);
            $enlace_datos->execute();
            return true;
        } else {
            return false;
        }
        $ed->closeCursor();
    }

    public function insertar_foto ($foto,$id)
    {

        $sql = "UPDATE usuarios SET  foto=:foto WHERE id=:id ";
        $enlace_datos = $this->conexion->prepare($sql);
        $enlace_datos->bindParam(':foto', $foto);
        $enlace_datos->bindParam(':id', $id);
        $enlace_datos->execute();
        $enlace_datos->closeCursor();
    }
}