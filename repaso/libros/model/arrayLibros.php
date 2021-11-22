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
    echo '<table>';
    foreach($libros as $libro) {
        echo '<tr>';
        foreach($libro as $caract) {
            echo "<td>$caract</td>";
        }
        echo '</tr>';
    }
    echo '</table>';

}

function mediaLibros()
{
    
}