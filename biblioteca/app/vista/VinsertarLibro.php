<?php ob_start();?>

<form action="index.php?ctl=insertarLibro" method="POST">
    <table style="margin-top:7%">
        <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Editorial</th>
            <th>Tema</th>
        </tr>
        <tr>
            <td class="normal">
                <input type="text" name="titulo" value="<?= $parametros['titulo'] ?>" autocomplete="off" />
            </td>
            <td class="normal">
                <input type="text" name="nombre" list="misAutores" autocomplete="off">
                <?php foreach ($autores as $autor) { ?>
                <datalist id="misAutores">
                    <option value="<?= $autor['nombre'] ?>"></option>
                    <?php } ?>
                </datalist>
            </td>
            <td class="normal">
                <input type="text" name="editorial" list="misEditoriales" autocomplete="off">
                <?php foreach ($editoriales as $editorial) { ?>
                <datalist id="misEditoriales">
                    <option value="<?= $editorial['editorial'] ?>"></option>
                    <?php } ?>
                </datalist>
            </td>
            <td class="normal">
                <input type="text" name="tema" list="misTemas" autocomplete="off">
                <?php foreach ($temas as $tema) { ?>
                <datalist id="misTemas">
                    <option value="<?= $tema['tema'] ?>"></option>
                    <?php } ?>
                </datalist>
            </td>
        <tr>
            <td colspan="4" class="normal">
                <input type="submit" value="Añadir_Libro" name="insertar" />
            </td>
        </tr>
        <tr>
            <td colspan="4" class="normal">
                * Puedes elegir un autor, editorial o tema de las listas o insertar nuevos
            </td>
        </tr>
    </table>
</form>
<?php if (isset($parametros['mensaje']) && $parametros['mensaje'] != '') : ?>
<b>
    <div class="centrado1" style="color:#c5014f"><?= $parametros['mensaje'] ?></div>
</b>
<?php endif; ?>
<br />

<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>