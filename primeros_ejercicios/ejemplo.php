<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>

<body>
    <?php
    // echo "Hola Mundo<br>";
    // // phpinfo();
    // print("hola");

    // Bucle for

    function p_variable()
    {
        $argc = func_num_args(); // devuelve el numero de argumentos pasados a la funcion
        $argv = func_get_args(); // mete los argumentos de la funcion en un array
        for ($i = 0; $i < $argc; $i++) {
            echo "parametro $i: $argv[$i]<br>";
        }
    }

    echo "Primera llamada:<br>";
    p_variable(1, 2);
    
    echo "Segunda llamada:<br>";
    p_variable("Pedro", null, "Carlos", true);
    ?>
</body>

</html>