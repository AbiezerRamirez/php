<?php
$num1 = $_GET["OPERANDO1"];
$num2 = $_GET["OPERANDO2"];
$op = $_GET["OPCION"];
$rojo = "NO";

if (isset($_GET["ROJOS"])) {
    $rojo = $_GET["ROJOS"];
}

function calc($n1, $n2, $operacion, $red)
{
    if ($operacion == "SUMA") {
        $n3 = $n1 + $n2;
        $verbo = "sumar ";
        $aux = " mas ";
    } else if ($operacion == "RESTA") {
        $n3 = $n1 - $n2;
        $verbo = "restar ";
        $aux = " menos ";
    } else if ($operacion == "PRODUCTO") {
        $n3 = $n1 * $n2;
        $verbo = "multiplicar ";
        $aux = " por ";
    } else if ($operacion == "DIVISION") {
        $n3 = $n1 / $n2;
        $verbo = "dividir ";
        $aux = " entre ";
    } else {
        $n3 = $n1 . $n2;
        $verbo = "concatenar ";
        $aux = " con ";
    }

    return "El resultado de " . $verbo . escribirNumero($n1, $red) . $aux . escribirNumero($n2, $red) . " es igual a " . escribirNumero(($n3), $red);
}

function escribirNumero($dato, $r)
{
    if ($r == "SI") {
        if ($dato < 0) {
            return '<font color="red">' . $dato . '</font>';
        } else {
            return $dato;
        }
    } else {
        return $dato;
    }
}

echo calc($num1, $num2, $op, $rojo);
