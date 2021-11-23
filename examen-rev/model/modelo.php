<?php
class Modelo
{
    protected $conexion;

    public function __construct()
    {
        
    }

    public function buscarAlimentosPorNombre($nombre)
    {
        $nombre = htmlspecialchars($nombre);
        try {
            $sql = "select * from alimentos where nombre like '" . $nombre . "'order by ...";
            $alimentos = array();
            foreach ($this->conexion->query($sql) as $row) {
                $alimentos[] = $row;
            }
        } catch (Exception $e) {
            exit("Error: " . $e->getMessage());
        }
    }

    public function insertarAlimento($n, $e, $p, $hc, $f, $g) {
        $n = htmlspecialchars($n);

        $sql = "INSERT INTO alimentos (nombre, energia, proteina, hidratocarbono, fibra, grasa) values (?,?,?,?,?,?)";
    }
}