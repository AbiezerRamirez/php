<?php
require_once('app/db/conexion.php');
require_once('app/db/Queries.php');
if (isset($_GET['id'])) {
    $idplato = $_GET['id'];
    $gdb = new Queries();
    $plato = $gdb->executeQueryArray("select * from plato where idplato = '$idplato'");
    $plato = $plato[0];
?>
    <div id="pContainer">
        <div id="pVista">
            <img src="img/<?php echo $plato['foto'] ?>" alt="" height="400px" width="200px">
        </div>
        
        <p><strong>ID:</strong> <?php echo $plato['idplato'] ?></p>
        <p><strong>Nombre:</strong> <?php echo $plato['nombre'] ?></p>
        <p><strong>Descripcion:</strong> <?php echo $plato['descripcion'] ?></p>
        <p><strong>ID Categoria:</strong> <?php echo $plato['idcategoria'] ?></p>
        <p><strong>Precio:</strong> <?php echo $plato['precio'] ?>€</p>
    </div>
<?php
}
?>