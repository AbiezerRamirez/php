
      <form name="formBusqueda" action="controlador/validarBusquedaCodigo.php" method="POST">

<table>
    <tr>
        <td>Nombre del alimento:</td>
       <td>
<input type="text" name="id">
    ('%' como comodín)
</td>

<td>
<input type="submit" name="buscar" value="Buscar">
</td>
    </tr>
</table>

<!-- </table> -->

</form>

<table>
<tr>
   <th>alimento (por 100g)</th>
   <th>energía (Kcal)</th>
   <th>grasa (g)</th>
</tr>
<?php
  if (isset($_REQUEST['error'])) {
      if ($_REQUEST['error'] == 1) {
          echo '<span style="color: red">Error, Campo vacio al enviar el formulario</span>';
      } else if ($_REQUEST['error'] == 2) {
          echo '<span style="color: red">Alimento no encomtrado</span>';
      }
      unset($_REQUEST['error']);
  }

  if (isset($resul)) {
      foreach($resul as $alimento) {
          echo '<tr><td>' . $alimento['nombre'] . '</td><td>' . $alimento['energia'] . '</td><td>' . $alimento['grasatotal'] . '</td></tr>';
      }
  }
  ?>

</table>
