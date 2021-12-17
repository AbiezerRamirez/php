<br />
<form name="formBusqueda" action="controlador/controller.php?action=update&search=true" method="POST">

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
    echo '<span style="color: green">Alimento actualizado con éxito</span><br>';
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
                <td><a href="index.php?controller=mod&al=<?php echo $name ?>&id=<?php echo $alimento['id'] ?>">Modificar</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
<?php
}

if (isset($_REQUEST['id']) && $gbd->exists('alimentos', 'id', $_REQUEST['id'])) {
    $id = $_REQUEST['id'];
    $alimento = $gbd->executeQueryArray("select * from alimentos where id = $id");
?>
    <form name="formInsertar" action="controlador/controller.php?action=update" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <th>Nombre</th>
                <th>Energía (Kcal)</th>
                <th>Proteina (g)</th>
                <th>H. de carbono (g)</th>
                <th>Fibra (g)</th>
                <th>Grasa total (g)</th>
                <th>Imagen</th>
            </tr>
            <tr>
                <td>
                    <input type="text" name="nombre" value="<?php echo $alimento[0]['nombre'] ?>" />
                </td>
                <td>
                    <input type="text" name="energia" value="<?php echo $alimento[0]['energia'] ?>" />
                </td>
                <td>
                    <input type="text" name="proteina" value="<?php echo $alimento[0]['proteina'] ?>" />
                </td>
                <td>
                    <input type="text" name="hc" value="<?php echo $alimento[0]['hidratocarbono'] ?>" />
                </td>
                <td>
                    <input type="text" name="fibra" value="<?php echo $alimento[0]['fibra'] ?>" />
                </td>
                <td>
                    <input type="text" name="grasa" value="<?php echo $alimento[0]['grasatotal'] ?>" />
                </td>
                <td>
                    <input type="file" name="imagen" accept="image/png, .jpeg, .jpg, image/gif">
                </td>
                <td>
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                </td>
            </tr>
        </table>
        <input type="submit" value="Modificar" name="modificar" />
    </form>
<?php
    $errores = array(
        1 => 'Error, Campo vacio al enviar el formulario',
        'Error, Dato no numerico',
        'Error al cargar la imagen',
        'El archivo subido no es una imagen',
        'Error al mover la nueva imagen al servidor'
    );

    if (isset($_REQUEST['error'])) {
        if (key_exists($_REQUEST['error'], $errores)) {
            echo '<span style="color: red">' . $errores[$_REQUEST['error']] . '</span><br>';
        }
    }
}

?>