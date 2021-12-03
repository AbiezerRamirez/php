
      <form name="formBusqueda" action="controlador/controller.php?action=searchName" method="POST">

          <table>
              <tr>
                  <td>Nombre del alimento:</td>
                 <td>
       <input type="text" name="nombre">
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
            }

            if (isset($_REQUEST['al'])) {
                $gbd = new GBD('alimentos');
                $alimentos = $gbd->executeQueryArray("select * from alimentos where nombre like '" . $_REQUEST['al'] . "'");
                foreach ($alimentos as $alimento) {
                    echo '
                        <tr>
                            <td>' . $alimento['nombre'] . '</td>
                            <td>' . $alimento['energia'] . '</td>
                            <td>' . $alimento['grasatotal'] . '</td>
                            <td><img src="web/fotosAlimentos/' . $alimento['fotografia'] . '" alt="Imagen ' . $alimento['nombre'] . '" width="150"> </td>
                        </tr>';
                }
                $gbd->disconect();
            }
            ?>

     </table>
