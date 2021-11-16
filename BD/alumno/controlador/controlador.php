<?php
    spl_autoload_register(function ($nombre_clase) {
        include 'modelo/' . $nombre_clase . '.php';
    });

    // Creamos los dos objetos que necesito para trabajar
    $alumno = new Alumno();
    $modeloAlumno = new AlumnoModelo();

    if(isset($_REQUEST['action'])) {
        switch($_REQUEST['action'])	{
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

    require_once('vista/vista.php');