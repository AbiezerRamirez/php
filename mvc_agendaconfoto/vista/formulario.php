<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../recursos/estilo.css">
    <title>Agenda con Foto</title>
</head>
<body>

    <div class='caja'>
        <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">

            AGENDA<br><br>
            NOMBRE &nbsp;&nbsp;&nbsp;<input type="text" name="nombre" maxlength="16" /><br><br>
            TELÉFONO <input type="text" name="telefono" maxlength="9" /><br><br>
            IMAGEN &nbsp;&nbsp;&nbsp; <input type="file" name='imagen'
                accept="image/gif,image/webp,image/tiff ,.bmp ,.jpeg, .jpg,.png"><br><br>

            <input type="submit" name="enviar" value="Actualizar" />

        </form>
        <div id="mydiv"><?= $mensaje; ?></div>
    </div>

    <!-- Script en JS para que el mensaje aparezca durante un pequeño espacio de tiempo y luego desaparezca -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
    setTimeout(function() {
        $('#mydiv').hide('slow');
    }, 3000);
    </script>