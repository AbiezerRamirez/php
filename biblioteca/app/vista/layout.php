<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/gif/png" href="web/img/book.ico">
    <link rel="stylesheet" type="text/css" href="<?= 'web/css/' . Config::$estilo ?>" />
    <title>Biblioteca</title>
</head>

<body>
    <div class='wrapper'>
        <div class="centrado">
            <nav>
                <ul>
                    <li><a href="index.php?ctl=presentacion">Presentación</a></li>
                    <li><a href="index.php?ctl=listarLibros">Consultar libros</a></li>
                    <li><a href="index.php?ctl=listarAutores">Consultar autores </a></li>

                    <!--li class="alto"><a href="">Buscar</a>
                        <ul id="menu-horizontal">
                            <li><a href="index.php?ctl=buscarLibro">Libro</a> </li>
                            <li><a href="index.php?ctl=buscarAutor">Autor</a></li>
                        </ul>
                        </li>-->

                    <?php if (isset($_SESSION['nombre'])) :  ?>
                    <li class="alto1"><a href="">Operaciones(Administrador)</a>
                        <ul id="menu-horizontal">
                            <!-- <li><a href="index.php?ctl=actualizarLibro">Actulizar_Autor</a>
                    </li>
                    <li><a href="index.php?ctl=actualizarAutor">Actualizar_Libro</a></li>-->
                            <li><a href="index.php?ctl=insertarLibro">Insertar_Libro</a></li>
                        </ul>
                    </li>
                    <?php endif;  ?>
                    <?php if (!isset($_SESSION['nombre'])) : ?>
                    <li><a href="index.php?ctl=areaPrivada">Área Privada</a></li>
                    <?php else : ?>
                    <li>
                        <a class="sesion" href=" index.php?ctl=cerrarSesion">
                            <?= $_SESSION['nombre'] ?><img class='derecha' src=<?= $_SESSION['imagen'] ?>>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
        <div class='contenido'><?= $contenido ?></div>

        <div class="pie">DWES (D.A.W. 2º) - Curso 2021/22. IES Venancio Blanco&nbsp;
            &nbsp;
        </div>
    </div>
</body>

</html>