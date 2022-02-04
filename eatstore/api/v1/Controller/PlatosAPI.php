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
                if (is_numeric($lastValue)) {
                    $this->updatePlato($lastValue);
                } else {
                    $this->response(null, 400, "parametros requeridos no validos o vacios");
                }
                break;
            case 'DELETE': // elimina
                if (is_numeric($lastValue)) {
                    $this->deletePlato($lastValue);
                } else {
                    $this->response(null, 400, "parametros requeridos no validos o vacios");
                }
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
                $this->response($pdb->listarPlato($id));
            } else {
                $this->response(null, 404, "el plato indicado no existe");
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
                $this->response($pdb->listarCategoria($categoria, $orden));
            } else {
                $this->response(null, 400, "parametros requeridos no validos o vacios");
            }
        } else {
            $this->response($pdb->listarPlatos());
        }

        $pdb->exit();
    }

    public function postPlatos($id = 0)
    {
        $pdb = new PlatosDB();

        if ($id != 0) {
            $nombre = "$id.jpg";
            $path = "../../img/$nombre";
            $url = 'http://' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['SCRIPT_NAME']) . "/$path";
            isset($_FILES['img']) ? $img = $_FILES['img'] : $img = [];

            if ($pdb->existsPlato($id)) {
                if (!empty($img) && str_contains($img['type'], 'image')) {
                    if (move_uploaded_file($img['tmp_name'], $path)) {
                        $pdb->updateImg($id, "'$id.jpg'");
                        $this->response(json_encode(array("bytes" => $img['size'], "href" => $url), JSON_FORCE_OBJECT));
                    } else {
                        $this->response(null, 500, "Error al mover la imagen al servidor");
                    }
                } else {
                    $this->response(null, 400, "formato de archivo no valido o campo requerido vacio");
                }
            } else {
                $this->response(null, 404, "plato no encontrado");
            }
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
                $this->response($pdb->insertPlato($data));
            } else {
                $this->response(null, 400, "formato de envio para el plato no valido");
            }
        }

        $pdb->exit();
    }

    public function updatePlato($id)
    {
        $data = json_decode(file_get_contents('php://input'), true);
        $pdb = new PlatosDB();

        if ($pdb->existsPlato($id)) {
            if (!empty($data)) {
                foreach ($data as $key => $value) {
                    if (
                        $key != 'nombre' &&
                        $key != 'descripcion' &&
                        $key != 'idcategoria' &&
                        $key != 'precio'
                    ) {
                        $this->response(null, 400, "formato de envio para el plato no valido");
                        $pdb->exit();
                        return null;
                    }
                }
                $pdb->update($data, $id);
                $this->response(null, 200, "plato actualizado correctamente");
            } else {
                $this->response(null, 400, "campo requerido vacio");
            }
        } else {
            $this->response(null, 404, "plato no encontrado");
        }

        $pdb->exit();
    }

    public function deletePlato($id)
    {
        $pdb = new PlatosDB();

        if ($pdb->existsPlato($id)) {
            $pdb->delete($id);
            $this->response(null, 200, "plato eliminado");
        } else {
            $this->response(null, 404, "plato no encontrado");
        }
        
        $pdb->exit();
    }

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

    protected function responseMessage($responseData = '', $message = '', $estado = '', $strErrorHeader = '')
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

    protected function response($data = [], $state = 0, $message = '')
    {
        switch ($state) {
            case 200:
                $header = "HTTP/1.1 200 OK";
                $this->responseMessage(null, $message, $state, $header);
                break;
            case 400:
                $header = "HTTP/1.1 400 BAD REQUEST";
                $this->responseMessage(null, $message, $state, $header);
                break;
            case 404:
                $header = "HTTP/1.1 404 NOT FOUND";
                $this->responseMessage(null, $message, $state, $header);
                break;
            case 500:
                $header = "HTTP/1.1 500 INTERNAL SERVER ERROR";
                $this->responseMessage(null, $message, $state, $header);
                break;
            default:
                $this->responseMessage($data);
                break;
        }
    }
}
