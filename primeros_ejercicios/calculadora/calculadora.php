<?php
$num1 = $_GET["num1"];
$num2 = $_GET["num2"];
$op = $_GET["op"];

function calc($n1, $n2, $operacion)
{
    $resul = 0;
    
    if ($operacion == "sum") {
        $resul = $n1 + $n2;
    } else if ($operacion == "res") {
        $resul = $n1 - $n2;
    } else if ($operacion == "mul") {
        $resul = $n1 * $n2;
    } else if ($operacion == "div") {
        $resul = $n1 / $n2;
    }
    return $resul;
}

echo ("resultado: " . calc($num1, $num2, $op));