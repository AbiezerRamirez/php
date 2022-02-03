<?php
require_once('model/platosDB.php');
class PlatosAPI
{
    public function API()
    {
        header('Content-Type: application/JSON');
        $method = $_SERVER['REQUEST_METHOD'];
        $url = explode('/', $_SERVER['REQUEST_URI']);
        $lastValue = explode('?', $url[sizeof($url) - 1]);
        $lastValue = $lastValue[0];

        switch ($method) {
            case 'GET': // consulta
                if (is_numeric($lastValue)) {
                    $this->getPlatos($lastValue);
                } else {
                    $this->getPlatos();
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

    public function getPlatos($id = 0)
    {
        $pdb = new PlatosDB();
        if ($id != 0) {
            if ($pdb->existsPlato($id)) {
                echo $pdb->listarPlato($id);
            } else {
                // respuesta de error?
                // echo "el plato indicado no existe";
            }
        } else if (isset($_GET['categoria']) && isset($_GET['orden'])) {
            $categoria = $_GET['categoria'];
            $orden = $_GET['orden'];
            if (
                $categoria != "" &&
                $orden != "" &&
                ($orden == "DESC" || $orden == "ASC") &&
                $pdb->exitsCategoria($categoria)
                ) {
                    echo $pdb->listarCategoria($categoria, $orden);
                } else {
                    // respuesta de error?
                    // echo "la categoria indicada no existe o se encontraron parametros necesarios vacios";
                }
        } else {
            echo $pdb->listarPlatos();
        }
        $pdb->exit();
    }
}
