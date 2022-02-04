<?php
require_once('db/Queries.php');

class PlatosDB extends Queries
{
    public function __construct()
    {
        parent::__construct();
    }

    public function listarPlatos()
    {
        $query = 'select * from plato';
        $platos = parent::executeQueryArray($query);
        return json_encode($platos);
    }

    public function listarPlato($id)
    {
        $query = "select * from plato where idplato = '$id'";
        $plato = parent::executeQueryArray($query);
        $plato = $plato[0];
        return json_encode($plato);
    }

    public function listarCategoria($categoria, $orden)
    {
        $query = "select * from plato where idcategoria = '$categoria' order by nombre $orden";
        $platos = parent::executeQueryArray($query);
        return json_encode($platos);
    }

    public function updateImg($id, $name)
    {
        $query = "UPDATE plato SET foto=$name WHERE idplato=$id ";
        parent::executeQuery($query);
    }

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
