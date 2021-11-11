<?php
include('conexion.php');

executeQuery("delete from usuarios where id = " . $_GET['id'], $conexion);
header('location: ../index.php');
exit;
