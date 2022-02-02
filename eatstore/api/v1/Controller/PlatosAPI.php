<?php
require_once('model/platosDB.php');
class PlatosAPI
{
    public function API()
    {
        header('Content-Type: application/JSON');
        $method = $_SERVER['REQUEST_METHOD'];
        $url = explode('/', $_SERVER['REQUEST_URI']);
        $lastValue = $url[sizeof($url)-1];

        switch ($method) {
            case 'GET': // consulta
                if (is_numeric($lastValue)) {
                    $this->getPlatos($lastValue);

                } else if (isset($_GET['categoria']) && isset($_GET['orden'])) {
                    echo "X'D";

                } else {
                    echo ':D';
                }
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
