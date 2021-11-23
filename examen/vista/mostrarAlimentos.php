 <table>
     <tr>
         <th>alimento (por 100g)</th>
         <th>energía (Kcal)</th>
         <th>grasa (g)</th>
     </tr>
        <?php 
        foreach($gbd->consultar() as $alimento) {
            echo '<tr><td>' . $alimento['nombre'] . '</td><td>' . $alimento['energia'] . '</td><td>' . $alimento['grasatotal'] . '</td></tr>';
        } ?>

        <!-- <tr>
            <td>  </td>
            <td>  </td>
            <td>  </td>
        </tr> -->

 </table>


