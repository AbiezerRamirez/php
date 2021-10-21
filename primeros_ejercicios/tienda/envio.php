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
    function precio_envio($total_compra, $tipo_compra)
    {
        $precio_envio = "Error";
        if (isset($total_compra, $tipo_compra)) {
            if ($total_compra < 19) {
                if ($tipo_compra == "mascotas") {
                    $precio_envio = "No se puede realizar el envio";
                } else {
                    $precio_envio = "Los gastos de envio son 9 euros";
                }
            } elseif ($total_compra >= 19 && $total_compra <= 40) {
                $precio_envio = "Los gastos de envio son 9 euros";
            } elseif ($total_compra > 40 && $total_compra <= 200) {
                $precio_envio = "El envio es gratis";
            } else {
                $precio_envio = "CODIGODESC33";
            }
        }
        echo $precio_envio;
    }

    $importe = $_GET["importe"];
    $tipo_compra = $_GET["tipo_compra"];

    precio_envio($importe, $tipo_compra);

    ?>
</body>

</html>