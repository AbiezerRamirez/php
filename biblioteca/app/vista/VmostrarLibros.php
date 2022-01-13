<?php ob_start() ?>


<?php if (isset($parametros['mensaje']) && $parametros['mensaje'] != '') : ?>
<b>
    <div class='centrado1' style="color: #c5014f"><?= $parametros['mensaje'] ?></div>
</b>
<?php endif; ?>
<br />
<table>
    <tr>
        <th>Código</th>
        <th>Título</th>
        <th>Autor</th>

        <th>Editorial</th>
        <th>Tema</th>
        <th>Portada</th>

    </tr>
    <?php foreach ($parametros['libros'] as $libros) : ?>
    <tr>
        <td class="normal"><?= $libros['id'] ?></td>
        <td class="normal"><a href="index.php?ctl=ver&id=<?= $libros['id'] ?>">

                <?= $libros['titulo'] ?></a></td>
        <td class="normal"><?= $libros['nombre'] ?></td>
        <td class="normal"><?= $libros['editorial'] ?></td>
        <td class="normal"><?= $libros['tema'] ?></td>
        <td class="imagen"> <img class='redonda' src=<?= 'web/img/Portadas/' . $libros['portada'] ?>></td>
    </tr>
    <?php endforeach; ?>
</table>



<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>