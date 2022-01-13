<?php ob_start() ?>
<div class='caja2'>
    <h2>Área de trabajo de <?= $_SESSION['nombre'] ?></h2>
    <img class='grande' src="<?= $_SESSION['imagen'] ?>" alt="Avatar Administrador">
    <h2 style="text-align: right;"> Salamanca, a <?= $parametros['fecha'] ?> </h2>
</div>

<?= $parametros['mensaje'] ?>

<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>