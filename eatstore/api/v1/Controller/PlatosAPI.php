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
                if (is_numeric($lastValue)) {
                    // echo "holas";
                    $this->postPlatos($lastValue);
                } else {
                    // echo "hola";
                    $this->postPlatos();
                }
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
        $data = [];
        $error = '';
        $header = '';

        $pdb = new PlatosDB();
        if ($id != 0) {
            if ($pdb->existsPlato($id)) {
                $data = $pdb->listarPlato($id);
            } else {
                $error = "el plato indicado no existe";
                $header = "HTTP/1.1 400 BAD REQUEST";
            }
        } else if (!empty($_SERVER['QUERY_STRING'])) {
            isset($_GET['categoria']) ? $categoria = $_GET['categoria'] : $categoria = "";
            isset($_GET['orden']) ? $orden = strtoupper($_GET['orden']) : $orden = "";

            if (
                $categoria != "" &&
                $orden != "" &&
                ($orden == "DESC" || $orden == "ASC") &&
                $pdb->exitsCategoria($categoria)
            ) {
                $data = $pdb->listarCategoria($categoria, $orden);
            } else {
                $error = "el plato indicado no existe";
                $header = "HTTP/1.1 400 BAD REQUEST";
            }
        } else {
            $data = $pdb->listarPlatos();
        }

        $pdb->exit();
        $this->output($data, $error, $header);
    }

    public function postPlatos($id = 0)
    {
        $pdb = new PlatosDB();
        if ($id != 0) {
            //espera imágenes tipo gif, jpg, png, bmp
            //Las guardará como jpg y perderán calidad
            // $rutaPathSinBarra = explode('/', $_SERVER['PATH_INFO']); [ID]!!!!

            $data = file_get_contents('php://input');
            $nombre = "$id.jpg";
            $path = "../../img/$nombre";
            echo $path;
            //nombre aleatorio para la nueva foto y que guardaré en la base de datos
            // $original = $consulta->nombre($rutaPathSinBarra[1]);
            // $original = str_replace(' ', '_', $original);
            // $nombre = $original . time() . '.jpg';

            //dirección http de la imagen que acabo de subir
            // $direccion = './fotos/' . $nombre;

            //guardo la imagen en la carpeta foto con el nombre aleatorio

            // file_put_contents($path, $data);
            // if ($pdb->existsPlato($id)) {
            //     $pdb->updateImg($id, "$id.jpg");
            // }

            //guardo SOLO el nombre de la imagen en el registro de la BD correspondiente
            // $consulta->insertar_foto($nombre, $rutaPathSinBarra[1]);

            $ruta = 'http://' . $_SERVER['SERVER_NAME'] . "/php/eatstore/img/$nombre";
            echo $ruta;

            //Creo un json son el tamaño de la imagen y la ruta http de la imagen para enviarlo al cliente
            // $peso = filesize($path);
            // $enlace = $ruta . $nombre;
            // $respuesta = ["bytes" => 0, "href" => $enlace];

            // header("Content-Type:Application/json");
            // header("HTTP/1.1 201 CREATED");
            //envío la información al cliente como un objetoF
            // echo (json_encode($respuesta, JSON_FORCE_OBJECT));
        } else {
            $data = json_decode(file_get_contents('php://input'), true);
            $idPlato = $pdb->insertPlato($data);

            header("Content-Type:Application/json");
            header("HTTP/1.1 201 CREATED");
            echo (json_encode($idPlato, JSON_FORCE_OBJECT));
        }
        $pdb->exit();
        exit;
    }

    function subirFotoServidor($foto, $path)
    {
        $extension = pathinfo($foto['name'], PATHINFO_EXTENSION);
        $nombre_base = basename($foto['name'], ".$extension");
        $nombre_aleatorio = $nombre_base . time() . ".$extension";

        $path .= $nombre_aleatorio;
        if (move_uploaded_file($foto['tmp_name'], $path)) {
            return $nombre_aleatorio;
        }
        return false;
    }

    // metodo de respuestas?
    protected function sendOutput($data, $httpHeaders = array())
    {
        header_remove('Set-Cookie');

        if (is_array($httpHeaders) && count($httpHeaders)) {
            foreach ($httpHeaders as $httpHeader) {
                header($httpHeader);
            }
        }

        echo $data;
        exit;
    }

    protected function output($responseData = '', $strErrorDesc = '', $strErrorHeader = '')
    {
        if (!$strErrorDesc) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(
                json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }
}
