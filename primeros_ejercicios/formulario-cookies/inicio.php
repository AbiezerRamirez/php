<?php
setcookie('password', 'z80', time()+15*60);
header('location: formulario.php');
exit();