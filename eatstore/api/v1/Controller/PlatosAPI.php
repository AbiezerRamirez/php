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
                    $this->postPlatos($lastValue);
                } else {
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
        $state = 200;

        $pdb = new PlatosDB();
        if ($id != 0) {
            if ($pdb->existsPlato($id)) {
                $data = $pdb->listarPlato($id);
            } else {
                $error = "el plato indicado no existe";
                $header = "HTTP/1.1 404 NOT FOUND";
                $state = 404;
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
                $error = "parametros requeridos no validos o vacios";
                $header = "HTTP/1.1 400 BAD REQUEST";
                $state = 400;
            }
        } else {
            $data = $pdb->listarPlatos();
        }

        $pdb->exit();
        $this->output($data, $error, $state, $header);
    }

    public function postPlatos($id = 0)
    {
        $output = '';
        $message = '';
        $state = '';
        $header = '';
        $pdb = new PlatosDB();
        if ($id != 0) {
            //espera imágenes tipo gif, jpg, png, bmp
            //Las guardará como jpg y perderán calidad
            // $rutaPathSinBarra = explode('/', $_SERVER['PATH_INFO']); [ID]!!!!
            // print_r($_FILES);
            $data = file_get_contents('php://input');
            // echo $data;
            $nombre = "$id.jpg";
            $path = "../../img/$nombre";
            $url = 'http://' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['SCRIPT_NAME']) . "/$path";
            // echo $path;
            //nombre aleatorio para la nueva foto y que guardaré en la base de datos
            // $original = $consulta->nombre($rutaPathSinBarra[1]);
            // $original = str_replace(' ', '_', $original);
            // $nombre = $original . time() . '.jpg';

            //dirección http de la imagen que acabo de subir
            // $direccion = './fotos/' . $nombre;

            //guardo la imagen en la carpeta foto con el nombre aleatorio

            if ($pdb->existsPlato($id) && $data) {
                // if ($data) {
                print_r($data);
                // } else {
                // echo "hola";
                // }
                // file_put_contents($path, $data);
                // $pdb->updateImg($id, "'$id.jpg'");
                // $peso = filesize($path);

                // $output = json_encode(array("bytes" => $peso, "href" => $url), JSON_FORCE_OBJECT);
            } else {
                $message = "plato no encontrado";
                $header = "HTTP/1.1 404 NOT FOUND";
                $state = 404;
            }

            //guardo SOLO el nombre de la imagen en el registro de la BD correspondiente
            // $consulta->insertar_foto($nombre, $rutaPathSinBarra[1]);

            // $ruta = 'http://' . $_SERVER['SERVER_NAME'] . "/php/eatstore/img/$nombre";
            // $s = $_SERVER['DOCUMENT_ROOT'];
            // echo $s;
            // echo $ruta;

            //Creo un json son el tamaño de la imagen y la ruta http de la imagen para enviarlo al cliente
            // $enlace = $ruta . $nombre;
            // $respuesta = ["bytes" => 0, "href" => $enlace];

            // header("Content-Type:Application/json");
            // header("HTTP/1.1 201 CREATED");
            //envío la información al cliente como un objetoF
            // echo (json_encode($respuesta, JSON_FORCE_OBJECT));
        } else {
            $data = json_decode(file_get_contents('php://input'), true);
            if (
                sizeof($data) == 4 &&
                key_exists('nombre', $data) &&
                key_exists('descripcion', $data) &&
                key_exists('idcategoria', $data) &&
                key_exists('precio', $data)
            ) {
                $data['foto'] = 'plato.jpg';
                $output = $pdb->insertPlato($data);
            } else {
                $message = "formato de envio para el plato no valido";
                $header = "HTTP/1.1 400 BAD REQUEST";
                $state = 400;
            }
        }
        $pdb->exit();
        $this->output($output, $message, $state, $header);
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

    protected function output($responseData = '', $message = '', $estado = '', $strErrorHeader = '')
    {
        if (!$message) {
            $this->sendOutput(
                $responseData,
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            $this->sendOutput(
                json_encode(array('estado' => $estado, 'mensaje' => $message)),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    }
}
