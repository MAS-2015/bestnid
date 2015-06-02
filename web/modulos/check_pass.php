<?php
sleep(1);
include('conexion.php');
if($_REQUEST) {
    $pass = $_REQUEST['pass'];
	if (strlen ($pass ) < 6) {
		echo '<div id="Error">Contraseña invalida</div>';
	}
	else { 
		echo '<div id="Success">Contraseña valida</div>';
			
		
	}
}
?>