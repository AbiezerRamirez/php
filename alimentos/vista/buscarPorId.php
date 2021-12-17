<form name="formBusqueda" action="controlador/controller.php?action=searchId" method="POST">

    <table>
        <tr>
            <td>ID del alimento:</td>
            <td>
                <input type="text" name="id">
                ('%' como comodín)
            </td>

            <td>
                <input type="submit" name="buscar" value="Buscar">
            </td>
        </tr>
    </table>

</form>

<table>
    <tr>
        <th>alimento (por 100g)</th>
        <th>energía (Kcal)</th>
        <th>grasa (g)</th>
    </tr>
    <?php
    if (isset($_REQUEST['error'])) {
        if ($_REQUEST['error'] == 1) {
            echo '<span style="color: red">Error, Campo vacio al enviar el formulario</span>';
        } else if ($_REQUEST['error'] == 2) {
            echo '<span style="color: red">Alimento no encontrado</span>';
        }
        unset($_REQUEST['error']);
    }

    if (isset($_REQUEST['al'])) {
        $alimentos = $gbd->executeQueryArray("select * from alimentos where id like '" . $_REQUEST['al'] . "'");
        foreach ($alimentos as $alimento) {
            echo '
                <tr>
                    <td>' . $alimento['nombre'] . '</td>
                    <td>' . $alimento['energia'] . '</td>
                    <td>' . $alimento['grasatotal'] . '</td>
                    <td><img src="web/img/fotosAlimentos/' . $alimento['fotografia'] . '" alt="Imagen ' . $alimento['nombre'] . '" width="150"> </td>
                </tr>';
        }
    }
    ?>

</table>