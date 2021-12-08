 <br />
 <form name="formInsertar" action="controlador/controller.php?action=add" method="POST" enctype="multipart/form-data">
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
       <td>
         <input type="file" name="imagen" accept="image/png, .jpeg, .jpg, image/gif">
       </td>
     </tr>

   </table>
   <input type="submit" value="insertar" name="insertar" />
 </form>

 <?php
  $errores = array(
    1 => 'Error, Campo vacio al enviar el formulario',
    'Error, Dato no numerico',
    'Error al cargar la imagen',
    'El archivo subido no es una imagen',
    'Error al mover la imagen al servidor'
  );

  if (isset($_REQUEST['error'])) {
    if (key_exists($_REQUEST['error'], $errores)) {
      echo '<span style="color: red">' . $errores[$_REQUEST['error']] . '</span><br>';
    }
  } else if (isset($_REQUEST['succes'])) {
    echo '<span style="color: green">Alimento agregado con éxito</span><br>';
  }
  ?>
 * Los valores deben referirse a 100 g del alimento