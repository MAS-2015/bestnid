<?php
sleep(1);
include('conexion.php');

function tarjetaValida($numero){
		 if (preg_match(
'/^((67\d{2})|(4\d{3})|(5[1-5]\d{2})|(6011))(-?\s?\d{4}){3}|(3[4,7])\ d{2}-?\s?\d{6}-?\s?\d{5}$/',
$numero)) return true;
		 else return false;
	}

if($_REQUEST) {
    $tarj = $_REQUEST['tarj'];
	if(tarjetaValida($tarj)){
			echo '<div id="Success">Tarjeta correcta</div>';
	} else {
		echo '<div id="Error">Tarjeta invalida</div>';
	}
}



?>