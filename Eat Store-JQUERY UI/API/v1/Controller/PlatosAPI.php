<?php
require_once('../model/platosDB.php');
class PlatosAPI
{
    public function API()
    {
        header('Content-Type: application/JSON');
        $method = $_SERVER['REQUEST_METHOD'];
        switch ($method) {
            case 'GET': // consulta
                $this->getPlatos();
                // $this->getPeoples();
                break;
            case 'POST': // inserta
                // $this->savePeople();
                break;
            case 'PUT': // actualiza
                // $this->updatePeople();       
                break;
            case 'DELETE': // elimina
                // $this->deletePeople();
                break;
            default: // metodo NO soportado
                echo 'METODO NO SOPORTADO';
                break;
        }
    }

    public function getPlatos()
    {
        $pdb = new PlatosDB();
        echo $pdb->listarPlatos();
    }
}
