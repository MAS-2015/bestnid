<?php
sleep(1);
include('conexion.php');
if($_REQUEST) {
    $nombre = $_REQUEST['nombre'];
	if (strlen ($nombre ) < 7) {
		echo '<div id="Error">Nombre Invalido</div>';
	}
	else { 
		echo '<div id="Success">Nombre correcto</div>';
			
		
	}
}
?>