<?php ob_start() ?>
<div class='caja'>
    <p class='mediaCaja'>
        <br>¡ Bienvenido a mi biblioteca !
    </p>
</div>
<?= $parametros['mensaje'] ?>
<?php $contenido = ob_get_clean() ?>
<?php include 'layout.php' ?>