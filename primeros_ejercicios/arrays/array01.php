<?php
/*
a) Declarar un array de números decimales de nombre $importe e introducir en él los siguientes 
número: 32.583, 11.239, 45.781, 22.237. Calcular la media, mostrar el mayor y, por último, 
mostrar la posición del importe menor.
*/

$importe = [32.583, 11.239, 45.781, 22.237];

$media = 0;

// posicion del numero menor
$pMenor = array_search(min($importe), $importe);

// valor del numero mayor
$mayor = max($importe);


foreach ($importe as $valor) {
    $media += $valor;
}

echo "A) <br>";
echo "Numero mayor: " . $mayor . "<br>";
echo "Posicion del numero menor:" . $pMenor . "<br>";
echo "Media del array: " . $media / sizeof($importe);

echo "<br>";
/*
Declarar un array de booleanos de nombre $confirmado e introducir en él seis elementos que
sean: true, true, false, true, false, false. A continuación, mostrar por pantalla el elemento con índice 0. 
Por último, visualizar el número de elementos con valor “false”.
*/
echo "<br>";

$contable = [true, true, false, true, false, false];
$f = 0;

echo "B) <br>";
foreach ($contable as $clave => $valor) {
    // determina si la clave del elemento actual es 0
    if($clave == 0) {
        // imprime el true o false en funcion del valor
        if ($valor == true) {
            echo "Indice 0: True <br>";
        } elseif ($valor == false) {
            echo "Indice 0: False <br>";
        }
    }
    // Cuenta los elementos false
    if ($valor == false) {
        $f++;
    }
}
echo "Numero de elementos false: " . $f;

echo "<br>";
/*
Declarar un array de cadenas de nombre $coches e introducir en él 5 marcas de coches. Visualizar
en pantalla la marcha del coche con índice X. A continuación, mostrar el número de elementos del 
array $coches. Después, visualizar todos los coches existentes en el array cada uno de ellos en 
una línea. Visualizar también todos los coches existentes en el array, en orden descendente, sin 
ordenar el array. Por último, mostrar la frase “El concesionario dispone de marca1, marca2, 
marca3, marca4 y marca5”.
*/
echo "<br>";

echo "C) <br>";
$coches = ["Mecedes", "Audi", "Ford", "Dodge", "Chevrolet"];

// Muestra una marca aleatoria
echo "Mostrar coche x: " . $coches[rand(0,4)] . "<br>";
echo "<br>";

// Muestra el tamaño del array
echo "Elementos del array: " . sizeof($coches) . "<br>";
echo "<br>";

// muestra el contenido del array
echo "coches del array: <br>";
foreach ($coches as $marca) {
    echo $marca . "<br>";
}
echo "<br>";

// muestra el contenido del array al reves
echo "coches del array (descendente): <br>";
for ($i = sizeof($coches)-1; $i > -1; $i--) {
    echo $coches[$i] . "<br>";
}
echo "<br>";


// muestra el contenido del array separado por comas y la "y" antes del ultimo elemento
$i = 0;
echo "El consecionario despone de ";
while($i < sizeof($coches)) {
    echo $coches[$i];
    if ($i == sizeof($coches)-2) {
        echo " y ";
    } else if ($i != sizeof($coches)-1) {
        echo ", ";
    }
    $i++;
}