<?php ob_start() ?>

<table style="margin-top:6%">
    <th colspan=3>Obra Seleccionada </th>
    <tr colspan=2>
        <th>Título</td>
        <td class=" grande"><?= $libro['titulo'] ?> </td>
        <td class="imagenGrande"><img class='redondaGrande' src=<?= 'web/img/Portadas/' . $libro['portada'] ?>></td>
    </tr>
    <tr colspan=2>
        <th>Autor</td>
        <td class="grande"><?= $libro['nombre'] ?></td>
        <td class="imagenGrande"><img class='redondaGrande' src=<?= 'web/img/Autores/' . $libro['fotoAutor'] ?>></td>
    </tr>
    <tr>
        <th>Editorial</td>
        <td class="grande" colspan=2><?= $libro['editorial'] ?></td>
    </tr>
    <tr colspan=3>
        <th>Tema</td>
        <td class="grande" colspan=2><?= $libro['tema'] ?></td>
    </tr>

</table>

<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>