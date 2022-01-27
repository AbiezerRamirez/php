<?php
class Platos
{
    public function API()
    {
        header('Content-Type: application/JSON');
        $method = $_SERVER['REQUEST_METHOD'];
        switch ($method) {
            case 'GET': // consulta
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

    
}
