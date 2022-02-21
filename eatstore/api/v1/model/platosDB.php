<?php
require_once('db/Queries.php');
// clase modelo para la api de platos
class PlatosDB extends Queries
{
    public function __construct()
    {
        parent::__construct();
    }
// ejecuta el metodod executequery array de Queries y devuelve la respuesta con todods los platos de la base de datos
    public function listarPlatos()
    {
        $query = 'select * from plato';
        $platos = parent::executeQueryArray($query);
        return json_encode($platos);
    }
// ejecuta la funcion execute query array de Queries y devuelve el plato cuyo id recibe po parametro
    public function listarPlato($id)
    {
        $query = "select * from plato where idplato = '$id'";
        $plato = parent::executeQueryArray($query);
        $plato = $plato[0];
        return json_encode($plato);
    }
// Recibe por parametros una categoria y orden y devuelve lo platos que complan esas condiciones
    public function listarCategoria($categoria, $orden)
    {
        $query = "select * from plato where idcategoria = '$categoria' order by nombre $orden";
        $platos = parent::executeQueryArray($query);
        return json_encode($platos);
    }
// Metodo para actualizar la imagen de un plato
    public function updateImg($id, $name)
    {
        $query = "UPDATE plato SET foto=$name WHERE idplato=$id ";
        parent::executeQuery($query);
    }
// Metodo para insertar un plato
    public function insertPlato($data)
    {
        parent::insertKeyValuesArray('plato', $data);
        $plato = parent::executeQueryArray("select MAX(idplato) as ultimoId from plato");
        return json_encode($plato[0], JSON_FORCE_OBJECT);
    }

    public function update($data, $id)
    {
        parent::updateKeyValuesArray('plato', $data, "idplato = $id");
    }

    public function delete($id)
    {
        parent::deleteRow('plato', "idplato = $id");
    }

    public function exitsCategoria($id)
    {
        return parent::exists('categoria', 'idcategoria', $id);
    }

    public function existsPlato($id)
    {
        return parent::exists('plato', 'idplato', $id);
    }

    public function exit()
    {
        parent::disconect();
    }
}
