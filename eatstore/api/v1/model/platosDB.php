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
}
