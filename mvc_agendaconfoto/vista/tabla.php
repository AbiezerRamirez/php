    <table>
        <tr>
            <th>IMAGEN</th>
            <th>NOMBRE</th>
            <th>TELÉFONO</th>
        </tr>

        <?php
            foreach ($datos as $indice => $valor) {
                if ($indice % 3 == 0) {
                    echo "<tr><td><a href='../controlador/descargar.php?nombre=$valor'><img class='redonda' src=" . RUTA . $valor . "></a></td>";
                    echo "<td>" . $datos[$indice + 1] . "</td>";
                    echo "<td>" . $datos[$indice + 2] . "</td></tr>";
                }
            }
        ?>
    </table>

</body>
</html>