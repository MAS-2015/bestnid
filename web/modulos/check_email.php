<?php
sleep(1);
include('conexion.php');
if($_REQUEST) {
    $email = $_REQUEST['email'];
	if (preg_match(
'/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/',
$email)) {
    	$query = "select * from usuarios where email = '".($email)."'";
    	$results = mysqli_query($conexion,$query) or die('ok');
    	if(mysqli_num_rows($results) > 0)
        	echo '<div id="Error">Ya existe un usuario con ese correo</div>';
    	else
        	echo '<div id="Success">Correo valido</div>';
	} else {
		echo '<div id="Error">Correo Invalido</div>';
		
		
	}
}
?>