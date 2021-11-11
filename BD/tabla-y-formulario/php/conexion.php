<?php
$conexion = mysqli_connect('localhost', 'alumno', 'alumno', 'bd_prueba');

if (mysqli_connect_errno()) {
    echo '<span style="color: red">Error al conectar con la base de datos</span>';
} else {
    mysqli_set_charset($conexion, "utf8");
}

function executeQuery($query, $conexion)
{
    $conexion->query($query) or die($conexion->error);
}

function executeQueryArray($query, $conexion)
{
    $result =  $conexion->query($query) or die($conexion->error);
    $result = $result->fetch_all(MYSQLI_ASSOC);
    return $result;
}

function exists($columna, $dato, $conexion)
{
    $aux = executeQueryArray("select " . $columna . " from usuarios where " . $columna . " = '" . $dato . "'", $conexion);
    if (empty($aux)) {
        return false;
    }
    return true;
}

function mostrarUsuarios($conexion)
{
    $usuarios = executeQueryArray("select * from usuarios", $conexion);
    echo '<table class="highlight" border="1">';
    echo "<tr>";
    foreach ($usuarios[0] as $clave => $valor) {
        echo '<th>' . $clave . '</th>';
    }
    echo "</tr>";
    foreach ($usuarios as $usuario) {
        echo "<tr>";
        foreach ($usuario as  $valor) {
            echo '<td>' . $valor . '</td>';
        }
        echo '<td class="material-icons"><a href="php/eliminarUsuario.php?id=' . $usuario['id'] . '">delete</a></td>';
        echo "</tr>";
    }
    echo '</table>';
}

function agregarUsuario($datos, $conexion)
{
    executeQuery("insert into usuarios (nombre, apellidos, correo, usuario, clave, telefono) values ('" . $datos[0] . "','" . $datos[1] . "','" . $datos[2] . "','" . $datos[3] . "','" . $datos[4] . "'," . $datos[5] . ")", $conexion);
}
