<?php
sleep(1);
include('conexion.php');

function telefonoValido($numero){
		 if (preg_match(
'/^\+?\d{1,3}?[- .]?\(?(?:\d{2,3})\)?[- .]?\d\d\d[- .]?\d\d\d\d$/',
$numero)) return true;
		 else return false;
	}

if($_REQUEST) {
    $telefono = $_REQUEST['telefono'];
    $query2 = "select * from usuarios where telefono = '".($telefono)."'";
    $results2 = mysqli_query($conexion,$query2) or die('ok');
	if($telefono != ''){	
		if(telefonoValido($telefono)){
			echo '<div id="Success">Telefono correcto</div>';
		} else {
			echo '<div id="Error">Telefono invalido</div>';
		}
	} else {
		echo '';
	}
		
}



?>