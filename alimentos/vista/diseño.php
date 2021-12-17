<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" type="text/css" href="web/css/estilo.css" />
    <title>Información Alimentos</title>
</head>

<body>
    <div id="cabecera">
        <h1>Alimentos. Información nutricional</h1>
        <a href="controlador/sesionController.php?action=logout">Cerrar sesion</a>
    </div>

    <div id="menu">
        <hr />
        <a href="?controller=inicio">Inicio</a> |
        <a href="?controller=consult">Consultar alimentos</a> |
        <a href="?controller=add">Insertar alimento</a> |
        <a href="?controller=buscarNombre">Buscar alimento (por nombre)</a> |
        <a href="?controller=buscarId">Buscar alimento (por código)</a>
        <a href="?controller=mod">Modificar alimento</a>
        <a href="?controller=delete">Eliminar alimento</a>
        <hr />
    </div>

    <div id="contenido">
        {{content}}
    </div>
    <div id="pie">
        <hr />
        <div style="text-align:center;">DWES. Creado por <strong>Abiezer Ramirez</strong>. Curso 2021/22</div>
    </div>
</body>

</html>