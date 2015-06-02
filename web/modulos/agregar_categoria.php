<?php
  				
if(!(empty($_POST['nombre']))) {
  
  	include("conexion.php");
  	$nombre = mysqli_escape_string($conexion, $_POST["nombre"]);
  	$sql = "INSERT INTO categorias (idCategoria, nombre) values (NULL,'".$nombre."')";
	$resultado= mysqli_query($conexion, $sql);
	if ($resultado){
			echo '<p class="infoR"> Categoria '. "$nombre".' agregada </p> ';
		}
	else{
		echo '<p class="infoR"> EL nombre ya se encuentra en la base de datos o error en la misma</p> ';
	}
	mysqli_close($conexion);
	}
					
  			
?>