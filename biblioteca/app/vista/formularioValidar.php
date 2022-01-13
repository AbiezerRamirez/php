<?php ob_start() ?>
<div style="margin-top:8%">
    <form action="index.php?ctl=areaPrivada" method="POST">
        <div class="caja2">
            <label class="title">Login</label><br /><br />
            <label>Nombre de Usuario
                <input type="text" name="nombre" maxlength=40 autocomplete="off" />
            </label><br /><br />

            <label>Contraseña
                <input type="password" name="clave" maxlength=40 autocomplete="off" />
            </label><br /><br />

            <input type="submit" value=" Enviar ">
        </div>
    </form>
</div>

<?php if (($parametros['clave'] != '' || $parametros['nombre'] != '') && $parametros['imagen'] == '') :
?>
<b>
    <div class='centrado1' style="color: #c5014f">Error al validar usuario y contraseña</div>
</b>
<?php endif;
?>
<br />

<?php $contenido = ob_get_clean() ?>

<?php include 'layout.php' ?>