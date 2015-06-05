<?php
sleep(1);
function comprobarnombre($nombre_usuario){ 
	$permitidos = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ ";
	 for ($i=0; $i<strlen($nombre_usuario); $i++){
      if (strpos($permitidos, substr($nombre_usuario,$i,1))===false){
         return false;
      }
   }

   return true;
} 
include('conexion.php');
if($_REQUEST) {
    $nombre = $_REQUEST['nombre'];
	if(comprobarnombre($nombre)){
		if (strlen ($nombre ) < 7) {
			echo '<div id="Error">El nombre debe tener como minimo 7 letras</div>';
		}
		else { 
			echo '<div id="Success">Nombre correcto</div>';
		}
	} else {
			echo '<div id="Error">El nombre solo debe contener letras</div>';
		}

}
?>