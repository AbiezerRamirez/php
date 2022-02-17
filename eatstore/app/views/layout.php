<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EAT Store</title>
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <!-- <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/redmond/jquery-ui.css"> -->
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="js/jquery-ui.js"></script>
    <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->
</head>

<body>
    <header class="header">
        <a href="index.php">
            <img class="header__logo" src="img/logo.png" alt="Logotipo">
        </a>
    </header>

    <nav class="navegacion">
        <a class="navegacion__enlace navegacion__enlace--activo" href="index.php">Tienda</a>
        <a class="navegacion__enlace" href="nosotros.html">Nosotros</a>
        <?php
        if (isset($_SESSION['client'])) {
            echo '<a class="navegacion__enlace" href="?page=profile"> ' . $_SESSION['client']['nombre'] . ' </a>';
            echo '<a class="navegacion__enlace" href="app/controllers/BackController.php?action=logout">Cerrar Sesion</a>';
        } else {
            echo '<a class="navegacion__enlace" href="?page=login">Iniciar Sesion</a>';
        }
        ?>
        <a class="navegacion__enlace navegacion__enlace--carrito" href="#" id="iconoCarrito"><img class="bloque__imagen" src="img/carrito.png" alt="carrito"></a>
    </nav>



    <main class="contenedor">
        {{content}}
    </main>

    <footer class="footer">
        <p class="footer__texto">Eat Store - Todos los derechos Reservados 2022.</p>
    </footer>

    <div id="carrito">
        <table id="lista-carrito" class="carrito__lista">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <!-- <th></th> -->
                </tr>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <tr>
                    <td></td>
                    <td>
                        <select name="fPago" id="fPago">
                            <option value="Tarjeta">Tarjeta</option>
                            <option value="Efectivo">Efectivo</option>
                        </select>
                    </td>
                    <td><label for="descuento">Descuento</label></td>
                    <td><input type="checkbox" name="descuento" id="descuento"></td>
                    <td></td>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- <script src="js/db.js"></script> -->
    <script src="js/app1.js"></script>
</body>

</html>