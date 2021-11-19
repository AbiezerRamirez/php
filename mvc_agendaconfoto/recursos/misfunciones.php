<?php

    // Se encarga de realizar la comprobación del nombre
    function filtrarn(&$dato, &$error) {
        $dato = trim($dato); // Elimina espacios antes y después de los datos
        $dato = strip_tags($dato); //Retira las etiquetas HTML y PHP de un string
        $dato = stripslashes($dato); // Elimina backslashes \
        $dato = htmlspecialchars($dato); //Traduce caracteres especiales en entidades HTML

        $dato == '' ? $error = 1 : null;
        if ($dato != '') {
            $dato = mb_strtoupper($dato);
            $comienzo = preg_match('/(^[A-ZÑ])/', $dato);
            !$comienzo ?  $error = 8 : null;
        }
    }

    // Se encarga de realizar la comprobación del teléfono
    function filtrart(&$dato, &$error) {
        $dato=trim($dato); // Elimina espacios antes y después de los datos
        $dato=strip_tags($dato);//Retira las etiquetas HTML y PHP de un string
        $dato=stripslashes($dato); // Elimina backslashes \
        $dato=htmlspecialchars($dato); //Traduce caracteres especiales en entidades HTML
    
        if ( $dato !='') {
            !is_numeric($dato)? $error=2: null;
            $error !=2 && strlen($dato) != 9 ? $error = 7 : null;           
        }
        
    }

    // Se encarga de comprobar si la imagen es válida
    function filtar_fichero(&$errorf) {
        $extensiones = array('image/gif', 'image/jpeg', 'image/jpg', 'image/webp', 'image/bmp', 'image/png', 'image/tiff');
        switch ($_FILES['imagen']['error']) {
            case 0:
                $mime = mime_content_type($_FILES['imagen']['tmp_name']);
                //Compruebo el tipo mime del archivo subido
                !in_array($mime, $extensiones) ? $errorf = 10 : null;
                //Tamaño superior a 1.5 MB
                $bytes = filesize($_FILES['imagen']['tmp_name']);
                ($bytes > LIMITE_BYTES && $errorf != 10)  ? $errorf = 14 : null;
                break;
            case 1:
                //Excede la directiva upload_max_filesize php.ini
                $errorf = 15;
                break;
            case 4:
                //no se subió ningun fichero
                $errorf = 12;
                break;
            case 3:
            case 6:
            case 7:
            case 8:
                //errores indeterminados
                $errorf = 16;
                break;
        }
    }

    // Se encarga de mover la imagen al lugar correspondiente (RUTA)
    function mover_archivo(&$errorf) {
        filtar_fichero($errorf);
        if (!$errorf) {
            //generando un nombre aleatorio para las imagenes con la función time()
            $extension = pathinfo($_FILES['imagen']['name'], PATHINFO_EXTENSION);
            $nombre_base = basename($_FILES['imagen']['name'], '.' . $extension);
            $nombre_aleatorio = $nombre_base . time() . '.' . $extension;
            
            $ruta_destino_archivo = RUTA . $nombre_aleatorio;
            
            $archivo_ok = @move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta_destino_archivo);

            if (!$archivo_ok) {
                //Error en el servidor al mover la imagen faltan permisos o la carpeta de destino
                $errorf = 11;
            } else {
                //Imagen movida correctamente
                $errorf = 13;
                return $nombre_aleatorio;
            }
        }
    }
