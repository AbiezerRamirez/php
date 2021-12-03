<br/>
<?php $gbd = new GBD('alimentos'); ?>

 <table>
     <tr>
         <th>alimento (por 100g)</th>
         <th>energía (Kcal)</th>
         <th>Proteina (g)</th>
         <th>H. de carbono (g)</th>
         <th>Fibra (g)</th>
         <th>grasa (g)</th>
     </tr>
        <?php foreach($gbd->executeQueryArray('select * from alimentos') as $alimento) : ?>
        <tr>
            <td><?php echo $alimento['nombre'] ?></td>
            <td><?php echo $alimento['energia'] ?></td>
            <td><?php echo $alimento['proteina'] ?></td>
            <td><?php echo $alimento['hidratocarbono'] ?></td>
            <td><?php echo $alimento['fibra'] ?></td>
            <td><?php echo $alimento['grasatotal'] ?></td>
            <td><img src="web/fotosAlimentos/<?php echo $alimento['fotografia'] ?>" alt="Imagen <?php echo $alimento['nombre'] ?>" width="150"></td>
            <td><a href="?controller=mod&id=<?php echo $alimento['id'] ?>">Modificar</a></td>
        </tr>
        <?php endforeach; ?>
 </table>
 
<?php 
if (isset($_REQUEST['id']) && $gbd->exists('alimentos', 'id', $_REQUEST['id'])) { 
    $id = $_REQUEST['id'];
    $alimento = $gbd->executeQueryArray("select * from alimentos where id = $id");
?>
 <form name="formInsertar" action="controlador/controller.php?action=update" method="POST">
   <table>
     <tr>
       <th>Nombre</th>
       <th>Energía (Kcal)</th>
       <th>Proteina (g)</th>
       <th>H. de carbono (g)</th>
       <th>Fibra (g)</th>
       <th>Grasa total (g)</th>
      </tr>

      <tr>
        <td>
          <input type="text" name="nombre" value="<?php echo $alimento[0]['nombre'] ?>" />
        </td>
        <td>
          <input type="text" name="energia" value="<?php echo $alimento[0]['energia'] ?>" />
        </td>
        <td>
          <input type="text" name="proteina" value="<?php echo $alimento[0]['proteina'] ?>" />
        </td>
        <td>
          <input type="text" name="hc" value="<?php echo $alimento[0]['hidratocarbono'] ?>" />
        </td>
        <td>
          <input type="text" name="fibra" value="<?php echo $alimento[0]['fibra'] ?>" />
        </td>
        <td>
          <input type="text" name="grasa" value="<?php echo $alimento[0]['grasatotal'] ?>" />
        </td>
    </table>
    <input type="submit" value="Modificar" name="modificar" />
  </form>
      </tr>
<?php 
}
$gbd->disconect(); 
?>