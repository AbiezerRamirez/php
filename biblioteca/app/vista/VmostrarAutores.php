<?php ob_start() ?>
<table>
    <tr>
        <th>Código</th>
        <th>Autor</th>
        <th>Imagen Autor</th>
        <th>Libros</th>
    </tr>
    <?php foreach ($parametros['autores'] as $autores) : ?>
    <tr>
        <td class="normal"><?= $autores['id'] ?></td>
        <td class="normal"><?= $autores['nombre'] ?></a></td>
        <td class="imagen"> <img class='redonda' src=<?= 'web/img/Autores/' . $autores['fotoAutor'] ?>></td>
        <td class="normal">
            <form action="index.php?ctl=ver" method="POST">
                <select name='id'>
                    <?php foreach ($autores['obra'] as $libro) { ?>
                    <option value=<?= $libro['id']; ?>><?= $libro['titulo']?></option>
                    <?php } ?>
                </select>
                <input type="submit" name="mostrar" value='Ver'>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<?php if (isset($parametros['mensaje']) && $parametros['mensaje'] != '') : ?>
<b>
    <div class='centrado1' style="color: #c5014f"><?= $parametros['mensaje'] ?></div>
</b>
<?php endif; ?>
<br />
<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>