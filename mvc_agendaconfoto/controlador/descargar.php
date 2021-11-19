<?php
    // Para realizar la descarga de la imagen (juega con las cabeceras: "Content-Disposition: attachment")
    // https://developer.mozilla.org/es/docs/Web/HTTP/Headers/Content-Disposition
    $nombre = $_GET['nombre'];
    $ruta="../recursos/avatar/".$nombre;
    $extension = pathinfo($ruta, PATHINFO_EXTENSION);
    header("Content-type: image/$extension"); 
    header("Content-Disposition: attachment; filename=$nombre");
    $imagen = file_get_contents($ruta);
    echo $imagen;
    