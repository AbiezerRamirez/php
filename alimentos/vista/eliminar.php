<br />
<form name="formBusqueda" action="controlador/controller.php?action=delete&search=true" method="POST">

    <table>
        <tr>
            <td>Nombre del alimento:</td>
            <td>
                <input type="text" name="nombre">
            </td>

            <td>
                <input type="submit" name="buscar" value="Buscar">
            </td>
        </tr>
    </table>

</form>
<?php

if (!isset($_REQUEST['al']) && isset($_REQUEST['error'])) {
    if ($_REQUEST['error'] == 1) {
        echo '<span style="color: red">Error, Campo vacio al enviar el formulario</span>';
    } else if ($_REQUEST['error'] == 2) {
        echo '<span style="color: red">Alimento no encontrado</span>';
    }
} else if (isset($_REQUEST['succes']) && $_REQUEST['succes'] == 1) {
    echo '<span style="color: green">Alimento Eliminado</span><br>';
}


if (isset($_REQUEST['al']) && $gbd->exists('alimentos', 'nombre', $_REQUEST['al'])) {
    $name = $_REQUEST['al'];
?>
    <table>
        <tr>
            <th>alimento (por 100g)</th>
            <th>energía (Kcal)</th>
            <th>Proteina (g)</th>
            <th>H. de carbono (g)</th>
            <th>Fibra (g)</th>
            <th>grasa (g)</th>
        </tr>
        <?php foreach ($gbd->executeQueryArray("select * from alimentos where nombre = '$name'") as $alimento) : ?>
            <tr>
                <td><?php echo $alimento['nombre'] ?></td>
                <td><?php echo $alimento['energia'] ?></td>
                <td><?php echo $alimento['proteina'] ?></td>
                <td><?php echo $alimento['hidratocarbono'] ?></td>
                <td><?php echo $alimento['fibra'] ?></td>
                <td><?php echo $alimento['grasatotal'] ?></td>
                <td><img src="web/img/fotosAlimentos/<?php echo $alimento['fotografia'] ?>" alt="Imagen <?php echo $alimento['nombre'] ?>" width="150"></td>
                <td><a href="controlador/controller.php?action=delete&id=<?php echo $alimento['id'] ?>&img=<?php echo $alimento['fotografia'] ?>">Eliminar</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php
}
?>