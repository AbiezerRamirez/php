<?php

function index()
{
    require_once('view/header.php');
    require_once('view/formulario.php');
    require_once('view/footer.php');
}

function accion($libros)
{
    if ($_REQUEST['c'] == 'add') {
        unset($_REQUEST['c']);
        if(!trimString($_POST['isbn']) && !trimString($_POST['titulo']) && !trimString($_POST['autor']) && !trimString($_POST['fp'])){

            $rutaImg = subirImagen();
            agregarLibro($libros, $_POST['isbn'], $_POST['titulo'], $_POST['autor'], $_POST['fp'], $_POST['paginas'], $rutaImg);
            $ls = serialize($libros);
            
            header('location: index.php?lib=' . urlencode($ls));
            exit;
        }
        header('location: index.php?error=1');
        exit;
    }
}


function trimString($str)
{
    $str = trim($str);
    if ($str == '') return true;
    return false;
}

function subirImagen()
{
    if ($_FILES['imagen']['error'] == 0) {
        if (str_contains($_FILES['imagen']['type'], 'image')){
            $rutaImg = 'fotosServidor/' . pathinfo($_FILES['imagen']['name'], PATHINFO_FILENAME) . time() . '.' . pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
            if (move_uploaded_file($_FILES['imagen']['tmp_name'], $rutaImg)) {
                return $rutaImg;
            }
        }
    }
    return imagenGenerica();
}

function imagenGenerica()
{
    return 'fotosServidor/libro.png';
}