<br/>
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
               <input type="text" name="nombre" value="" />
             </td>
             <td>
               <input type="text" name="energia" value="" />
             </td>
             <td>
               <input type="text" name="proteina" value="" />
             </td>
             <td>
               <input type="text" name="hc" value="" />
             </td>
             <td>
               <input type="text" name="fibra" value="" />
             </td>
             <td>
               <input type="text" name="grasa" value="" />
             </td>
         </tr>

     </table>
     <input type="submit" value="insertar" name="insertar" />
 </form>