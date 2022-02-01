<?php
require_once("./modelo/Usuarios.php");
include "funcion_cors.php";
cors();

$ruta = 'http://' . $_SERVER['SERVER_NAME'] . dirname($_SERVER['SCRIPT_NAME']) . '/fotos/';

$consulta = new Usuarios();

switch ($_SERVER['REQUEST_METHOD']) {

    
    case "GET":
        $datosConsulta=[];
        if (!isset($_SERVER['PATH_INFO'])) {

            if (empty($_SERVER['QUERY_STRING'])) {
                $datosConsulta = $consulta->buscar_todas_fotos();
            }
            
            //Parámetros para paginar
            //inicio=primer registro
            //cantidad=número de registros que se enviarán a partir de inicio

            if (!empty($_SERVER['QUERY_STRING'])) {
               
                if (is_numeric($_GET['inicio'])&& $_GET['inicio']>= 0 && is_numeric($_GET['cantidad']) && $_GET['cantidad'] >= 0)
                {
                $datosConsulta = $consulta->buscar_paginado($_GET['inicio'], $_GET['cantidad']);
                }
                else{
                    header("HTTP/1.1 400 BAD REQUEST");
                    exit;
                }
            }

            foreach ($datosConsulta as $indice => $contenido) {
                for ($i = 0; $i < count($contenido); $i++) {
                    if ($datosConsulta[$indice]['foto']) {
                        $datosConsulta[$indice]['foto'] = $ruta . $contenido['foto'];
                    }
                }
            }
            $codificado = json_encode(
                $datosConsulta,
                JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES
            );
        } else {
            $rutaPathSinBarra = explode('/', $_SERVER['PATH_INFO']);
            if (is_numeric($rutaPathSinBarra[1])) {
                $datosConsulta = $consulta->buscarDatoConcreto($rutaPathSinBarra[1]);

                if ($datosConsulta) {
                    if ($datosConsulta['foto']) {
                        $datosConsulta['foto'] = $ruta . $datosConsulta['foto'];
                    }
                    $codificado = json_encode($datosConsulta, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
                }
            }
            if (!is_numeric($rutaPathSinBarra[1])) {                
                $orden= isset($_GET['desc'])?'DESC':'ASC';
                $datosConsulta = $consulta->buscarNombre($rutaPathSinBarra[1],$orden);
                
                foreach ($datosConsulta as $indice => $contenido) {
                    for ($i = 0; $i < count($contenido); $i++) {
                        if ($datosConsulta[$indice]['foto']) {
                            $datosConsulta[$indice]['foto'] = $ruta . $contenido['foto'];
                        }
                    }
                }
                $codificado = json_encode($datosConsulta, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
            }
        }
        if (!$datosConsulta) {
            header("Content-Type:Application/json");            
            echo $codificado;
            //header("HTTP/1.1 204 No Content");
          
        } else {
            header("Content-Type:Application/json");
            header("HTTP/1.1 200 OK");
            echo $codificado;
        }
        $consulta = NULL;
        break;
        
    case "POST":
        if (!isset($_SERVER['PATH_INFO'])) {
            $data = json_decode(file_get_contents('php://input'), true);
            $ultimoId = $consulta->insertarDatos($data);
            //Creo un json con el último id generado por la BD y se lo envío al cliente para subir la imagen
            $id = ["ultimoId" => $ultimoId];
            
            header("Content-Type:Application/json");
            header("HTTP/1.1 201 CREATED");
            echo (json_encode($id, JSON_FORCE_OBJECT));
        } else {

            //espera imágenes tipo gif, jpg, png, bmp
            //Las guardará como jpg y perderán calidad
            $rutaPathSinBarra = explode('/', $_SERVER['PATH_INFO']);
            $data = file_get_contents('php://input');

            //nombre aleatorio para la nueva foto y que guardaré en la base de datos
            $original= $consulta->nombre($rutaPathSinBarra[1]);
            $original= str_replace(' ','_', $original);
            $nombre = $original . time() . '.jpg';

            //dirección http de la imagen que acabo de subir
            $direccion = './fotos/' . $nombre;

            //guardo la imagen en la carpeta foto con el nombre aleatorio
            file_put_contents($direccion, $data);
            //guardo SOLO el nombre de la imagen en el registro de la BD correspondiente
            $consulta->insertar_foto($nombre, $rutaPathSinBarra[1]);

            //Creo un json son el tamaño de la imagen y la ruta http de la imagen para enviarlo al cliente
            $cantidad = filesize($direccion);
            $enlace = $ruta . $nombre;
            $respuesta = ["bytes" => $cantidad, "href" => $enlace];

            header("Content-Type:Application/json");
            header("HTTP/1.1 201 CREATED");
            //envío la información al cliente como un objeto
            echo (json_encode($respuesta, JSON_FORCE_OBJECT));
        }
        $consulta = NULL;
        break;
        
    case "DELETE":
        $rutaPathSinBarra = explode('/', $_SERVER['PATH_INFO']);
        $result = $consulta->borrarUsuario($rutaPathSinBarra[1]);
        $consulta = NULL;
        if ($result) {
            header("HTTP/1.1 200 OK");
        } else {
            header("HTTP/1.1 404 NOT FOUND");
        }
        break;
        
    case "PUT":
        $data = json_decode(file_get_contents('php://input'), true);
        $rutaPathSinBarra = explode('/', $_SERVER['PATH_INFO']);
        $result = $consulta->actualizarUsuario($rutaPathSinBarra[1], $data);
        if ($result) {
            header("HTTP/1.1 200 OK");
        } else {
            header("HTTP/1.1 404 NOT FOUND");
        }
        break;
        
    default:
        header("HTTP/1.1 400 BAD REQUEST");
}
?>