<?php
	if(empty($_GET)){
		echo 'hola';
	} else{
		// se imprime mensajes
		$men=($_GET['msj']);
		echo('<b>'.$men.'</b>');
	}
?>	