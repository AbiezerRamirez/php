<?php

    spl_autoload_register(function ($nombre_clase) {
    include $nombre_clase . '.php';
    });

    // Creamos los dos objetos que necesito para trabajar
    $alumno = new Alumno();
    $modeloAlumno = new AlumnoModelo();

    if(isset($_REQUEST['action'])) {
        switch($_REQUEST['action'])	{
            case 'actualizar':
                $alumno->__SET('id',              $_REQUEST['id']);
                $alumno->__SET('Nombre',          $_REQUEST['Nombre']);
                $alumno->__SET('Apellido',        $_REQUEST['Apellido']);
                $alumno->__SET('Sexo',            $_REQUEST['Sexo']);
                $alumno->__SET('FechaNacimiento', $_REQUEST['FechaNacimiento']);

                $modeloAlumno->Actualizar($alumno);
                header('Location: index.php');
                break;

            case 'registrar':
                $alumno->__SET('Nombre',          $_REQUEST['Nombre']);
                $alumno->__SET('Apellido',        $_REQUEST['Apellido']);
                $alumno->__SET('Sexo',            $_REQUEST['Sexo']);
                $alumno->__SET('FechaNacimiento', $_REQUEST['FechaNacimiento']);

                $modeloAlumno->Registrar($alumno);
                header('Location: index.php');
                break;

            case 'eliminar':
                $modeloAlumno->Eliminar($_REQUEST['id']);
                header('Location: index.php');
                break;

            case 'editar':
                $alumno = $modeloAlumno->Obtener($_REQUEST['id']);
                break;
        }
    }

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Mi CSS personal -->
    <link href="miestilo.css" rel="stylesheet">
    <!-- Para lo que no he modificado yo -->
    <link href="plantilla.bootstrap.css" rel="stylesheet">
    <title>Gestión de Alumnos</title>
</head>
<body class="text-center">

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header>
            <div>
                <h3 class="float-md-start mb-0">Listado de alumnos. Grupo de DAW2</h3>
            </div>
        </header>
        
        <hr>

        <main role="main" class="inner cover">
        <div >
            
            <form action="?action=<?php echo $alumno->id > 0 ? 'actualizar' : 'registrar'; ?>" method="post" style="margin-bottom:30px;">
                <input type="hidden" name="id" value="<?php echo $alumno->__GET('id'); ?>" />
                
                <table style="width:500px;">
                    <tr>
                        <th style="text-align:left;">Nombre</th>
                        <td><input type="text" name="Nombre" value="<?php echo $alumno->__GET('Nombre'); ?>" style="width:100%;" /></td>
                    </tr>
                    <tr>
                        <th style="text-align:left;">Apellido</th>
                        <td><input type="text" name="Apellido" value="<?php echo $alumno->__GET('Apellido'); ?>" style="width:100%;" /></td>
                    </tr>
                    <tr>
                        <th style="text-align:left;">Sexo</th>
                        <td>
                            <select name="Sexo" style="width:100%;">
                                <option value="1" <?php echo $alumno->__GET('Sexo') == 1 ? 'selected' : ''; ?>>Masculino</option>
                                <option value="2" <?php echo $alumno->__GET('Sexo') == 2 ? 'selected' : ''; ?>>Femenino</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <th style="text-align:left;">Fecha</th>
                        <td><input type="text" name="FechaNacimiento" value="<?php echo $alumno->__GET('FechaNacimiento'); ?>" style="width:100%;" /></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit">Guardar</button>
                        </td>
                    </tr>
                </table>
            </form>

            <table>
                <thead>
                    <tr>
                        <th style="text-align:left;">Nombre</th>
                        <th style="text-align:left;">Apellido</th>
                        <th style="text-align:left;">Sexo</th>
                        <th style="text-align:left;">Nacimiento</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <?php foreach($modeloAlumno->Listar() as $r): ?>
                    <tr>
                        <td><?php echo $r->__GET('Nombre'); ?></td>
                        <td><?php echo $r->__GET('Apellido'); ?></td>
                        <td><?php echo $r->__GET('Sexo') == 1 ? 'H' : 'F'; ?></td>
                        <td><?php echo $r->__GET('FechaNacimiento'); ?></td>
                        <td>
                            <a href="?action=editar&id=<?php echo $r->id; ?>">Editar</a>
                        </td>
                        <td>
                            <a href="?action=eliminar&id=<?php echo $r->id; ?>">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table> 

        </div>
        </main>
        
        <hr>

        <footer class="pie">
            <p>Creado por mlizquierdos. Curso 2021/22</p>
        </footer>
    </div>
</body>
</html>

