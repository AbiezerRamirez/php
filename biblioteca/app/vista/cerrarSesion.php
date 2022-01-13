<?php ob_start() ?>
<div style="margin-top:8%">
    <form action="index.php?ctl=cerrarSesion" method="POST">
        <div class="caja2">

            <label>¿Deseas cerrar la sesión?</label><br /><br />

            <input type="submit" name='sesion' value="cerrar">
        </div>
    </form>
</div>
<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>