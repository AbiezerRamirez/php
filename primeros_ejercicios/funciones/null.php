<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $a;
        $b = null;
        $c = null;
        
        // Generan error por no haber inicializado la variable

        is_null($a);
        var_dump($a);


        // No generan error

        echo (is_null($b));
        echo (is_null($c));
        var_dump($b);
        var_dump($c);
        
        // saber si una variable esta vacia o null

        if (empty($a)) {
            echo "Ta vacia we";
        } else {
            echo "no ta vacia we";
        }
    ?>
</body>
</html>