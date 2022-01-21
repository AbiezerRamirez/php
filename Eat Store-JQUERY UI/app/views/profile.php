<style>
    ul {
        list-style: none;
    }

    .content-box {
        display: flex;
    }
    aside{
        width: 20%;
    }
    div:not(.content-box) {
        width: 70%;
        padding: 0 10em;
    }

    form {
        text-align: center;
    }
</style>
<div class="content-box">
    <aside>
        <ul>
            <li><a href="?page=updateProfile">Modificar mis datos</a></li>
        </ul>
    </aside>
    <div>
        <h3>Datos</h3>
        <ul>
            <?php 
            if (isset($_REQUEST['page']) && $_REQUEST['page'] == 'updateProfile') {
                ?>
                <form action="app/controllers/BackController.php?action=updateProfile" method="POST">
                    <li>DNI: <input type="text" name="dni" value="<?php echo $_SESSION['client']['dni']; ?>"></li>
                    <li>Nombre: <input type="text" name="name" value="<?php echo $_SESSION['client']['nombre']; ?>"></li>
                    <li>Correo: <input type="email" name="mail" value="<?php echo $_SESSION['client']['correo']; ?>"></li>
                    <li>Direccion: <input type="text" name="direction" value="<?php echo $_SESSION['client']['direccion']; ?>"></li>
                    <li>Nueva Contraseña: <input type="password" name="pass"></li>
                    <li><input type="submit" value="Modificar"></li>
                </form>
            <?php } else { ?>
                <li>DNI: <?php echo $_SESSION['client']['dni']; ?></li>
                <li>Nombre: <?php echo $_SESSION['client']['nombre']; ?></li>
                <li>Correo: <?php echo $_SESSION['client']['correo']; ?></li>
                <li>Direccion: <?php echo $_SESSION['client']['direccion']; ?></li>
            <?php } ?>
        </ul>
    </div>
</div>