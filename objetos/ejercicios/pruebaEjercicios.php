<?php
include('cuentaCorriente.php');

$cuenta1 = new CuentaCorriente('abiezer', '123456H');
$cuenta2 = new CuentaCorriente(14);
$cuenta3 = new CuentaCorriente(50, 25, '123456H');

// $cuenta1->mostrarInformacion();
// echo '<br>';
// $cuenta1->ingresarDinero(25);
// $cuenta1->sacarDinero(76);
// echo '<br>';
// $cuenta1->mostrarInformacion();
// echo '<br>';

// $cuenta2->mostrarInformacion();
// echo '<br>';

$cuenta3->mostrarInformacion();
echo '<br>';
$cuenta3->setBanco(new banco('BANCO'));
$cuenta3->mostrarBanco();