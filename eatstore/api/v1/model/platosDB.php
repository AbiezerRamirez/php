<?php
require_once('db/Queries.php');
// include('../../db/Queries.php');
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
        return json_encode($plato);
    }
    
    public function listarCategoria($categoria, $orden)
    {
        $query = "select * from plato where idcategoria = '$categoria' order by nombre $orden";
        $platos = parent::executeQueryArray($query);
        return json_encode($platos);
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
