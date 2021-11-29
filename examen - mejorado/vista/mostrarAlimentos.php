 <table>
     <tr>
         <th>alimento (por 100g)</th>
         <th>energía (Kcal)</th>
         <th>grasa (g)</th>
     </tr>
        <?php 
        var_dump($gbd->executeQueryArray('select * from alimentos'));
        ?>
        <?php foreach($gbd->executeQueryArray('select * from alimentos') as $alimento) : ?>
        <tr>
            <td><?php $alimento['nombre'] ?></td>
            <td><?php $alimento['energia'] ?></td>
            <td><?php $alimento['grasatotal'] ?></td>
        </tr>
        <?php endforeach; ?>
 </table>


