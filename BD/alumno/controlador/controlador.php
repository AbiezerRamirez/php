<?php
spl_autoload_register(function ($nombre_clase) {
    include 'modelo/' . $nombre_clase . '.php';
});

// Creamos los dos objetos que necesito para trabajar
$alumno = new Alumno();
$modeloAlumno = new AlumnoModelo();

if (isset($_REQUEST['action'])) {
    switch ($_REQUEST['action']) {
        case 'actualizar':
            $alumno->__SET('id',              $_REQUEST['id']);
            $alumno->__SET('Nombre',          $_REQUEST['Nombre']);
            $alumno->__SET('Apellido',        $_REQUEST['Apellido']);
            $alumno->__SET('Sexo',            $_REQUEST['Sexo']);
            $alumno->__SET('FechaNacimiento', $_REQUEST['FechaNacimiento']);

            $modeloAlumno->Actualizar($alumno);
            header('Location: index.php');
            break;

        case 'registrar':
            $alumno->__SET('Nombre',          $_REQUEST['Nombre']);
            $alumno->__SET('Apellido',        $_REQUEST['Apellido']);
            $alumno->__SET('Sexo',            $_REQUEST['Sexo']);
            $alumno->__SET('FechaNacimiento', $_REQUEST['FechaNacimiento']);

            $foto = $_FILES['fotografia'];

            if ($foto['error'] == 0 && str_contains($foto['type'], 'image')) {
                $nombreFoto = subirFotoServidor($foto, 'assets/img/');
            }

            if (!isset($nombreFoto) || !$nombreFoto) {
                $nombreFoto = 'blank-profile.png';
            }

            $alumno->__SET('Fotografia',    $nombreFoto);
            
            $modeloAlumno->Registrar($alumno);
            header('Location: index.php');
            break;

        case 'eliminar':
            $modeloAlumno->Eliminar($_REQUEST['id']);
            header('Location: index.php');
            break;

        case 'editar':
            $alumno = $modeloAlumno->Obtener($_REQUEST['id']);
            break;
    }
}

function subirFotoServidor($foto, $path)
{
    $extension = pathinfo($foto['name'], PATHINFO_EXTENSION);
    $nombre_base = basename($foto['name'], ".$extension");
    $nombre_aleatorio = $nombre_base . time() . ".$extension";

    $path .= $nombre_aleatorio;
    if (move_uploaded_file($foto['tmp_name'], $path)) {
        return $nombre_aleatorio;
    }
    return false;
}

require_once('vista/vista.php');
