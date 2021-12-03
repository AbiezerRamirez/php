<?php $gbd = new GBD('alimentos'); ?>

 <table>
     <tr>
         <th>alimento (por 100g)</th>
         <th>energía (Kcal)</th>
         <th>grasa (g)</th>
     </tr>
        <?php foreach($gbd->executeQueryArray('select * from alimentos') as $alimento) : ?>
        <tr>
            <td><?php echo $alimento['nombre'] ?></td>
            <td><?php echo $alimento['energia'] ?></td>
            <td><?php echo $alimento['grasatotal'] ?></td>
            <td><img src="web/fotosAlimentos/<?php echo $alimento['fotografia'] ?>" alt="Imagen <?php echo $alimento['nombre'] ?>" width="150"></td>
        </tr>
        <?php endforeach; ?>
 </table>
<?php $gbd->disconect(); ?>

