 <br/>
 <form name="formInsertar" action="controlador/validarAlimento.php" method="POST">
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

 <?php
  if (isset($_REQUEST['error'])) {
    if ($_REQUEST['error'] == 1) {
      echo '<span style="color: red">Error, Campo vacio al enviar el formulario</span>';
    } else if ($_REQUEST['error'] == 2) {
      echo '<span style="color: red">Error, Dato no numerico</span>';
    }
    unset($_REQUEST['error']);
  }
 ?>
 * Los valores deben referirse a 100 g del alimento

