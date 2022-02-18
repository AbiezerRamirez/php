<?php
require_once('funciones.php');
class BuyController
{
    public static function buy()
    {
        session_start();

        if (isset($_SESSION['client'])) {
            $compra = array(
                'idcliente' => $_SESSION['client']['id'],
                'fcompra' => date('Y-m-d H:i:s'),
                'descuento' => $_POST['descuento'],
                'formapago' => $_POST['formapago'],
                'total' => $_POST['total']
            );

            if (!trimArray($compra) && isset($_POST['detalle'])) {
                $detalle_compra = $_POST['detalle'];
                $c = new Compra();
                
                $idcompra = $c->comprar($compra);

                if(isset($idcompra) && $c->detallarCompra($detalle_compra, $idcompra)) {
                    header_remove('Set-Cookie');
                    header('Content-Type: application/json', 'HTTP/1.1 200 OK');
                    echo json_encode(array('mensaje' => 'Compra realizada con exito'));
                    $c->exit();
                    exit;
                } else {
                    header_remove('Set-Cookie');
                    header('Content-Type: application/json', 'HTTP/1.1 500 INTERNAL SERVER ERROR');
                    echo json_encode(array('mensaje' => 'No se ha podido finalizar la compra'));
                    $c->exit();
                    exit;
                }

            } else {
                header_remove('Set-Cookie');
                header('Content-Type: application/json', 'HTTP/1.1 400 BAD REQUEST');
                echo json_encode(array('mensaje' => 'Carrito Vacio'));
                exit;
            }
        } else {
            header_remove('Set-Cookie');
            header('Content-Type: application/json', 'HTTP/1.1 400 BAD REQUEST');
            echo json_encode(array('mensaje' => 'inicia sesion antes de finalizar la compra'));
            exit;
        }
    }
}
