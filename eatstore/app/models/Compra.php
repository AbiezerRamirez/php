<?php
// require_once('bd.php');
class Compra extends Queries
{
    // private $data;

    function __construct()
    {
        parent::__construct();
        // $this->data = $data;
    }

    function comprar(array $data)
    {
        parent::insertKeyValuesArray('compra', $data);
        $idcompra = parent::executeQueryArray('select MAX(idcompra) as idcompra from compra');
        return $idcompra[0]['idcompra'];
    }

    function detallarCompra(array $data, $idcompra)
    {
        foreach ($data as $value) {
            $value['idcompra'] = $idcompra;
            parent::insertKeyValuesArray('detalle_compra', $value);
        }
        return true;
    }

    function exit()
    {
        parent::disconect();
    }
}
