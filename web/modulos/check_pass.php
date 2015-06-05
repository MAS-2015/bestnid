<?php
sleep(1);
include('conexion.php');
if($_REQUEST) {
    $pass = $_REQUEST['pass'];
	if (strlen ($pass ) < 6) {
		echo '<div id="Error">La contraseña debe tener como minimo 6 caracteres</div>';
	}
	else { 
		echo '<div id="Success">Contraseña valida</div>';
			
		
	}
}
?>