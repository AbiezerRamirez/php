<?php

    include '../recursos/misfunciones.php';

    const LIMITE_BYTES = 1572864;          //1.5 megabytes tamaño máximo de las imágenes
    const RUTA = "../recursos/avatar/";    //Carpeta donde se almacenarán las imágenes

    $informacion=[
        1  => 'El nombre no puede estar vacío',
        2  => 'El teléfono debe ser un número',
        3  => 'Teléfono actualizado',
        4  => 'Contacto borrado',
        5  => 'El nombre no existe, no se puede borrar el contacto',
        6  => '¡Contacto añadido! :-)',
        7  => 'El teléfono debe contener 9 dígitos',
        8  => 'El nombre debe comenzar por una letra',
        10 => 'El tipo MIME del archivo no está permitido',
        11 => 'No se ha podido mover el archivo, comprueba el servidor',
        12 => 'No se ha incluido ninguna imagen',
        13 => 'Imagen subida correctamente',
        14 => "La imagen excede el tamaño de 1.5 MB",
        15 => "La imagen excede el tamaño máximo permitido por el servidor web",
        16 => "Error indeterminado al subir el fichero al servidor"
    ];

    $mensaje=null;
    $error=null;
    $errorf=null;

    session_start();
    //Compruebo si es la primera vez que accedo a la aplicación
    //Si es la primera vez, creo un array vacío en el $_SESSION
    !isset ($_SESSION['datos'])? $_SESSION['datos'] = array():NULL;


    if(isset($_POST['enviar'])) {
        filtrarn($_POST['nombre'], $error);
        !$error? filtrart($_POST['telefono'], $error):NULL;
        
        if (!$error) {
            // $existe contiene false(boolean) si no ha encontrado el nombre en la agenda
            // o bien $existe contiene el índice donde se ha encontrado el nombre
            $existe = array_search($_POST['nombre'],$_SESSION['datos']);
            if($existe===false) {
                if ($_POST['telefono']) {
                    //repuesta contiene el nombre de la imagen movida si ha sido posible o bien NULL si no hay imagen o no se ha subido ninguna
                    $respuesta = mover_archivo($errorf);
                    isset($respuesta) ? $_SESSION['datos'][] = $respuesta : $_SESSION['datos'][] = 'icono.png';
                    $_SESSION['datos'][] = $_POST['nombre'];
                    $_SESSION['datos'][] = $_POST['telefono'];
                    $mensaje = $informacion[6] . '&nbsp;' . $informacion[$errorf];
                } else {
                    $mensaje = $informacion[5];
                }
            }     
            else {
                //ha introducido un nombre que ya existe en la agenda
                //Se va actualizar el número de teléfono y la imagen si la ha subido
                if ($_POST['telefono'] != '') {
                    $respuesta = mover_archivo($errorf);
                    if (isset($respuesta)) {
                        //si existe una imagen nueva, borro la imagen anterior antes de guardar la nueva
                        ($_SESSION['datos'][$existe - 1] != 'icono.png') ?
                        unlink("../recursos/avatar/".$_SESSION['datos'][$existe - 1]): NULL;
                                            
                        $_SESSION['datos'][$existe-1] = $respuesta;//se actualiza la imagen
                    }
                    
                    $_SESSION['datos'][$existe + 1] = $_POST['telefono']; //Se actualiza el teléfono
                    $mensaje = $informacion[3] . '&nbsp;' . $informacion[$errorf];; 
                } else {
                    //Se van a borrar todos los datos del nombre encontrado en la agenda y la foto del servidor si existe.
                    if ($_SESSION['datos'][$existe - 1]!='icono.png') {                    
                        unlink("../recursos/avatar/".$_SESSION['datos'][$existe-1]);
                    }
                    unset($_SESSION['datos'][$existe-1]);
                    unset($_SESSION['datos'][$existe]);
                    unset($_SESSION['datos'][$existe + 1]);
                    $mensaje = $informacion[4]; 
                }            
            }
        }
        else {
            $mensaje = $informacion[$error]; 
        }
    }
    $datos = $_SESSION['datos'];
    include "../vista/tabla.php";
    include "../vista/formulario.php";  

        
    