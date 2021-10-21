<?php
$n1 = $_GET["n1"];
$n2 = $_GET["n2"];

if ($n1 < $n2) {
    $arrayPrimos = numerosPrimos($n1, $n2);
} else {
    $arrayPrimos = numerosPrimos($n2, $n1);
}

foreach ($arrayPrimos as $numero) {
    echo $numero . " ";
}

function numerosPrimos($inicio, $fin) {
    $array = [];
    for ($i = $inicio; $i <= $fin; $i++) {
        $c = 0;
        for($j = 1; $j <= $i/2; $j++){
            if($i % $j == 0){
                $c++;
                if ($c < 1) {
                    break;
                }
            }
        }
        
        if ($c == 1){
            array_push($array, $i);
        }
    }
    return $array;
}