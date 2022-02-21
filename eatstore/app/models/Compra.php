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
// inserta una compra a la base de datos y retorna su id
    function comprar(array $data)
    {
        parent::insertKeyValuesArray('compra', $data);
        $idcompra = parent::executeQueryArray('select MAX(idcompra) as idcompra from compra');
        return $idcompra[0]['idcompra'];
    }
// recibe un array con todos los datos de la compra y los inserta en la base de datos bajo el idecompra que recibe como parametro
    function detallarCompra(array $data, $idcompra)
    {
        foreach ($data as $value) {
            $value['idcompra'] = $idcompra;
            parent::insertKeyValuesArray('detalle_compra', $value);
        }
        return true;
    }
    // retorna todas las compras del cliente cuyo id recibe como parametro
    function getCompras($id)
    {
        return parent::executeQueryArray("select * from compra where idcliente = '$id'");
    }

    function exit()
    {
        parent::disconect();
    }
}
