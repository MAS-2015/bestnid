<?php
sleep(1);
include('conexion.php');
if($_REQUEST) {
    $dom = $_REQUEST['dom'];
	if($dom != ''){
		if (strlen ($dom ) < 5) {
			echo '<div id="Error">Domicilio Invalido</div>';
		}
		else { 
			echo '<div id="Success">Domicilio correcto</div>';


		}
	} else {
		echo '';
	}
}
?>