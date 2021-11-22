<?php
session_start();
$_SESSION = array();
session_destroy();
header('location: index.php');
exit;

// Si deseas destruir la sesión completamente,
// borra también la cookie de sesión.
// setcookie(session_name(), '', time()-42000000,'/','localhost');