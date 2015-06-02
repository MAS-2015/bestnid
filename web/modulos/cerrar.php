<?php
//cierra sesion y vuelva al index del login
session_start();
$_SESSION = array();
session_destroy();
header('Location: ../index.php');	
?>