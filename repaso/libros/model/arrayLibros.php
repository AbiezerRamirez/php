<?php

if (!isset($_REQUEST['lib'])) {
    $libros = array();
} else {
    // $lus = base64_decode($_REQUEST['lib']);
    //                      $lus
    $libros = unserialize($_REQUEST['lib']);
}

function agregarLibro(&$libros, $isbn, $nombre, $titulo, $fecha, $paginas, $imagen)
{
    array_push($libros, array( 'isbn' => $isbn, 'nombre' => $nombre, 'titulo' => $titulo, 'fechaPublicacion' => $fecha, 'nPags' => $paginas, 'img' => $imagen));
}

function mostrarLibros($libros)
{
    echo '<table border="1" style="text-align: center">';
    foreach($libros as $libro) {
        echo '<tr>';
        foreach($libros[0] as $key => $value) {
            echo "<th>$key</th>";
        }
        echo '</tr>';
        echo '<tr>';
        foreach($libro as $key => $caract) {
            if ($key != 'img') {
                echo "<td>$caract</td> ";
            } else {
                echo '<td><img src="'. $caract . '" width="100px" height="100px"></td>';
            }
        }
        echo '</tr>';
    }
    echo '</table>';

}

function mediaLibros()
{
    
}